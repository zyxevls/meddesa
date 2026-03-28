<?php require BASE_PATH . '/views/layouts/header.php'; ?>
<?php require BASE_PATH . '/views/layouts/sidebar.php'; ?>

<!-- Main Content Area -->
<div class="flex-1 ml-56">
    <div id="dashboard-content" class="px-8 pt-6 pb-12 max-w-[1600px] mx-auto" data-current-url="<?= htmlspecialchars(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH)) ?>">
        <?php
        $bc = breadcrumbs();
        $bcItems = $bc->breadcrumbPath();
        echo $bc->toJsonLD();
        ?>
        <?php if (count($bcItems) > 0): ?>
            <nav class="mb-4 text-sm" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-slate-500">
                    <?php foreach ($bcItems as $i => $item): ?>
                        <?php $isLast = ($i + 1 === count($bcItems)); ?>
                        <?php if ($i > 0): ?>
                            <li class="flex items-center">
                                <i class="fas fa-chevron-right text-[10px] text-slate-400"></i>
                            </li>
                        <?php endif; ?>
                        <li class="flex items-center">
                            <?php if ($isLast): ?>
                                <span class="font-semibold text-slate-700"><?= htmlspecialchars($item['title']) ?></span>
                            <?php elseif ($i === 0): ?>
                                <a href="<?= htmlspecialchars($item['link']) ?>" class="hover:text-blue-600 transition" title="<?= htmlspecialchars($item['title']) ?>">
                                    <i class="fas fa-home"></i>
                                </a>
                            <?php else: ?>
                                <a href="<?= htmlspecialchars($item['link']) ?>" class="hover:text-blue-600 transition"><?= htmlspecialchars($item['title']) ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
        <?php require $content; ?>
    </div>
</div>
</div>

<?php require BASE_PATH . '/views/layouts/footer.php'; ?>