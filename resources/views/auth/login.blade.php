<x-guest-layout>
    <div class="min-h-screen bg-amber-50/50 text-slate-900 flex flex-col items-center justify-center p-6">
        
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-black tracking-tight">
                Welcome to
            </h1>
            <h2 class="text-3xl font-bold text-green-600 flex items-center justify-center gap-2 mt-1">
                <svg class="w-8 h-8 fill-current text-green-600 inline" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/>
                </svg>
                Smart Discussion Forum
            </h2>
            <p class="text-md text-slate-700 mt-2 font-medium">
                Sign in to continue to your account
            </p>
        </div>

        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5" autocomplete="off">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-800 mb-1">
                        Email address:
                    </label>
                    <input id="email" 
                           type="email" 
                           name="email"
                           value=""
                           placeholder="stevenoumo5@gmail.com" 
                           class="block w-full px-3 py-2.5 bg-white border border-slate-300 text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-slate-400 text-sm shadow-sm transition"
                           required 
                           autofocus 
                           autocomplete="one-time-code" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="text-sm font-semibold text-slate-800">
                            Password:
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-blue-600 hover:underline font-medium" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    
                    <x-text-input id="password" 
                                  class="block w-full px-3 py-2.5 bg-white border border-slate-300 text-slate-900 rounded-md focus:ring-2 focus:ring-blue-500 placeholder-slate-400"
                                  type="password"
                                  name="password"
                                  placeholder="***************"
                                  required 
                                  autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div class="flex items-center">
                    <input id="remember_me" 
                           type="checkbox" 
                           class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" 
                           name="remember">
                    <label for="remember_me" class="ms-2 text-sm font-medium text-slate-700">
                        Remember
                    </label>
                </div>

                <div class="pt-1">
                    <div class="flex items-start">
                        <input id="terms" 
                               type="checkbox" 
                               name="terms" 
                               class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-blue-500" 
                               required>
                               
                        <label for="terms" class="ms-2 text-sm text-slate-700 font-medium leading-tight">
                            I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">terms and conditions</a> and <a href="{{ route('privacy') }}" class="text-blue-600 hover:underline">privacy policy</a>
                        </label>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 ms-6">
                        You must agree to our terms and conditions to access the system
                    </p>
                    <x-input-error :messages="$errors->get('terms')" class="mt-1" />
                </div>

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full py-3 bg-[#2563eb] hover:bg-blue-700 text-white font-bold rounded-lg shadow-[0_4px_0_0_rgba(15,23,42,1)] active:translate-y-1 active:shadow-none transition-all duration-150 text-center">
                        Sign in
                    </button>
                </div>

                <div class="text-center pt-4 text-sm font-medium text-slate-600">
                    Don't have an account? 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold ml-1">
                            sign up
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>