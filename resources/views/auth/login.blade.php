<!-- component -->
<div class="bg-gray-100 flex justify-center items-center h-screen ">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
        <img src="https://images.unsplash.com/photo-1631021967400-fbd3f722101c?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Placeholder Image" class="object-cover w-full h-screen">
    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <h1 class="text-2xl font-semibold mb-4">Login</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" />
        <x-splade-form action="{{ route('login') }}" class="space-y-4">
            <!-- Username Input -->
            <div class="mb-4">
                <x-splade-input id="email" type="email" name="email" :label="__('Email')" required autofocus />

            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <x-splade-input id="password" type="password" name="password" :label="__('Password')" required
                    autocomplete="current-password" />
            </div>
            <!-- Remember Me Checkbox -->
            <div class="mb-4 flex items-center">
                <x-splade-checkbox id="remember_me" name="remember" :label="__('Remember me')" />
            </div>
            <!-- Forgot Password Link -->
            <div class="mb-6 text-blue-500">
                @if (Route::has('password.request'))
                <Link class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
                </Link>
                @endif
            </div>
            <!-- Login Button -->
            <x-splade-submit
                class="ml-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full"
                :label="__('Log in')" />
        </x-splade-form>
        <!-- Sign up  Link -->
        <div class="mt-6 text-blue-500 text-center">
            {{-- <a href="#" class="hover:underline">Sign up Here</a> --}}
            <Link class="hover:underline" href="{{ route('register') }}">
            {{ __('Sign up Here') }}
            </Link>
        </div>
    </div>
</div>