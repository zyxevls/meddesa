<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <form method="POST" action="/login" class="bg-white p-6 rounded-xl shadow-md w-80">
        <h2 class="text-xl font-bold mb-4 text-center">Login Admin</h2>

        <input name="username" placeholder="Username"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded" required>

        <button class="w-full bg-blue-500 text-white p-2 rounded">
            Login
        </button>
    </form>

    <?php echo flash()->render('html'); ?>

</body>

</html>
