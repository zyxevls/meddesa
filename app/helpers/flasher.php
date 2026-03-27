<?php

use Flasher\Prime\Asset\AssetManager;
use Flasher\Prime\Container\FlasherContainer;
use Flasher\Prime\EventDispatcher\EventDispatcher;
use Flasher\Prime\Factory\FlasherFactory;
use Flasher\Prime\Factory\NotificationFactoryLocator;
use Flasher\Prime\Flasher;
use Flasher\Prime\Notification\Envelope;
use Flasher\Prime\Plugin\FlasherPlugin;
use Flasher\Prime\Response\Resource\ResourceManager;
use Flasher\Prime\Response\ResponseManager;
use Flasher\Prime\Storage\Bag\BagInterface;
use Flasher\Prime\Storage\Filter\FilterFactory;
use Flasher\Prime\Storage\Storage;
use Flasher\Prime\Storage\StorageManager;
use Flasher\Prime\Template\PHPTemplateEngine;

class SessionBag implements BagInterface
{
    private string $sessionKey;

    public function __construct(string $sessionKey = '_flasher_envelopes')
    {
        $this->sessionKey = $sessionKey;
    }

    public function get(): array
    {
        $envelopes = $_SESSION[$this->sessionKey] ?? [];

        if (!is_array($envelopes)) {
            return [];
        }

        $validEnvelopes = array_values(array_filter($envelopes, static fn($item) => $item instanceof Envelope));

        if (count($validEnvelopes) !== count($envelopes)) {
            $_SESSION[$this->sessionKey] = $validEnvelopes;
        }

        return $validEnvelopes;
    }

    public function set(array $envelopes): void
    {
        $_SESSION[$this->sessionKey] = $envelopes;
    }
}

function bootstrapFlasher(): void
{
    static $booted = false;

    if ($booted) {
        return;
    }

    $plugin = new FlasherPlugin();
    $config = $plugin->normalizeConfig([
        'options' => [
            'position' => 'top-right',
            'timeout' => 3500,
            'closable' => true,
        ],
    ]);

    $publicDir = realpath(__DIR__ . '/../../public') ?: (__DIR__ . '/../../public');
    $assetManager = new AssetManager($publicDir, $publicDir . '/flasher-manifest.json');

    $resources = [
        'flasher' => $config['plugins']['flasher'] ?? [],
    ];

    $eventDispatcher = new EventDispatcher();
    $storage = new Storage(new SessionBag());
    $storageManager = new StorageManager($storage, $eventDispatcher, new FilterFactory(), $config['filter'] ?? []);

    $resourceManager = new ResourceManager(
        new PHPTemplateEngine(),
        $assetManager,
        $config['main_script'] ?? '/vendor/flasher/flasher.min.js',
        $resources
    );

    $responseManager = new ResponseManager($resourceManager, $storageManager, $eventDispatcher);
    $factoryLocator = new NotificationFactoryLocator();
    $factoryLocator->addFactory('flasher', new FlasherFactory($storageManager, 'flasher'));

    $flasher = new Flasher('flasher', $factoryLocator, $responseManager, $storageManager);
    FlasherContainer::setContainer($flasher);

    $booted = true;
}
