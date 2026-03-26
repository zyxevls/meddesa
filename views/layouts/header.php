<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedDesa - Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #64748b;
            --accent-color: #06b6d4;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 20% 0%, rgba(125, 211, 252, 0.18), transparent 35%),
                radial-gradient(circle at 90% 20%, rgba(165, 180, 252, 0.14), transparent 28%),
                #f8fafc;
        }
        .sidebar-active {
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>

<body class="bg-slate-50">

    <!-- Header/Top Navigation -->
    <div class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200 shadow-md">
        <div class="flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hospital text-white text-lg"></i>
                </div>
                <h1 class="text-xl font-bold text-slate-800">MedDesa</h1>
            </div>
            <div class="flex items-center space-x-6">
                <div class="text-right">
                    <p class="text-sm font-medium text-slate-700">Selamat datang,</p>
                    <p class="text-base font-semibold text-blue-600"><?php echo isset($_SESSION['user']['name']) ? htmlspecialchars($_SESSION['user']['name']) : 'Pengguna'; ?>!</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Start -->
    <div class="pt-20 flex">