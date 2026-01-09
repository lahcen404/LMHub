<body class="selection:bg-blue-500/30 bg-[#020617] text-slate-300 font-sans">

    <!-- Background Atmosphere -->
    <div class="aura bg-blue-600 fixed -top-1/4 -left-1/4 w-[80vw] h-[80vw] rounded-full blur-[160px] opacity-10 pointer-events-none -z-10"></div>
    <div class="aura bg-purple-600 fixed -bottom-1/4 -right-1/4 w-[80vw] h-[80vw] rounded-full blur-[160px] opacity-10 pointer-events-none -z-10"></div>

    <!-- Main Content -->
    <main class="flex-grow p-4 md:p-10 lg:p-12 overflow-y-auto min-h-screen">
        
        <!-- Top Bar -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-extrabold syne tracking-tighter text-white uppercase">LMHub Command</h1>
                <p class="text-slate-500 text-sm mt-1 uppercase tracking-widest text-[10px]">
                    Node status: <span class="text-emerald-400 font-bold tracking-widest">Active // Connected</span>
                </p>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="/admin/add-category" class="bg-blue-600 hover:bg-blue-500 flex items-center gap-2 px-6 py-3 rounded-2xl text-white text-xs font-bold tracking-widest uppercase transition-all shadow-lg shadow-blue-500/20">
                    <i class="fas fa-plus"></i>
                    Add Category
                </a>
                
                <div class="relative hidden lg:block">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-xs"></i>
                    <input type="text" placeholder="Protocol search..." class="bg-white/5 border border-white/10 rounded-2xl py-3 pl-12 pr-6 text-sm focus:outline-none focus:border-blue-500/50 w-64 transition-all text-white placeholder:text-slate-600">
                </div>
            </div>
        </header>

        <!-- Command Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            
            <!-- Latest Articles Registry -->
            <div class="xl:col-span-2 glass-card rounded-[2.5rem] overflow-hidden border border-white/5 bg-white/[0.01] backdrop-blur-md animate-reveal">
                <div class="p-8 border-b border-white/5 flex items-center justify-between bg-white/[0.01]">
                    <h2 class="text-xl font-bold syne text-white uppercase tracking-tighter">Article Protocols</h2>
                    <span class="text-[9px] font-black text-slate-600 uppercase tracking-[0.3em]">Latest System Sync</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black uppercase tracking-widest text-slate-500 border-b border-white/5">
                                <th class="p-6">Title & Identification</th>
                                <th class="p-6">Researcher</th>
                                <th class="p-6 text-right">Classification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <?php foreach (($articles ?? []) as $a): ?>
                            <tr class="group hover:bg-white/[0.02] transition-colors">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-500 group-hover:text-blue-400 transition-colors border border-white/5">
                                            <span class="text-[10px] font-bold">#<?= $a['id'] ?></span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-200 group-hover:text-white transition-colors"><?= htmlspecialchars($a['title']) ?></p>
                                            <p class="text-[9px] text-slate-600 uppercase font-black tracking-tighter mt-0.5">Stored: <?= date('d M Y', strtotime($a['created_at'])) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-tighter italic"><?= htmlspecialchars($a['author_name'] ?? 'System') ?></span>
                                </td>
                                <td class="p-6 text-right">
                                    <span class="px-3 py-1 bg-blue-500/5 rounded-full text-[8px] font-black uppercase tracking-widest text-blue-400/80 border border-blue-500/10">
                                        <?= htmlspecialchars($a['categories'] ?? 'Unclassified') ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            <?php if(empty($articles)): ?>
                                <tr>
                                    <td colspan="3" class="p-20 text-center">
                                        <p class="text-[10px] font-black uppercase text-slate-700 tracking-[0.4em]">No protocol records found</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Moderation Monitor Sidebar -->
            <div class="space-y-8">
                <div class="glass-card p-8 rounded-[2.5rem] border border-white/5 bg-white/[0.01] backdrop-blur-md relative overflow-hidden">
                    
                    <div class="flex justify-between items-center mb-10">
                        <h2 class="text-xl font-bold syne text-red-500/80 uppercase tracking-tighter">Live Monitor</h2>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            <span class="text-[8px] font-black text-red-500 uppercase tracking-widest">Active</span>
                        </div>
                    </div>
                    
                    <div class="space-y-8">
                        <?php if(empty($reports)): ?>
                            <div class="text-center py-12 opacity-30">
                                <i class="fas fa-shield-alt text-3xl mb-4"></i>
                                <p class="text-[9px] font-black uppercase tracking-widest">Integrity Secure</p>
                            </div>
                        <?php endif; ?>

                        <?php foreach(($reports ?? []) as $r): ?>
                        <div class="flex gap-4 group/report">
                            <div class="w-[1px] h-auto bg-red-500/20 group-hover/report:bg-red-500 transition-colors"></div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-xs font-bold text-slate-300 uppercase tracking-tight"><?= $r['report_type'] ?> Violation</p>
                                    
                                    <!-- MODERATION QUICK ACTIONS -->
                                    <div class="flex gap-1.5 opacity-60 group-hover/report:opacity-100 transition-opacity">
                                        
                                        <a href="/admin/report/dismiss?id=<?= $r['id'] ?>" 
                                           class="w-7 h-7 rounded-lg bg-white/5 flex items-center justify-center text-emerald-500 hover:bg-emerald-500/20 transition-all" 
                                           title="Dismiss Alert">
                                            <i class="fas fa-check text-[9px]"></i>
                                        </a>
                                        
                                        <?php 
                                            $type = strtolower($r['report_type']);
                                            $targetId =$r['comment_id'];
                                        ?>
                                        <a href="/admin/report/delete-content?type=<?= $type ?>&id=<?= $targetId ?>&report_id=<?= $r['id'] ?>" 
                                           onclick="return confirm('Are Youu Suure you want to delete this Comment')"
                                           class="w-7 h-7 rounded-lg bg-white/5 flex items-center justify-center text-red-500 hover:bg-red-500/20 transition-all" 
                                           title="Erase Violation">
                                            <i class="fas fa-trash text-[9px]"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <p class="text-[10px] text-slate-500 italic leading-relaxed mb-3">
                                    "<?= htmlspecialchars($r['reason']) ?>"
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <span class="text-[8px] text-slate-700 font-black uppercase tracking-[0.2em]"><?= htmlspecialchars($r['reporter_name']) ?></span>
                                    <span class="text-[8px] text-slate-800 font-black uppercase"><?= date('H:i • d M', strtotime($r['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                
                </div>
            </div>
        </div>

    </main>

</body>