
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
            
            <!-- Left Side: Add/Edit Form -->
            <div class="lg:col-span-2">
                <div class="glass-container p-8 rounded-[2.5rem] sticky top-8">
                    <?php $editing = isset($_GET['edit']) ? (int)$_GET['edit'] : null; ?>
                    <?php if ($editing):
                        $editCat = null;
                        foreach ($categories as $c) { if ($c['id'] == $editing) { $editCat = $c; break; } }
                    ?>
                        <h2 class="text-xl font-bold syne mb-6">Edit Category</h2>
                        <form action="/admin/category/update" method="POST" class="space-y-6">
                            <input type="hidden" name="id" value="<?= $editCat['id'] ?? '' ?>">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Category Name</label>
                                <div class="relative group">
                                    <i class="fas fa-hashtag absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                                    <input type="text" name="name" placeholder="Category name" value="<?= htmlspecialchars($editCat['name'] ?? '') ?>"
                                        class="input-style w-full pl-14 pr-6 py-4 rounded-2xl text-sm font-medium text-white placeholder-slate-700">
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <button type="submit" class="btn-premium flex-1 py-4 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em]">Update</button>
                                <a href="/admin/add-category" class="btn-premium flex-1 py-4 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em] bg-gray-600">Cancel</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <h2 class="text-xl font-bold syne mb-6">Register New Category</h2>
                        <form action="/admin/add-category" method="POST" class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-2">Category Name</label>
                                <div class="relative group">
                                    <i class="fas fa-hashtag absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                                    <input type="text" name="name" placeholder="e.g. Artificial Intelligence" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                                        class="input-style w-full pl-14 pr-6 py-4 rounded-2xl text-sm font-medium text-white placeholder-slate-700">
                                </div>
                            </div>

                            <?php if(!empty($errors['name'])): ?><p class="text-sm text-red-400"><?= $errors['name'] ?></p><?php endif; ?>

                            <button type="submit" class="btn-premium w-full py-4 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em]">
                                Save Category
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Side: Category List -->
            <div class="lg:col-span-3">
                <div class="glass-container p-8 rounded-[2.5rem]">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold syne">Active Protocols</h2>
                        <span class="text-[10px] bg-white/5 px-3 py-1 rounded-full font-black text-slate-500 uppercase">Total : <?= count($categories) ?></span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php if (!empty($categories)): foreach ($categories as $cat): ?>
                            <div class="category-item p-4 rounded-2xl flex items-center justify-between group">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-300 text-xs">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <span class="text-sm font-bold"><?= htmlspecialchars($cat['name']) ?></span>
                                </div>
                                <div class="flex items-center gap-3 opacity-0 group-hover:opacity-100 transition">
                                    <a href="/admin/add-category?edit=<?= $cat['id'] ?>" class="text-blue-400 hover:text-white"><i class="fas fa-edit text-xs"></i></a>
                                    <a href="/admin/category/delete?id=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')" class="text-red-400 hover:text-white"><i class="fas fa-trash-alt text-xs"></i></a>
                                </div>
                            </div>
                        <?php endforeach; else: ?>
                            <p class="text-sm text-slate-400">No categories yet.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
