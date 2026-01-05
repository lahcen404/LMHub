
<body class="flex min-h-screen">

    <div class="aura bg-blue-600 top-[-10%] left-[-10%]"></div>
    <div class="aura bg-purple-600 bottom-[-10%] right-[-10%]"></div>



    <!-- Main Workspace -->
    <main class="flex-grow p-6 md:p-12 lg:p-20">
        
        <header class="mb-12 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-extrabold syne tracking-tighter">Researcher Identity</h1>
                <p class="text-slate-500 text-sm mt-1">Global unique credentials for the LMHub Protocol.</p>
            </div>
        </header>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
            
            <!-- Profile Column -->
            <div class="xl:col-span-1">
                <div class="glass-card p-10 flex flex-col items-center text-center">
                    <div class="relative mb-8">
                        <div class="w-40 h-40 rounded-[2.5rem] bg-gradient-to-tr from-blue-500 to-purple-500 p-[2px] avatar-glow">
                            <div class="w-full h-full bg-[#020617] rounded-[2.5rem] flex items-center justify-center">
                                <span class="text-5xl font-bold syne text-white">JV</span>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 badge-verified rounded-full flex items-center justify-center border-4 border-[#020617]">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold syne tracking-tight">Julian Vance</h2>
                    <p class="text-blue-400 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Verified System Author</p>
                    
                    <div class="w-full mt-10 pt-8 border-t border-white/5 space-y-4">
                        <div class="flex justify-between items-center text-sm px-2">
                            <span class="text-slate-500 font-bold uppercase text-[9px] tracking-widest">Articles Published</span>
                            <span class="text-white font-bold">24</span>
                        </div>
                        <div class="flex justify-between items-center text-sm px-2">
                            <span class="text-slate-500 font-bold uppercase text-[9px] tracking-widest">Total Appreciation</span>
                            <span class="text-white font-bold">1.2k</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Identity Data Column -->
            <div class="xl:col-span-2 space-y-6">
                <div class="glass-card p-10">
                    <h3 class="text-xl font-bold syne mb-8">Registry Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="info-block">
                            <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Display Name</p>
                            <p class="text-base font-bold text-white">Julian Vance</p>
                        </div>
                        
                        <div class="info-block">
                            <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Identity Email</p>
                            <p class="text-base font-bold text-white">julian@lmhub.com</p>
                        </div>

                        <div class="info-block md:col-span-2">
                            <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Researcher Bio</p>
                            <p class="text-sm leading-relaxed text-slate-300 font-medium">
                                Neural architect focusing on edge-computing and decentralized data protocols. Dedicated to the evolution of digital sovereignty and clear intelligence modeling.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-10">
                    <h3 class="text-xl font-bold syne mb-8">Security & Access</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-5 bg-black/20 rounded-2xl border border-white/5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-green-500/10 flex items-center justify-center text-green-400">
                                    <i class="fas fa-lock-open text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Access Key</p>
                                    <p class="text-[10px] text-slate-500 font-bold">Master password active</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-black uppercase text-slate-600">Secure</span>
                        </div>

                        <div class="flex items-center justify-between p-5 bg-black/20 rounded-2xl border border-white/5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400">
                                    <i class="fas fa-fingerprint text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Protocol Role</p>
                                    <p class="text-[10px] text-slate-500 font-bold">Elevated author privileges</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-black uppercase text-blue-400">Author</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
