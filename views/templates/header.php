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
<body class="min-h-screen flex flex-col bg-[#020617]">

    <!-- Simple Navigation -->
    <nav class="glass-nav sticky top-0 z-50 border-b border-white/5 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <!-- Logo -->
                <div onclick="window.location.href='/'" class="flex items-center gap-2 group cursor-pointer">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center transition-transform group-hover:rotate-[360deg] duration-700">
                        <i class="fas fa-feather-alt text-black text-sm"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white syne uppercase">LMHUB</span>
                </div>
                
                <!-- Center Links -->
                <div class="hidden md:flex items-center space-x-12">
                    <a href="/" class="nav-link text-sm font-medium text-gray-400 hover:text-white transition">Discover</a>
                    <a href="#" class="nav-link text-sm font-medium text-gray-400 hover:text-white transition">Trending</a>
                    <a href="#" class="nav-link text-sm font-medium text-gray-400 hover:text-white transition">Authors</a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-6">
                    <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
                    
                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <!-- Dynamic Dashboard Link based on Role -->
                        <?php 
                            $dashboardPath = '/profile'; // Default
                            if ($_SESSION['user_role'] === 'ADMIN') {
                                $dashboardPath = '/admin/dashboard';
                            } elseif ($_SESSION['user_role'] === 'AUTHOR') {
                                $dashboardPath = '/author/dashboard';
                            }
                        ?>
                        <a href="<?= $dashboardPath ?>" class="flex items-center gap-2 text-sm font-bold text-blue-400 hover:text-blue-300 transition">
                            <i class="fas fa-columns text-xs"></i>
                            Dashboard
                        </a>

                        <a href="/profile" class="text-sm font-bold text-gray-200 hover:text-white transition">Profile</a>
                        <a href="/logout" class="text-sm font-bold text-red-400 hover:text-red-200 transition">Logout</a>
                    
                    <?php else: ?>
                        <a href="/login" class="text-sm font-bold text-gray-400 hover:text-white transition">Login</a>
                        <a href="/register" class="bg-white text-black px-6 py-2 rounded-full text-xs font-bold active:scale-95 transition-all shadow-lg hover:bg-gray-200">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>