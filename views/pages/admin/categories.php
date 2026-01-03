
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617]">

    <!-- Immersive Background -->
    <div class="aura aura-blue"></div>
    <div class="aura aura-purple"></div>

    <div class="w-full max-w-4xl animate-reveal">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-10">
            <div>
                <a href="/admin/dashboard" class="text-slate-500 hover:text-white transition flex items-center gap-2 text-xs font-bold uppercase tracking-widest mb-2">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
                <h1 class="text-4xl font-extrabold syne tracking-tighter">Category Lab</h1>
            </div>
            <div class="w-12 h-12 glass-container rounded-2xl flex items-center justify-center">
                <i class="fas fa-tags text-blue-400"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            
            <!-- Left Side: Add Form -->
            <div class="lg:col-span-2">
                <div class="glass-container p-8 rounded-[2.5rem] sticky top-8">
                    <h2 class="text-xl font-bold syne mb-6">Register New Category</h2>
                    <form action="#" method="POST" class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Category Name</label>
                            <div class="relative group">
                                <i class="fas fa-hashtag absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                                <input type="text" name="name" placeholder="e.g. Artificial Intelligence" required
                                    class="input-style w-full pl-14 pr-6 py-4 rounded-2xl text-sm font-medium text-white placeholder-slate-700">
                            </div>
                        </div>

                        <button type="submit" class="btn-premium w-full py-4 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em]">
                            Save Category
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side: Category List -->
            <div class="lg:col-span-3">
                <div class="glass-container p-8 rounded-[2.5rem]">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold syne">Active Protocols</h2>
                        <span class="text-[10px] bg-white/5 px-3 py-1 rounded-full font-black text-slate-500 uppercase">12 Total</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Category Item -->
                        <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400 text-xs">
                                    <i class="fas fa-code"></i>
                                </div>
                                <span class="text-sm font-bold">Technology</span>
                            </div>
                            <button class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>

                        <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-400 text-xs">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <span class="text-sm font-bold">Science</span>
                            </div>
                            <button class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>

                        <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-green-500/10 flex items-center justify-center text-green-400 text-xs">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <span class="text-sm font-bold">Sustainability</span>
                            </div>
                            <button class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>

                        <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-yellow-500/10 flex items-center justify-center text-yellow-400 text-xs">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <span class="text-sm font-bold">Design</span>
                            </div>
                            <button class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                        
                        <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-red-500/10 flex items-center justify-center text-red-400 text-xs">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <span class="text-sm font-bold">Health</span>
                            </div>
                            <button class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Pagination / Footer -->
                    <div class="mt-8 pt-8 border-t border-white/5 text-center">
                        <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-700">
                            LMHUB // DATA PROTOCOL 2.0
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
