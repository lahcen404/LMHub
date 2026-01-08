
<body class="flex min-h-screen">

    <!-- Background Decoration -->
    <div class="aura bg-blue-600 top-[-10%] left-[-10%]" style="animation: drift 15s infinite alternate ease-in-out;"></div>
    <div class="aura bg-purple-600 bottom-[-10%] right-[-10%]" style="animation: drift 20s infinite alternate-reverse ease-in-out;"></div>

    <!-- Main Workspace -->
    <main class="flex-grow p-6 md:p-12">
        
        <!-- Top Bar -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-extrabold syne tracking-tighter">Welcome back, Author</h1>
                <p class="text-slate-500 text-sm mt-1">Review your latest insights and performance.</p>
            </div>
            <a href="/author/add-article" class="btn-gradient px-8 py-4 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em]">
                <i class="fas fa-pen-nib mr-2"></i> Add New Article
            </a>
        </header>

        <!-- Stats Grid (Articles, Likes, Comments) -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="glass-card p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-400">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                    <span class="text-xs font-black uppercase text-slate-600 tracking-tighter">Published</span>
                </div>
                <h3 class="text-3xl font-bold mb-1">24</h3>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500">Total Articles</p>
            </div>

            <div class="glass-card p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-red-500/10 rounded-2xl flex items-center justify-center text-red-400">
                        <i class="fas fa-heart text-xl"></i>
                    </div>
                    <span class="text-xs font-black uppercase text-slate-600 tracking-tighter">Engagement</span>
                </div>
                <h3 class="text-3xl font-bold mb-1">1.2k</h3>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500">Total Appreciation</p>
            </div>

            <div class="glass-card p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-purple-500/10 rounded-2xl flex items-center justify-center text-purple-400">
                        <i class="fas fa-comments text-xl"></i>
                    </div>
                    <span class="text-xs font-black uppercase text-slate-600 tracking-tighter">Active</span>
                </div>
                <h3 class="text-3xl font-bold mb-1">482</h3>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500">System Comments</p>
            </div>
        </section>

        <!-- Recent Articles Table -->
        <div class="glass-card overflow-hidden">
            <div class="p-8 border-b border-white/5 flex items-center justify-between">
                <h2 class="text-xl font-bold syne">Manage Protocols</h2>
                <div class="text-[10px] font-black uppercase text-slate-600 tracking-widest">Article Library</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full custom-table">
                    <thead>
                        <tr>
                            <th class="text-left">Protocol Title</th>
                            <th class="text-left">Interactions</th>
                            <th class="text-left">Created At</th>
                            <th class="text-right">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (($articles ?? []) as $a): ?>
                        <tr class="group">
                            <td>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center group-hover:bg-blue-500/10 transition-colors">
                                        <i class="far fa-file-alt text-slate-500 group-hover:text-blue-400"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold"><?= htmlspecialchars($a['title']) ?></p>
                                        <p class="text-[10px] text-slate-500 uppercase font-black">Category: <?= htmlspecialchars($a['categories'] ?? 'Uncategorized') ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-4 text-xs font-bold text-slate-400">
                                    <span><i class="far fa-heart mr-1"></i> 0</span>
                                    <span><i class="far fa-comment mr-1"></i> 0</span>
                                </div>
                            </td>
                            <td class="text-xs font-medium text-slate-500"><?= date('M d, Y', strtotime($a['created_at'])) ?></td>
                            <td class="text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="/author/edit-article?id=<?= $a['id'] ?>" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-white/10 transition">
                                        <i class="fas fa-edit text-[10px] text-blue-400"></i>
                                    </a>
                                    <a href="/author/delete-article?id=<?= $a['id'] ?>" onclick="return confirm('Delete this article?')" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-red-500/20 group/del transition">
                                        <i class="fas fa-trash-alt text-[10px] text-slate-500 group-hover/del:text-red-400"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-20 text-center">
            <span class="text-[9px] font-black uppercase tracking-[0.5em] text-slate-800">Author Hub Interface // LMHub v2.0</span>
        </footer>
    </main>

</body>
