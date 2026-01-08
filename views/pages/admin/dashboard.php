

    <!-- Main Content -->
    <main class="flex-grow p-4 md:p-10 lg:p-12 overflow-y-auto">
        
        <!-- Top Bar -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-extrabold syne tracking-tighter">LMHub Command</h1>
                <p class="text-slate-500 text-sm mt-1">Database status: <span class="text-green-400 font-bold">Connected</span></p>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Add Category Button -->
                <a href="/admin/add-category" class="btn-premium flex items-center gap-2 px-6 py-3 rounded-2xl text-white text-xs font-bold tracking-widest uppercase">
                    <i class="fas fa-plus"></i>
                    Add Category
                </a>
                
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="text" placeholder="Search..." class="bg-white/5 border border-white/10 rounded-2xl py-3 pl-12 pr-6 text-sm focus:outline-none focus:border-blue-500/50 w-full md:w-64 transition-all text-white">
                </div>
            </div>
        </header>

        <!-- Stats Grid -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-12 animate-fade">
            <div class="glass-card p-6 rounded-[2rem]">
                <div class="flex justify-between items-start mb-4">
                    <div class="icon-box blue-gradient">
                        <i class="fas fa-newspaper text-white"></i>
                    </div>
                    <span class="text-green-400 text-xs font-bold">+24%</span>
                </div>
                <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Total Articles</p>
                <h3 class="text-2xl font-bold mt-1">1,204</h3>
            </div>

            <div class="glass-card p-6 rounded-[2rem]">
                <div class="flex justify-between items-start mb-4">
                    <div class="icon-box purple-gradient">
                        <i class="fas fa-user-edit text-white"></i>
                    </div>
                    <span class="text-blue-400 text-xs font-bold">8 Active</span>
                </div>
                <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Total Authors</p>
                <h3 class="text-2xl font-bold mt-1">156</h3>
            </div>

            <div class="glass-card p-6 rounded-[2rem]">
                <div class="flex justify-between items-start mb-4">
                    <div class="icon-box bg-slate-800">
                        <i class="fas fa-comments text-white"></i>
                    </div>
                    <span class="text-slate-400 text-xs font-bold">New Today</span>
                </div>
                <p class="text-slate-500 text-xs font-black uppercase tracking-widest">User Comments</p>
                <h3 class="text-2xl font-bold mt-1">4,852</h3>
            </div>

            <div class="glass-card p-6 rounded-[2rem]">
                <div class="flex justify-between items-start mb-4">
                    <div class="icon-box red-gradient">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                    <span class="text-red-400 text-xs font-bold">Critical</span>
                </div>
                <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Pending Reports</p>
                <h3 class="text-2xl font-bold mt-1">14</h3>
            </div>
        </section>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            
            <!-- Articles Management (Table) -->
            <div class="xl:col-span-2 glass-card rounded-[2.5rem] overflow-hidden animate-fade" style="animation-delay: 0.1s">
                <div class="p-8 border-b border-white/5 flex items-center justify-between">
                    <h2 class="text-xl font-bold syne">Latest Articles</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full custom-table">
                        <thead>
                            <tr>
                                <th>Article Title</th>
                                <th>Author Name</th>
                                <th>Created Date</th>
                                <th>Categories</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (($articles ?? []) as $a): ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <span class="font-bold"><?= htmlspecialchars($a['title']) ?></span>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($a['author_name'] ?? 'unknoown') ?></td>
                                <td class="text-slate-400"><?= htmlspecialchars($a['created_at']) ?></td>
                                <td>
                                    <span class="px-2 py-1 bg-white/5 rounded-md text-[9px] uppercase font-bold text-slate-400"><?= htmlspecialchars($a['categories'] ?? 'Uncategorized') ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Side System Monitor -->
            <div class="space-y-8 animate-fade" style="animation-delay: 0.2s">
                <!-- Reports & Moderation Activity -->
                <div class="glass-card p-8 rounded-[2.5rem]">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-xl font-bold syne text-red-400/80">Active Reports</h2>
                    </div>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-[2px] h-10 bg-red-500 rounded-full shadow-[0_0_10px_rgba(239,68,68,0.5)]"></div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-start">
                                    <p class="text-sm font-bold">Toxic Comment</p>
                                    <span class="text-[8px] bg-red-500/20 text-red-400 px-2 py-0.5 rounded uppercase font-black">Pending</span>
                                </div>
                                <p class="text-xs text-slate-500">Article #12 • Reporter: user_99</p>
                                <p class="text-[9px] text-slate-600 mt-1 uppercase font-black">Just Now</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-[2px] h-10 bg-green-500 rounded-full"></div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-start">
                                    <p class="text-sm font-bold">Inappropriate Content</p>
                                    <span class="text-[8px] bg-green-500/20 text-green-400 px-2 py-0.5 rounded uppercase font-black">Resolved</span>
                                </div>
                                <p class="text-xs text-slate-500">Article #05 • Comment Hidden</p>
                                <p class="text-[9px] text-slate-600 mt-1 uppercase font-black">2h ago</p>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/reports" class="w-full mt-10 py-4 bg-white/5 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition inline-block text-center">Moderate All</a>
                </div>

                
            </div>
        </div>

    </main>