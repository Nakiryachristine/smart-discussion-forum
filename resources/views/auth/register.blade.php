<x-guest-layout>
    <div class="p-10 bg-white rounded-lg shadow-xl max-w-lg mx-auto border border-gray-100">
        
        <div class="flex items-center justify-center gap-3 mb-6">
            <svg class="w-8 h-8 text-[#55b05c]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-xl font-semibold text-[#55b05c] tracking-tight">SMART DISCUSSION FORUM</span>
        </div>

        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-950 tracking-tighter">Create Your Account</h1>
            <p class="text-gray-600 mt-2">Welcome! Let’s get you set up to learn and collaborate.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6" x-data="{ 
            password: '',
            password_confirmation: '',
            showPassword: false,
            showConfirmPassword: false,
            get lengthValid() { return this.password.length >= 8 },
            get hasUpper() { return /[A-Z]/.test(this.password) },
            get hasNumber() { return /[0-9]/.test(this.password) },
            get hasSymbol() { return /[^A-Za-z0-9]/.test(this.password) },
            get strengthScore() {
                let score = 0;
                if (this.lengthValid) score++;
                if (this.hasUpper) score++;
                if (this.hasNumber) score++;
                if (this.hasSymbol) score++;
                return score;
            },
            get matches() { return this.password === this.password_confirmation && this.password_confirmation.length > 0 }
        }">
            @csrf

            <div>
                <x-input-label for="name" class="font-bold text-gray-700 text-sm" :value="__('FULL NAME:')" />
                <x-text-input id="name" 
                    class="block mt-1 w-full p-3 border border-gray-300 rounded-md placeholder-gray-400 text-gray-900" 
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                    placeholder="e.g., Oumo Steven" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" class="font-bold text-gray-700 text-sm" :value="__('EMAIL ADDRESS:')" />
                <x-text-input id="email" 
                    class="block mt-1 w-full p-3 border border-gray-300 rounded-md placeholder-gray-400 text-gray-900" 
                    type="email" name="email" :value="old('email')" required autocomplete="username" 
                    placeholder="e.g., stevenoumo5@gmail.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="relative">
                <x-input-label for="password" class="font-bold text-gray-700 text-sm" :value="__('PASSWORD:')" />
                <div class="flex items-center relative">
                    <x-text-input id="password" 
                        class="block mt-1 w-full p-3 border border-gray-300 rounded-md pr-16" 
                        ::type="showPassword ? 'text' : 'password'" 
                        name="password" 
                        x-model="password"
                        required autocomplete="new-password" 
                        placeholder="•••••••••" />
                    
                    <button type="button" 
                            @click="showPassword = !showPassword"
                            class="absolute right-3 top-3.5 text-xs text-gray-600 px-2 py-1 bg-gray-100 rounded-md border border-gray-200 focus:outline-none"
                            x-text="showPassword ? 'Hide' : 'Show'">
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                
                <div class="mt-3 w-full h-1.5 bg-gray-200 rounded-full overflow-hidden" x-show="password.length > 0" x-cloak>
                    <div class="h-full transition-all duration-300"
                         :class="{
                             'w-1/4 bg-red-500': strengthScore === 1,
                             'w-2/4 bg-orange-500': strengthScore === 2,
                             'w-3/4 bg-yellow-500': strengthScore === 3,
                             'w-full bg-green-500': strengthScore === 4
                         }">
                    </div>
                </div>

                <p class="text-xs mt-1 font-medium" x-show="password.length > 0" x-cloak
                   :class="{
                       'text-red-500': strengthScore === 1,
                       'text-orange-500': strengthScore === 2,
                       'text-yellow-500': strengthScore === 3,
                       'text-green-500': strengthScore === 4
                   }">
                    <span x-show="strengthScore === 1">Weak Password - Keep adding characters</span>
                    <span x-show="strengthScore === 2">Medium Password - Mix in case changes</span>
                    <span x-show="strengthScore === 3">Strong Password - Almost there!</span>
                    <span x-show="strengthScore === 4">Excellent - Secured Password Profile</span>
                </p>

                <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-gray-500" x-show="password.length > 0" x-cloak>
                    <div class="flex items-center space-x-1" :class="lengthValid ? 'text-green-600 font-bold' : ''">
                        <span x-text="lengthValid ? '✓' : '○'"></span> <span>Min 8 Characters</span>
                    </div>
                    <div class="flex items-center space-x-1" :class="hasUpper ? 'text-green-600 font-bold' : ''">
                        <span x-text="hasUpper ? '✓' : '○'"></span> <span>Uppercase Letter</span>
                    </div>
                    <div class="flex items-center space-x-1" :class="hasNumber ? 'text-green-600 font-bold' : ''">
                        <span x-text="hasNumber ? '✓' : '○'"></span> <span>Contains Number</span>
                    </div>
                    <div class="flex items-center space-x-1" :class="hasSymbol ? 'text-green-600 font-bold' : ''">
                        <span x-text="hasSymbol ? '✓' : '○'"></span> <span>Special Character</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <x-input-label for="password_confirmation" class="font-bold text-gray-700 text-sm" :value="__('CONFIRM PASSWORD:')" />
                <div class="flex items-center relative">
                    <x-text-input id="password_confirmation" 
                        class="block mt-1 w-full p-3 border border-gray-300 rounded-md pr-16" 
                        ::type="showConfirmPassword ? 'text' : 'password'" 
                        name="password_confirmation" 
                        x-model="password_confirmation"
                        required autocomplete="new-password" 
                        placeholder="•••••••••" />

                    <button type="button" 
                            @click="showConfirmPassword = !showConfirmPassword"
                            class="absolute right-3 top-3.5 text-xs text-gray-600 px-2 py-1 bg-gray-100 rounded-md border border-gray-200 focus:outline-none"
                            x-text="showConfirmPassword ? 'Hide' : 'Show'">
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <p class="text-xs mt-1 font-medium" x-show="password_confirmation.length > 0" x-cloak
                   :class="matches ? 'text-green-600' : 'text-red-500'">
                    <span x-show="matches">✓ Passwords match successfully</span>
                    <span x-show="!matches">❌ Passwords do not match yet</span>
                </p>
            </div>

            <div class="block mt-6">
                <div class="flex items-start">
                    <input id="terms" type="checkbox" name="terms" class="rounded border-gray-300 text-[#2683ba] shadow-sm focus:ring-[#2683ba] mt-1" required>
                    <label for="terms" class="ms-3 text-sm text-gray-900 leading-relaxed">
                        I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">Terms & Conditions</a> and <a href="{{ route('privacy')}}" class="text-blue-600 hover:underline">Privacy Policy</a>. <span class="text-red-600 font-bold">*</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('terms')" class="mt-1" />
                <p class="text-xs text-red-700 mt-1">*Required to continue.</p>
            </div>

            <div class="mt-8">
                <button type="submit" 
                    class="w-full text-center text-lg font-bold py-4 px-6 bg-[#2683ba] hover:bg-[#1a5f87] text-white rounded-lg shadow-md transition-colors uppercase tracking-wider">
                    {{ __('Create Account') }}
                </button>
            </div>

            <div class="text-center mt-6 text-sm">
                Already have an account? 
                <a class="underline text-[#2683ba] font-semibold hover:text-[#1a5f87]" href="{{ route('login') }}">
                    {{ __('Log In') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>