

    <!-- Simplified Hero Section -->
    <header class="relative pt-24 pb-20 overflow-hidden text-center">
        <div class="max-w-4xl mx-auto px-4 relative z-10 animate-reveal">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6 syne">
                Explore the stories <br> 
                <span class="gradient-text">that move the world.</span>
            </h1>
            <p class="max-w-xl mx-auto text-lg text-gray-500 font-medium mb-12">
                A minimalist space for high-quality insights, deep research, and creative storytelling.
            </p>
            
            <div class="max-w-lg mx-auto relative group">
                <input type="text" placeholder="Find your next read..." class="w-full pl-12 pr-4 py-4 rounded-2xl bg-white/5 border border-white/10 text-white focus:outline-none focus:border-blue-500/50 transition-all shadow-2xl">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-600 group-focus-within:text-blue-500 transition-colors"></i>
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
            <a href="#" class="text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-white transition group">
                View all <i class="fas fa-chevron-right ml-1 text-[10px] group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Article Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Article Card 1 -->
            <article class="article-card rounded-[28px] p-4 group">
                <div class="image-zoom-container aspect-[16/10] relative">
                    <img src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?auto=format&fit=crop&q=80&w=800" alt="Tech" class="w-full h-full object-cover image-zoom">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-4 left-4 text-[9px] font-black px-3 py-1 bg-blue-500/20 backdrop-blur-md text-blue-400 rounded-full uppercase tracking-widest border border-blue-500/30">Technology</span>
                </div>
                
                <div class="px-4 py-6">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="https://i.pravatar.cc/100?u=12" class="w-7 h-7 rounded-full border border-white/10" alt="Author">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Evelyn Harper</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors syne leading-snug">
                        How AI is Redefining the Architecture of Sleep
                    </h3>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <div class="flex items-center gap-6">
                            <!-- Animated Heart Icon -->
                            <button class="interaction-btn like-btn">
                                <i class="far fa-heart"></i>
                                <span class="text-xs font-bold">1.4k</span>
                            </button>
                            <!-- Animated Comment Icon -->
                            <button class="interaction-btn comment-btn">
                                <i class="far fa-comment"></i>
                                <span class="text-xs font-bold">52</span>
                            </button>
                        </div>
                        <button class="read-article-btn">Read Article</button>
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="article-card rounded-[28px] p-4 group">
                <div class="image-zoom-container aspect-[16/10] relative">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&q=80&w=800" alt="Nature" class="w-full h-full object-cover image-zoom">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-4 left-4 text-[9px] font-black px-3 py-1 bg-purple-500/20 backdrop-blur-md text-purple-400 rounded-full uppercase tracking-widest border border-purple-500/30">Environment</span>
                </div>
                
                <div class="px-4 py-6">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="https://i.pravatar.cc/100?u=45" class="w-7 h-7 rounded-full border border-white/10" alt="Author">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Julian Vance</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-purple-400 transition-colors syne leading-snug">
                        The Vanishing Glaciers of the Southern Andes
                    </h3>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <div class="flex items-center gap-6">
                            <button class="interaction-btn like-btn">
                                <i class="far fa-heart"></i>
                                <span class="text-xs font-bold">2.1k</span>
                            </button>
                            <button class="interaction-btn comment-btn">
                                <i class="far fa-comment"></i>
                                <span class="text-xs font-bold">89</span>
                            </button>
                        </div>
                        <button class="read-article-btn">Read Article</button>
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="article-card rounded-[28px] p-4 group">
                <div class="image-zoom-container aspect-[16/10] relative">
                    <img src="https://images.unsplash.com/photo-1579546678183-a848499b0d6e?auto=format&fit=crop&q=80&w=800" alt="Culture" class="w-full h-full object-cover image-zoom">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-4 left-4 text-[9px] font-black px-3 py-1 bg-indigo-500/20 backdrop-blur-md text-indigo-400 rounded-full uppercase tracking-widest border border-indigo-500/30">Style</span>
                </div>
                
                <div class="px-4 py-6">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="https://i.pravatar.cc/100?u=9" class="w-7 h-7 rounded-full border border-white/10" alt="Author">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Sienna Ross</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-indigo-400 transition-colors syne leading-snug">
                        Why Retro-Minimalism is 2026's Biggest Trend
                    </h3>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <div class="flex items-center gap-6">
                            <button class="interaction-btn like-btn">
                                <i class="far fa-heart"></i>
                                <span class="text-xs font-bold">3.4k</span>
                            </button>
                            <button class="interaction-btn comment-btn">
                                <i class="far fa-comment"></i>
                                <span class="text-xs font-bold">120</span>
                            </button>
                        </div>
                        <button class="read-article-btn">Read Article</button>
                    </div>
                </div>
            </article>

        </div>
    </main>

