
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617]">

    <div class="w-full max-w-4xl animate-reveal">
        <!-- Header -->
        <header class="mb-8 flex justify-between items-center">
            <div>
                <a href="/author/dashboard" class="text-xs font-bold text-slate-500 hover:text-blue-400 transition uppercase tracking-widest mb-1 block">
                    <i class="fas fa-arrow-left mr-1"></i> Dashboard
                </a>
                <h1 class="text-4xl font-extrabold syne tracking-tighter">New Article</h1>
            </div>
            <div class="w-12 h-12 glass-card flex items-center justify-center">
                <i class="fas fa-pen-nib text-blue-400"></i>
            </div>
        </header>

        <!-- Form Card -->
        <div class="glass-card p-8 md:p-12">
            <form action="handle_article.php" method="POST" class="space-y-8">
                
                <!-- Title -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Protocol Title</label>
                    <input type="text" name="title" placeholder="Enter article title..." required
                        class="input-style w-full px-6 py-5 rounded-2xl text-lg font-bold placeholder-slate-700">
                </div>

                <!-- Categories (Multi-select) -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Select Categories</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <!-- You will loop through your categories table here -->
                        <label class="cursor-pointer">
                            <input type="checkbox" name="categories[]" value="1" class="hidden peer">
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                Technology
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="checkbox" name="categories[]" value="2" class="hidden peer">
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                Science
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="checkbox" name="categories[]" value="3" class="hidden peer">
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                Design
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="checkbox" name="categories[]" value="4" class="hidden peer">
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                Lifestyle
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Article Content</label>
                    <textarea name="content" rows="12" placeholder="Start writing your protocol..." required
                        class="input-style w-full px-6 py-6 rounded-2xl text-sm leading-relaxed placeholder-slate-700 resize-none"></textarea>
                </div>

                <!-- Action -->
                <div class="pt-4 flex items-center justify-between gap-6">
                    <p class="text-[10px] text-slate-500 font-medium max-w-xs italic">
                        By publishing, this article will be linked to your Author Identity and stored in the LMHubDB registry.
                    </p>
                    <button type="submit" class="btn-gradient px-12 py-5 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em] shadow-lg shadow-blue-500/20">
                        Publish Article
                    </button>
                </div>

            </form>
        </div>

        <footer class="mt-12 text-center">
            <p class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-800">System Ready // LMHub v2.0</p>
        </footer>
    </div>

</div>