
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
                 <!-- Post Like Toggle Form -->
                <form action="/article/like" method="POST">
                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                    <button type="submit" class="action-btn flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/5 transition-all hover:bg-white/5 <?= ($isArticleLiked ?? false) ? 'text-red-500 border-red-500/20 bg-red-500/5' : 'text-slate-400' ?>">
                        <i class="fas fa-heart <?= ($isArticleLiked ?? false) ? 'animate-pulse' : '' ?>"></i>
                        <span class="text-xs font-bold"><?= number_format($articleLikeCount ?? 0) ?></span>
                    </button>
                </form>
                
                <a href="#comments" class="flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/5 bg-blue-500/5 text-blue-400 transition-all hover:bg-blue-500/10">
                    <i class="fas fa-comment-dots"></i>
                    <span class="text-xs font-bold"><?= count($comments) ?></span>
                </a>
            </div>
            
            <button class="text-xs font-bold text-slate-500 hover:text-red-400 transition uppercase tracking-widest">
                <i class="fas fa-flag mr-2"></i> Report
            </button>
        </section>

       <!-- Comments Section -->
        <section id="comments" class="space-y-10 border-t border-white/5 pt-10">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold syne text-white">Conversations</h3>
                <span class="text-xs font-black uppercase text-slate-600 tracking-[0.3em]"><?= count($comments) ?> Responses</span>
            </div>

            <!-- Comment Form -->
            <?php if(isset($_SESSION['user_id'])): ?>
            <div class="glass-card p-6 rounded-[2rem] border border-white/5 bg-white/[0.02]">
                <form action="/article/comment" method="POST" class="space-y-4">
                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                    <textarea name="content" placeholder="Join the discussion..." required
                        class="w-full bg-black/20 border border-white/5 rounded-2xl p-6 text-sm text-white focus:outline-none focus:border-blue-500/50 resize-none min-h-[120px] transition-all"></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-8 py-3 rounded-xl text-white font-bold text-xs uppercase tracking-widest transition shadow-lg shadow-blue-500/20">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
            <?php else: ?>
            <div class="glass-card p-6 rounded-[2rem] border border-dashed border-white/10 text-center">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">
                    Log in to participate in the conversation. <a href="/login" class="text-blue-400">Login</a>
                </p>
            </div>
            <?php endif; ?>

            <!-- List of Comments -->
            <div class="space-y-8">
                <?php foreach($comments as $comment): ?>
                <div class="flex gap-6 p-2">
                    <!-- User Initial Avatar -->
                    <div class="w-10 h-10 rounded-full bg-slate-800 flex-shrink-0 flex items-center justify-center font-bold text-[10px] text-blue-400 border border-white/5">
                        <?= strtoupper(substr($comment['fullName'], 0, 1)) ?>
                    </div>
                    
                    <div class="space-y-2 flex-grow">
                        <!-- Comment Header -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold text-white"><?= htmlspecialchars($comment['fullName']) ?></span>
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-tighter">
                                    <?= date('H:i • d M Y', strtotime($comment['created_at'])) ?>
                                </span>
                            </div>
                            
                            <form action="/comment/report" method="POST">
                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                <button type="submit" class="text-[8px] font-black uppercase text-red-500 hover:text-red-400 transition-colors flex items-center gap-1">
                                    <i class="fas fa-flag"></i> Report
                                </button>
                            </form>
                        </div>

                        <!-- Comment Content -->
                        <p class="text-sm leading-relaxed text-slate-400">
                            <?= nl2br(htmlspecialchars($comment['content'])) ?>
                        </p>

                        <!-- Comment Appreciation Form (Like) -->
                        <div class="flex items-center pt-1">
                            <form action="/comment/like" method="POST">
                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-white/5 bg-white/[0.02] hover:bg-white/5 transition-all group/like">
                                    <i class="fas fa-heart text-[10px] <?= (isset($comment['is_liked']) && $comment['is_liked']) ? 'text-red-500' : 'text-slate-600 group-hover/like:text-red-400' ?>"></i>
                                    <span class="text-[10px] font-bold text-slate-400 group-hover/like:text-white"><?= $comment['like_count'] ?? 0 ?></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php if(empty($comments)): ?>
                    <p class="text-center py-10 text-[10px] font-black uppercase tracking-widest text-slate-700">No responses recorded yet.</p>
                <?php endif; ?>
            </div>
        </section>

    </article>

  

</body>
