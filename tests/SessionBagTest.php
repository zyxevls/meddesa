<?php

declare(strict_types=1);

use Flasher\Prime\Notification\Envelope;
use Flasher\Prime\Notification\Notification;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/helpers/flasher.php';

final class SessionBagTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
    }

    public function testSetAndGetReturnsStoredEnvelopes(): void
    {
        $bag = new SessionBag('test_envelopes');

        $notification = new Notification();
        $notification->setMessage('Halo');
        $envelope = new Envelope($notification);

        $bag->set([$envelope]);
        $result = $bag->get();

        $this->assertCount(1, $result);
        $this->assertSame($envelope, $result[0]);
    }

    public function testGetReturnsEmptyArrayWhenSessionPayloadIsNotArray(): void
    {
        $_SESSION['test_envelopes'] = 'invalid';
        $bag = new SessionBag('test_envelopes');

        $this->assertSame([], $bag->get());
    }

    public function testGetFiltersOutNonEnvelopeValuesAndRewritesSession(): void
    {
        $notification = new Notification();
        $notification->setMessage('Valid');
        $envelope = new Envelope($notification);

        $_SESSION['test_envelopes'] = [$envelope, 'invalid', 123];

        $bag = new SessionBag('test_envelopes');
        $result = $bag->get();

        $this->assertCount(1, $result);
        $this->assertSame($envelope, $result[0]);
        $this->assertSame([$envelope], $_SESSION['test_envelopes']);
    }
}
