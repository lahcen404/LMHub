
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617]">

    <div class="w-full max-w-5xl animate-reveal max-h-[80vh] overflow-y-auto">

    <!-- Header -->
    <header class="mb-10 flex justify-between items-end">
        <div>
            <a href="/admin/dashboard" class="text-xs font-bold text-slate-500 hover:text-blue-400 transition uppercase tracking-widest mb-2 block">
                <i class="fas fa-arrow-left mr-1"></i> Dashboard
            </a>
            <h1 class="text-4xl font-extrabold syne tracking-tighter">Manage Reports</h1>
        </div>
        <div class="text-right">
            <span class="text-[10px] font-black uppercase text-slate-500 tracking-widest">Active Flags</span>
            <p class="text-2xl font-bold text-red-500">14</p>
        </div>
    </header>

    <!-- Reports List (Repeatable Block) -->
    <div class="space-y-4 pb-8">

        <!-- Single Report Item -->
        <div class="glass-card p-6 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-red-500/30 transition-colors">
            
            <!-- Metadata -->
            <div class="flex-grow">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-[9px] font-black bg-red-500/10 text-red-400 px-2 py-0.5 rounded uppercase">Pending</span>
                    <span class="text-[10px] font-bold text-slate-600">ID: #8821</span>
                </div>
                <h2 class="text-lg font-bold mb-1 leading-tight">"Inappropriate language and attacks"</h2>
                <p class="text-xs text-slate-500">
                    By <span class="text-slate-300">User #12</span> • 
                    Comment ID: <span class="text-slate-300">#442</span> • 
                    <span class="opacity-50">2026-01-03</span>
                </p>
            </div>

            <!-- Actions -->
            <div class="flex gap-2 shrink-0">
                <form action="handle_report.php" method="POST">
                    <input type="hidden" name="report_id" value="8821">
                    <button name="action" value="dismiss" class="px-5 py-2.5 rounded-xl border border-white/10 text-xs font-bold hover:bg-white/5 transition">
                        Dismiss
                    </button>
                </form>
                <form action="handle_report.php" method="POST">
                    <input type="hidden" name="comment_id" value="442">
                    <button name="action" value="delete" class="px-5 py-2.5 rounded-xl bg-red-500/10 text-red-500 border border-red-500/20 text-xs font-bold hover:bg-red-500 hover:text-white transition">
                        Delete Comment
                    </button>
                </form>
            </div>
        </div>

        <!-- Example of another item -->
        <div class="glass-card p-6 flex flex-col md:flex-row items-center justify-between gap-6 opacity-60">
            <div class="flex-grow">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-[9px] font-black bg-green-500/10 text-green-400 px-2 py-0.5 rounded uppercase">Resolved</span>
                    <span class="text-[10px] font-bold text-slate-600">ID: #8819</span>
                </div>
                <h2 class="text-lg font-bold mb-1 leading-tight line-through opacity-50">"Spam commercial links"</h2>
                <p class="text-xs text-slate-500">Action taken: Comment Deleted</p>
            </div>
            <div class="text-[10px] font-black uppercase text-slate-700 tracking-widest italic">Archived</div>
        </div>

    </div>

    <!-- Minimal Footer -->
    <footer class="mt-10 text-center py-6 border-t border-white/5">
        <p class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-800">LMHub Moderation Protocol</p>
    </footer>

    </div>

</div>