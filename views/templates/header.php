<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMHub - <?= htmlspecialchars($title) ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="min-h-screen flex flex-col">

    <!-- Simple Navigation -->
    <nav class="glass-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <!-- Logo -->
                <div class="flex items-center gap-2 group cursor-pointer">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center transition-transform group-hover:rotate-[360deg] duration-700">
                        <i class="fas fa-feather-alt text-black text-sm"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white syne">LMHUB</span>
                </div>
                
                <!-- Simple Links with Underline Animation -->
                <div class="hidden md:flex items-center space-x-12">
                    <a href="/" class="nav-link">Discover</a>
                    <a href="#" class="nav-link">Trending</a>
                    <a href="#" class="nav-link">Authors</a>
                </div>

                
                <div class="flex items-center space-x-6">
                    <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <a href="/profile" class="text-sm font-bold text-gray-200 hover:text-white transition">Profile</a>
                        <a href="/logout" class="text-sm font-bold text-red-400 hover:text-red-200 transition">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="text-sm font-bold text-gray-400 hover:text-white transition">Login</a>
                        <a href="/register" class="gradient-btn text-white px-6 py-2 rounded-full text-xs font-bold active:scale-95 shadow-lg">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
