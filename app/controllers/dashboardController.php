<?php

class DashboardController
{
    public function index()
    {
        Middleware::auth();

        $content = '../views/dashboard/index.php';
        require '../views/layouts/app.php';
    }
}
