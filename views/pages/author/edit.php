
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617]">

    <div class="w-full max-w-4xl animate-reveal">
        <!-- Header -->
        <header class="mb-8 flex justify-between items-end">
            <div>
                <a href="/author/dashboard" class="text-xs font-bold text-slate-500 hover:text-blue-400 transition uppercase tracking-widest mb-1 block">
                    <i class="fas fa-arrow-left mr-1"></i> Return to Dashboard
                </a>
                <h1 class="text-4xl font-extrabold syne tracking-tighter">Edit Protocol</h1>
                <p class="text-slate-500 text-xs font-medium uppercase tracking-widest mt-1">Article ID: <span class="text-blue-500">#ART-2204</span></p>
            </div>
            <div class="w-12 h-12 glass-card flex items-center justify-center">
                <i class="fas fa-edit text-purple-400"></i>
            </div>
        </header>

        <!-- Form Card -->
        <div class="glass-card p-8 md:p-12">
            <form action="/author/update-article" method="POST" class="space-y-8">
                <!-- id  -->
                <input type="hidden" name="article_id" value="<?= htmlspecialchars($article['id'] ?? '') ?>">
                
                <!-- Title -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Protocol Title</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($article['title'] ?? '') ?>" required
                        class="input-style w-full px-6 py-5 rounded-2xl text-lg font-bold">
                </div>

                <!-- Categories -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Assigned Categories</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <?php $sel = $selected ?? []; ?>
                        <?php foreach (($categories ?? []) as $cat): ?>
                        <label class="cursor-pointer">
                            <input type="checkbox" name="category_ids[]" value="<?= $cat['id'] ?>" class="hidden peer" <?= in_array($cat['id'], $sel) ? 'checked' : '' ?>>
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                <?= htmlspecialchars($cat['name']) ?>
                            </div>
                        </label>
                        <?php endforeach; ?>
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
                            <input type="checkbox" name="categories[]" value="4" class="hidden peer" >
                            <div class="p-3 text-center rounded-xl border border-white/5 bg-white/5 text-xs font-bold text-slate-500 peer-checked:border-blue-500 peer-checked:text-blue-400 peer-checked:bg-blue-500/10 transition-all">
                                AI Hub
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Article Content</label>
                    <textarea name="content" rows="12" required
                        class="input-style w-full px-6 py-6 rounded-2xl text-sm leading-relaxed resize-none"><?= htmlspecialchars($article['content'] ?? '') ?></textarea>
                </div>

                <!-- Action Footer -->
                <div class="pt-6 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-6">
                    
                    <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto justify-end">
                        <button type="button" onclick="window.history.back()" class="px-6 md:px-10 py-3 md:py-5 rounded-2xl bg-white/5 border border-white/10 text-white font-bold text-xs uppercase tracking-[0.2em] hover:bg-white/10 transition">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 md:px-10 py-3 md:py-5 rounded-2xl bg-blue-500/90 text-white font-bold text-xs uppercase tracking-[0.2em] hover:bg-blue-600 transition">
                            Update Article
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <footer class="mt-12 text-center">
            <span class="text-[9px] font-black uppercase tracking-[0.6em] text-slate-800">MODIFICATION INTERFACE // LMHub v2.0</span>
        </footer>
    </div>

</div>
