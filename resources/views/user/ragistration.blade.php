<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | Sunrise PG</title>
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (built via Vite) -->
    @vite(['resources/css/app.css'])
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sunrise-gradient {
            background: linear-gradient(135deg, #FF9B44 0%, #D4145A 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="sunrise-gradient min-h-screen flex flex-col items-center py-12 px-6 sm:py-20">

    <div class="w-full max-w-xl">
        <!-- Logo/Brand Area -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-white tracking-tight uppercase">
                Sunrise<span class="text-orange-200">PG</span>
            </h1>
            <p class="text-orange-100 mt-2 font-medium">Join our community today!</p>
        </div>

        <!-- Registration Card -->
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden border border-white/20">
            <div class="p-8 md:p-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center sm:text-left border-b border-gray-100 pb-4">Create Account</h2>
                
                <form method="POST" action="" class="space-y-6">
                    @csrf
                    
                    <!-- Names Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="firstname" class="block text-sm font-semibold text-gray-700 mb-1.5">First Name</label>
                            <input type="text" name="firstname" id="firstname" 
                                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all" 
                                   placeholder="John" required>
                        </div>
                        <div>
                            <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-1.5">Last Name</label>
                            <input type="text" name="lastname" id="lastname" 
                                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all" 
                                   placeholder="Doe" required>
                        </div>
                    </div>

                    <!-- Email & Phone Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                            <input type="email" name="email" id="email" 
                                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all" 
                                   placeholder="john@example.com" required>
                        </div>
                        <div>
                            <label for="phoneno" class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                            <input type="text" name="phoneno" id="phoneno" 
                                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all" 
                                   placeholder="10-digit number" required
                                   pattern="[0-9]{10}" maxlength="10" minlength="10" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" 
                                   title="Phone number must be exactly 10 digits">
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Create Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" 
                                       class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all pr-12" 
                                       placeholder="••••••••" required minlength="8">
                                <button type="button" onclick="togglePassword('password', this)" 
                                        class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 text-gray-400 hover:text-orange-600 transition-colors focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-off-icon hidden"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-transparent transition-all pr-12" 
                                       placeholder="••••••••" required minlength="8">
                                <button type="button" onclick="togglePassword('password_confirmation', this)" 
                                        class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 text-gray-400 hover:text-orange-600 transition-colors focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-off-icon hidden"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                                class="w-full flex justify-center py-4 px-4 rounded-2xl shadow-lg text-base font-bold text-white bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transform active:scale-[0.98] transition-all">
                            Register Account
                        </button>
                    </div>
                </form>

                <div class="mt-10 pt-8 border-t border-gray-100 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="/loadlogin" class="font-bold text-orange-600 hover:text-orange-700 transition-colors">Log in here</a>
                    </p>
                    <div class="mt-4">
                        <a href="/" class="text-xs text-gray-400 hover:text-gray-600 font-medium transition-colors inline-flex items-center gap-2">
                            <span>←</span> Back to Sunrise PG
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <p class="mt-8 text-center text-sm text-white/50 font-medium">
            &copy; {{ date('Y') }} Sunrise PG Guest Management System
        </p>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const eyeIcon = button.querySelector('.eye-icon');
            const eyeOffIcon = button.querySelector('.eye-off-icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }

        // Simple validation to check if passwords match
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');

        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
        });
    </script>
</body>
</html>
