
<body class="selection:bg-blue-500/30">

    <!-- Subtle Background Atmosphere -->
    <div class="aura bg-blue-600 -top-1/4 -left-1/4"></div>
    <div class="aura bg-purple-600 -bottom-1/4 -right-1/4"></div>

    <!-- Article Wrapper -->
    <article class="max-w-4xl mx-auto px-6 py-20">
        
        <!-- Navigation Back -->
        <nav class="mb-12">
            <a href="/" class="text-xs font-bold text-slate-500 hover:text-blue-400 transition uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Back to Discovery
            </a>
        </nav>

        <!-- Header: Metadata -->
        <header class="mb-16">
            <div class="flex flex-wrap gap-2 mb-6">
                <?php foreach (explode(',', $article['categories']) as $cat): ?>
                    <span class="px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-[10px] font-black uppercase tracking-widest text-blue-400"><?= htmlspecialchars(trim($cat)) ?></span>
                <?php endforeach; ?>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold text-white syne tracking-tighter leading-[1.1] mb-8">
                <?= htmlspecialchars($article['title']) ?>
            </h1>

            <div class="flex items-center justify-between py-8 border-y border-white/5">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-500 to-purple-500 p-[1px]">
                        <div class="w-full h-full bg-[#020617] rounded-2xl flex items-center justify-center font-bold text-white text-xs">AV</div>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white"><?= htmlspecialchars($article['author_name']) ?></p>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-500">Author Identity </p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-600"><?= htmlspecialchars($article['created_at']) ?></span>
                </div>
            </div>
        </header>

        <!-- Main Body Content -->
        <section class="content-area mb-20">
            <p class="mb-8">
                <?= htmlspecialchars($article['content']) ?>
            </p>


           
        </section>

        <!-- Engagement Bar (Likes/Shares) -->
        <section class="glass-card rounded-[2rem] p-6 mb-16 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <button class="action-btn flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/5 liked">
                    <i class="fas fa-heart"></i>
                    <span class="text-xs font-bold text-white">1,240</span>
                </button>
            </div>
            
            <button class="text-xs font-bold text-slate-500 hover:text-red-400 transition uppercase tracking-widest">
                <i class="fas fa-flag mr-2"></i> Report
            </button>
        </section>

        <!-- Comments Section -->
        <section class="space-y-10">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold syne text-white">Conversations</h3>
                <span class="text-xs font-black uppercase text-slate-600 tracking-[0.3em]">18 Responses</span>
            </div>

            <!-- Comment Form -->
            <div class="glass-card p-6 rounded-[2rem]">
                <form action="#" method="POST" class="space-y-4">
                    <textarea placeholder="Join the discussion..." 
                        class="w-full bg-black/20 border border-white/5 rounded-2xl p-6 text-sm text-white focus:outline-none focus:border-blue-500/50 resize-none min-h-[120px]"></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-8 py-3 rounded-xl text-white font-bold text-xs uppercase tracking-widest transition shadow-lg shadow-blue-500/20">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>

            <!-- List of Comments -->
            <div class="space-y-8">
                <!-- Single Comment Block -->
                <div class="flex gap-6 p-2">
                    <div class="w-10 h-10 rounded-full bg-slate-800 flex-shrink-0 flex items-center justify-center font-bold text-[10px]">SM</div>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-white">Sienna Moss</span>
                            <span class="text-[9px] font-black text-slate-600 uppercase">2h ago</span>
                        </div>
                        <p class="text-sm leading-relaxed text-slate-400">
                            This is a fascinating breakdown. Have you looked into how this impacts the latency for autonomous vehicle sensors specifically?
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </article>

    <!-- Simple Page Footer -->
    <footer class="py-20 text-center border-t border-white/5">
        <p class="text-[9px] font-black uppercase tracking-[0.6em] text-slate-800">LMHUB PROTOCOL // PUBLISHED ARTICLE</p>
    </footer>

</body>
