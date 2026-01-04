
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617]">

    <div class="w-full max-w-4xl">

    <!-- Main Workspace -->
    <main class="p-8 lg:p-12">
        <header class="mb-10">
            <h1 class="text-4xl font-extrabold syne tracking-tighter">My Collection</h1>
            <p class="text-slate-500 text-sm mt-1">Stored protocols and interactions.</p>
        </header>

        <!-- Simplified Metrics -->
        <div class="grid grid-cols-2 gap-6 mb-12">
            <div class="glass-card p-6">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Article Likes</p>
                <h3 class="text-3xl font-bold">24</h3>
            </div>
            <div class="glass-card p-6">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Comments</p>
                <h3 class="text-3xl font-bold">08</h3>
            </div>
        </div>

        <!-- Liked Articles List -->
        <div class="space-y-4">
            <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-600 mb-6 px-2">Recently Liked Articles</h2>

            <!-- Start PHP Loop -->
            <div class="glass-card p-5 flex items-center justify-between list-item">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 border border-blue-500/10">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-base">Neural Link v4 Architecture</h4>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">
                            Author: Aris Thorne • <span class="opacity-50">Jan 04, 2026</span>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="article_details.html" class="px-5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition">
                        Read
                    </a>
                </div>
            </div>
            <!-- End PHP Loop -->

            <!-- Example 2 -->
            <div class="glass-card p-5 flex items-center justify-between list-item">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 border border-purple-500/10">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-base">Quantum Physics in Design</h4>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">
                            Author: Sienna Moss • <span class="opacity-50">Dec 28, 2025</span>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="article_details.html" class="px-5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition">
                        Read
                    </a>
                </div>
            </div>

        </div>
    </main>

    </div>

</div>
