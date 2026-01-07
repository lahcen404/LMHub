
<div class="min-h-screen flex items-center justify-center p-6 bg-[#020617] register-page">
    <!-- Immersive Background Auras -->
    <div class="aura aura-blue"></div>
    <div class="aura aura-purple"></div>

    <!-- Register Content -->
    <div class="w-full max-w-lg animate-reveal">
        
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="relative inline-block mb-6">
                <div class="absolute inset-0 bg-blue-500 blur-2xl opacity-20 animate-pulse"></div>
                <div class="relative w-16 h-16 bg-white rounded-[20px] flex items-center justify-center shadow-2xl transition-transform hover:rotate-12">
                    <i class="fas fa-feather-alt text-black text-2xl"></i>
                </div>
            </div>
            <h1 class="text-4xl font-extrabold text-white syne tracking-tighter mb-2 uppercase">REGISTER</h1>
            <p class="text-slate-400 text-[10px] font-bold tracking-[0.3em] uppercase opacity-60">Initiate Research Protocol</p>
        </div>

        <!-- Glassmorphism Card -->
        <div class="glass-container p-8 md:p-12 rounded-[3.5rem] relative overflow-hidden">
            
            <!-- Subtle internal light -->
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl"></div>

            <form action="/register" method="POST" class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Name Input -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 ml-2">Full Name</label>
                        <div class="relative group">
                            <i class="far fa-id-card absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                            <input type="text" name="fullName" placeholder="Lahcen Maskour" required
                                value="<?= $_POST['fullName'] ?? '' ?>"
                                class="input-style w-full pl-14 pr-4 py-4 rounded-[1.8rem] text-sm font-medium text-white placeholder-slate-700 bg-white/5 border border-white/10 outline-none focus:border-blue-500/50">
                        </div>
                        <?php if(isset($errors['name'])): ?>
                            <p class="text-[9px] text-red-400 font-bold ml-4 mt-1 uppercase tracking-wider"><?= $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 ml-2">Email</label>
                        <div class="relative group">
                            <i class="far fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-blue-400 transition-colors"></i>
                            <input type="email" name="email" placeholder="user@lmhub.com" required
                                value="<?= $_POST['email'] ?? '' ?>"
                                class="input-style w-full pl-14 pr-4 py-4 rounded-[1.8rem] text-sm font-medium text-white placeholder-slate-700 bg-white/5 border border-white/10 outline-none focus:border-blue-500/50">
                        </div>
                        <?php if(isset($errors['email'])): ?>
                            <p class="text-[9px] text-red-400 font-bold ml-4 mt-1 uppercase tracking-wider"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 ml-2">Password</label>
                    <div class="relative group">
                        <i class="far fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-purple-400 transition-colors"></i>
                        <input type="password" name="password" placeholder="••••••••••••" required
                            class="input-style w-full pl-14 pr-6 py-4 rounded-[1.8rem] text-sm font-medium text-white placeholder-slate-700 bg-white/5 border border-white/10 outline-none focus:border-purple-500/50">
                    </div>
                    <?php if(isset($errors['password'])): ?>
                        <p class="text-[9px] text-red-400 font-bold ml-4 mt-1 uppercase tracking-wider"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>


                <!-- Terms -->
                <div class="flex items-center gap-3 px-2 pt-2">
                    <input type="checkbox" id="terms" required class="w-4 h-4 rounded-lg bg-white/5 border-white/10 text-blue-600 focus:ring-0 cursor-pointer">
                    <label for="terms" class="text-[10px] font-semibold text-slate-500 cursor-pointer select-none">
                        I agree to the <span class="text-blue-400 font-bold underline underline-offset-4 decoration-blue-500/30">Creative Protocol</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-premium w-full py-5 rounded-[1.8rem] text-white font-bold text-xs uppercase tracking-[0.2em] mt-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:scale-[1.02] transition-transform">
                    Synchronize Identity
                </button>
            </form>

            <!-- Social Logins -->
            <div class="mt-10 text-center">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-px flex-grow bg-white/5"></div>
                    <span class="text-[8px] font-black uppercase tracking-[0.4em] text-slate-700">RAPID CONNECT</span>
                    <div class="h-px flex-grow bg-white/5"></div>
                </div>
                <div class="flex justify-center gap-4">
                    <button class="social-btn w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 bg-white/5 border border-white/5 hover:text-white transition-all">
                        <i class="fab fa-github text-lg"></i>
                    </button>
                    <button class="social-btn w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 bg-white/5 border border-white/5 hover:text-white transition-all">
                        <i class="fab fa-google text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Footer Link -->
            <div class="mt-10 text-center border-t border-white/5 pt-8">
                <p class="text-slate-500 text-xs font-medium">
                    Already a researcher? 
                    <a href="/login" class="text-blue-400 font-bold hover:text-purple-400 transition-colors ml-1 underline underline-offset-4 decoration-blue-500/30">Return to Login</a>
                </p>
            </div>
        </div>

        <!-- Visual Credits -->
        <div class="mt-10 text-center">
            <span class="text-[9px] font-black uppercase tracking-[0.5em] text-slate-800">
                Encrypted & Secured by LMHub Protocol
            </span>
        </div>
    </div>
</div>