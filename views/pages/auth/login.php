
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617] login-page">

    <!-- Immersive Background -->
    <div class="aura aura-blue"></div>
    <div class="aura aura-purple"></div>

    <!-- Login Content -->
    <div class="w-full max-w-md animate-reveal">
        
        <!-- Header Section -->
        <div class="text-center mb-10">
            <div class="relative inline-block mb-6">
                <div class="absolute inset-0 bg-blue-500 blur-2xl opacity-20 animate-pulse"></div>
                <div class="relative w-16 h-16 bg-white rounded-[20px] flex items-center justify-center shadow-2xl group cursor-pointer transition-transform hover:rotate-12">
                    <i class="fas fa-feather-alt text-black text-2xl"></i>
                </div>
            </div>
            <h1 class="text-4xl font-extrabold text-white syne tracking-tighter mb-3">LOGIN</h1>
        </div>

        <!-- Glassmorphism Card -->
        <div class="glass-container p-10 md:p-14 rounded-[3.5rem] relative overflow-hidden">
            
            <!-- Subtle internal light -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl"></div>

            <form action="#" class="space-y-7">
                
                <!-- Email Input -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 ml-2">Email</label>
                    <div class="relative group">
                        <i class="far fa-user absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                        <input type="email" placeholder="user@lmhub.com" 
                            class="input-style w-full pl-14 pr-6 py-5 rounded-[1.8rem] text-sm font-medium text-white placeholder-slate-700">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500">Password</label>
                        <a href="#" class="text-[10px] font-bold text-blue-500 hover:text-purple-400 uppercase tracking-widest transition">Recovery</a>
                    </div>
                    <div class="relative group">
                        <i class="far fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-purple-400 transition-colors"></i>
                        <input type="password" placeholder="••••••••" 
                            class="input-style w-full pl-14 pr-6 py-5 rounded-[1.8rem] text-sm font-medium text-white placeholder-slate-700">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-3 px-2">
                    <input type="checkbox" id="rem" class="w-4 h-4 rounded-lg bg-white/5 border-white/10 text-blue-600 focus:ring-0">
                    <label for="rem" class="text-xs font-semibold text-slate-500 cursor-pointer select-none">Stay Synchronized</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-premium w-full py-5 rounded-[1.8rem] text-white font-bold text-xs uppercase tracking-[0.2em] mt-2">
                    Login
                </button>
            </form>

            <!-- Social Logins -->
            <div class="mt-12 text-center">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-px flex-grow bg-white/5"></div>
                    <span class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-700">OR CONNECT VIA</span>
                    <div class="h-px flex-grow bg-white/5"></div>
                </div>
                <div class="flex justify-center gap-6">
                    <button class="social-btn w-14 h-14 rounded-2xl flex items-center justify-center text-slate-400 hover:text-white">
                        <i class="fab fa-github text-xl"></i>
                    </button>
                    <button class="social-btn w-14 h-14 rounded-2xl flex items-center justify-center text-slate-400 hover:text-white">
                        <i class="fab fa-google text-xl"></i>
                    </button>
                    <button class="social-btn w-14 h-14 rounded-2xl flex items-center justify-center text-slate-400 hover:text-white">
                        <i class="fab fa-apple text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Footer Link -->
            <div class="mt-12 text-center">
                <p class="text-slate-500 text-xs font-medium">
                    Need a creative identity? 
                    <a href="#" class="text-blue-400 font-bold hover:text-purple-400 transition-colors ml-1 underline underline-offset-4 decoration-blue-500/30">Register</a>
                </p>
            </div>
        </div>

        <!-- Visual Credits -->
        <div class="mt-12 text-center">
            <span class="text-[9px] font-black uppercase tracking-[0.5em] text-slate-800">
                Encrypted & Secured by LMHub Protocol
            </span>
        </div>
    </div>

</div>