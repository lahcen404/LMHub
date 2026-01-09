<!-- Simplified Hero Section -->
<header class="relative pt-24 pb-20 overflow-hidden text-center">
    <div class="max-w-4xl mx-auto px-4 relative z-10 animate-reveal">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6 syne">
            Explore the stories <br> 
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">that move the world.</span>
        </h1>
        <p class="max-w-xl mx-auto text-lg text-slate-500 font-medium mb-12">
            A minimalist space for high-quality insights, deep research, and creative storytelling.
        </p>
        
        <div class="max-w-lg mx-auto relative group">
            <input type="text" placeholder="Find your next read..." class="w-full pl-12 pr-4 py-4 rounded-2xl bg-white/5 border border-white/10 text-white focus:outline-none focus:border-blue-500/50 transition-all shadow-2xl">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-500 transition-colors"></i>
        </div>
    </div>
    
    <!-- Subtle Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 animate-reveal" style="animation-delay: 0.1s">
    
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-2xl font-bold text-white tracking-tight syne">Latest Discoveries</h2>
        <a href="#" class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-white transition group">
            View all <i class="fas fa-chevron-right ml-1 text-[10px] group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <!-- Article Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php if(!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                
                <article class="glass-card rounded-[28px] p-4 group flex flex-col h-full border border-white/5 bg-white/[0.02] hover:bg-white/[0.04] transition-all">
                    
                    <div class="overflow-hidden rounded-[20px] aspect-[16/10] relative">
                        <img src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?auto=format&fit=crop&q=80&w=800" alt="Tech" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute bottom-4 left-4 text-[9px] font-black px-3 py-1 bg-blue-500/20 backdrop-blur-md text-blue-400 rounded-full uppercase tracking-widest border border-blue-500/30">
                            <?= htmlspecialchars($article['categories'] ?? 'Insight') ?>
                        </span>
                    </div>
                    
                    <div class="px-2 py-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-tr from-blue-600 to-purple-600 flex items-center justify-center text-[8px] font-bold text-white">
                                <?= strtoupper(substr($article['author_name'], 0, 1)) ?>
                            </div>
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest"><?= htmlspecialchars($article['author_name']) ?></span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors syne leading-snug">
                            <?= htmlspecialchars($article['title']) ?>
                        </h3>
                        
                        <div class="mt-auto flex items-center justify-between pt-6 border-t border-white/5">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-1.5 text-slate-500">
                                    <i class="far fa-heart text-xs"></i>
                                    <span class="text-[10px] font-bold"><?= number_format($article['likes'] ?? 0) ?></span>
                                </div>
                                <div class="flex items-center gap-1.5 text-slate-500">
                                    <i class="far fa-comment text-xs"></i>
                                    <span class="text-[10px] font-bold"><?= number_format($article['comments_count'] ?? 0) ?></span>
                                </div>
                            </div>
                            <!-- Corrected the Link -->
                            <a href="/articles/details?id=<?= $article['id'] ?>" class="text-[10px] font-black uppercase tracking-widest text-blue-500 hover:text-blue-400 transition-colors">
                                Read Article
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full py-20 text-center">
                <p class="text-slate-600 uppercase font-black tracking-[0.3em] text-xs">No articles Disponiible !!</p>
            </div>
        <?php endif; ?>

    </div>
</main>