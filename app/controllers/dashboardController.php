<?php

class DashboardController
{
    public function index()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/dashboard/index.php';
        require BASE_PATH . '/views/layouts/app.php';
    }
}
