
<body class="p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        
        <!-- Header & Search Bar -->
        <header class="mb-12 text-center">
            <h1 class="text-5xl font-extrabold syne tracking-tighter mb-8">Discover <span class="text-blue-500">Insights.</span></h1>
            
            <div class="relative max-w-2xl mx-auto">
                <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 text-lg"></i>
                <input type="text" placeholder="Search for protocols, authors, or topics..." 
                    class="search-input w-full pl-16 pr-8 py-6 rounded-[2.5rem] text-lg font-medium">
            </div>
        </header>

        <!-- Category Filters (Dynamic from DB) -->
        <section class="mb-12">
            <div class="flex flex-wrap justify-center gap-3">
                <div class="filter-pill active px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest">All</div>
                <!-- Loop your categories table here -->
                <div class="filter-pill px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest">Technology</div>
                <div class="filter-pill px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest">Science</div>
                <div class="filter-pill px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest">Design</div>
                <div class="filter-pill px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest">AI Hub</div>
            </div>
        </section>

        <!-- Results Grid -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Article Card (Repeatable) -->
            <a href="article_details.html" class="glass-card p-8 flex flex-col group">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-[10px] font-black uppercase tracking-widest text-blue-400">Technology</span>
                </div>
                <h3 class="text-xl font-bold syne leading-tight mb-4 group-hover:text-blue-400 transition-colors">
                    The Future of Neural Networks in Edge Computing
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-8 flex-grow opacity-70">
                    Exploring how localized AI models are reshaping the way we process data on the fly...
                </p>
                <div class="flex items-center justify-between mt-auto pt-6 border-t border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold uppercase">JV</div>
                        <span class="text-xs font-bold text-slate-300">Julian Vance</span>
                    </div>
                    <div class="flex gap-3 text-[10px] text-slate-500">
                        <span><i class="fas fa-heart mr-1 text-red-500/50"></i> 124</span>
                    </div>
                </div>
            </a>

            <!-- Another Card -->
            <div class="glass-card p-8 flex flex-col group opacity-60">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-[10px] font-black uppercase tracking-widest text-purple-400">Science</span>
                </div>
                <h3 class="text-xl font-bold syne leading-tight mb-4">
                    Quantum Decay: The Silence of Subatomic Particles
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-8 flex-grow">
                    Investigating the latest breakthroughs in quantum stability and noise reduction...
                </p>
                <div class="flex items-center justify-between mt-auto pt-6 border-t border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold uppercase">ST</div>
                        <span class="text-xs font-bold text-slate-300">Sienna Thorne</span>
                    </div>
                    <div class="flex gap-3 text-[10px] text-slate-500">
                        <span><i class="fas fa-heart mr-1"></i> 89</span>
                    </div>
                </div>
            </div>

        </section>

        <!-- No Results / Suggestion State (Hidden by default) -->
        <div class="hidden text-center py-20">
            <i class="fas fa-search-minus text-4xl text-slate-700 mb-6"></i>
            <h2 class="text-2xl font-bold syne mb-2">No protocols found.</h2>
            <p class="text-slate-500 text-sm">Try adjusting your search terms or explore a different category.</p>
        </div>

    </div>

    <!-- Simple Footer -->
    <footer class="mt-24 text-center pb-12">
        <p class="text-[9px] font-black uppercase tracking-[0.6em] text-slate-800">LMHub // Discovery Registry 2.0</p>
    </footer>

</body>
