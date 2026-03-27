<?php require BASE_PATH . '/views/layouts/header.php'; ?>
<?php require BASE_PATH . '/views/layouts/sidebar.php'; ?>

        <!-- Main Content Area -->
        <div class="flex-1 ml-56">
            <div id="dashboard-content" class="p-8 min-h-screen" data-current-url="<?= htmlspecialchars(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH)) ?>">
                <?php require $content; ?>
            </div>
        </div>
    </div>

<?php require BASE_PATH . '/views/layouts/footer.php'; ?>