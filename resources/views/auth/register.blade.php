<div class="bg-gray-100 flex justify-center items-center h-screen overflow-hidden">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
        <img src="https://images.unsplash.com/photo-1631021967400-fbd3f722101c?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Placeholder Image" class="object-cover w-full h-screen ">
    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <h1 class="text-2xl font-semibold mb-4">Sign Up</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" />

        <x-splade-form action="{{ route('register') }}" class="space-y-4">
            <!-- Username Input -->
            <div class="mb-4">
                <x-splade-input id="username" type="text" name="username" :label="__('User Name')" required autofocus />

            </div>
            <!-- First Name Input -->
            <div class="mb-4">
                <x-splade-input id="first_name" type="text" name="first_name" :label="__('First Name')" required />

            </div>
            <!-- Last Name Input -->
            <div class="mb-4">
                <x-splade-input id="last_name" type="text" name="last_name" :label="__('Last Name')" required />

            </div>
            <!-- Email Name Input -->
            <div class="mb-4">
                <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />

            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <x-splade-input id="password" type="password" name="password" :label="__('Password')" required
                    autocomplete="new-password" />
            </div>
            <!-- Confirm Password Input -->
            <div class="mb-4">
                <x-splade-input id="password_confirmation" type="password" name="password_confirmation"
                    :label="__('Confirm Password')" required />
            </div>
            <!-- Remember Me Checkbox -->

            <!-- Forgot Password Link -->

            <!-- Register Button -->

            <x-splade-submit
                class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full"
                :label="__('Sign Up')" />
        </x-splade-form>
        <!-- Sign up  Link -->
        <div class="mt-6 text-blue-500 text-center">
            <Link class="hover:underline" href="{{ route('login') }}">
            {{ __('Login Here') }}
            </Link>
        </div>
    </div>
</div>