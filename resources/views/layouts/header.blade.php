@php
// session()->forget('discountAmount');;
// $discount = session('checkoutDetails.checkoutPrice.discount');
// session()->put('checkoutDetails.checkoutPrice.discount', null);
session()->forget('discountAmount');
// dd(session()->all())
@endphp
<div class="sticky top-0 z-20 w-full">
  <div class="navbarr">
    <x-splade-toggle>
      <div class="navbars">
        <nav class="bg-white shadow-lg">
          <div class="p-3">
            <div class="flex items-center justify-between">
              <a href="{{ route('home') }}" class="text-2xl font-semibold">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 w-12">
              </a>

              <div class="hidden lg:flex justify-between sm:-my-px">
                <div class="responsive-link flex space-x-4">
                  <a href="{{ route('home') }}" class="{{ (request()->is('/')) ? 'block pl-3 pr-4 py-2 border-buttonColor0 rounded-full text-base font-medium text-buttonColor0 bg-indigo-50
                    focus:outline-none
                    focus:text-buttonColor1 focus:bg-buttonColor0 focus:border-buttonColor1 transition duration-150 ease-in-out'
                    : 'block pl-3 pr-4 py-2 rounded-full border-transparent text-base font-medium text-gray-600 hover:text-gray-800
                    hover:bg-gray-50
                    hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition
                    duration-150 ease-in-out' }}">Home</a>
                  {{-- <x-responsive-nav-link href="{{ route('home') }}" :active="request()->is('/')">Home
                  </x-responsive-nav-link> --}}
                  <x-responsive-nav-link href="{{ route('ourcompany') }}" :active="request()->is('ourcompany')">Our
                    Company
                  </x-responsive-nav-link>
                  <x-responsive-nav-link href="{{ route('product') }}" :active="request()->is('product')">Product
                  </x-responsive-nav-link>
                  <x-responsive-nav-link href="{{ route('work_for_us') }}" :active="request()->is('work_for_us')">Work
                    for us
                  </x-responsive-nav-link>
                  <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->is('contact')">Contact
                  </x-responsive-nav-link>
                </div>
                <div class="flex ml-6">
                  <Link slideover href="{{ route('carts.index') }}" class="my-auto relative mr-4">
                  <button
                    class="bg-white border-[1px] text-black transition ease-in duration-200 border-black px-3 py-2 h-max my-auto lg:text-md md:text-sm font rounded-full font-bold w-max">
                    <i class="fa fa-shopping-cart"></i>
                  </button>
                  <!-- Add a badge for cart items count -->
                  <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs"
                    style="position:absolute; top:-10px; right:-4px">
                    {{ auth()->check() ? count(auth()->user()->cartitem) : (session('cart') == null ? '0' :
                    count(session('cart'))) }}
                  </span>
                  </Link>
                  @if(auth()->check())
                  <x-dropdown placement="bottom-end">
                    <x-slot name="trigger">
                      <button
                        class="flex items-center text-l font-semibold text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512">
                          <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                          <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                        <div class="ml-4">{{ Auth::user()->username }}</div>
                      </button>
                    </x-slot>

                    <x-slot name="content">
                      <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                      </x-dropdown-link>
                      <x-dropdown-link :href="route('myorder')">
                        {{ __('My Order') }}
                      </x-dropdown-link>
                      @role('admin')
                      <x-dropdown-link :href="route('admin.index')">
                        {{ __('Admin') }}
                      </x-dropdown-link>
                      @endrole

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link as="a" :href="route('logout')"
                          onclick="event.preventDefault(); this.closest('form').submit();">
                          {{ __('Log Out') }}
                        </x-dropdown-link>
                      </form>
                    </x-slot>
                  </x-dropdown>
                  @else
                  <x-responsive-nav-link href="{{ route('login') }}" :active="request()->is('login')">Login
                  </x-responsive-nav-link>
                  @endif
                </div>
              </div>

              {{-- hamlinks --}}
              <!-- Hamburger -->
              <div class="-mr-2 flex items-center lg:hidden">
                <button @click="toggle"
                  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                  <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path v-bind:class="{ hidden: toggled, 'inline-flex': !toggled }" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path v-bind:class="{ hidden: !toggled, 'inline-flex': toggled }" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <!-- Responsive Navigation Menu -->
          <div v-bind:class="{ block: toggled, hidden: !toggled }" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
              <x-responsive-nav-link href="{{ route('home') }}" :active="request()->is('/')">Home
              </x-responsive-nav-link>
              <x-responsive-nav-link href="{{ route('ourcompany') }}" :active="request()->is('ourcompany')">Our Company
              </x-responsive-nav-link>
              <x-responsive-nav-link href="{{ route('product') }}" :active="request()->is('product')">Our product
              </x-responsive-nav-link>
              <x-responsive-nav-link href="{{ route('work_for_us') }}" :active="request()->is('work_for_us')">Work for
                us
              </x-responsive-nav-link>
              <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->is('contact')"> Contact
              </x-responsive-nav-link>
              <x-responsive-nav-link modal href="{{ route('carts.index') }}" :active="request()->is('carts')"> Carts
              </x-responsive-nav-link>
              @if(auth()->check())
              <x-dropdown placement="bottom-end" class="border-gray border-t-2 w-full p-4 pl-0">
                <x-slot name="trigger">
                  <button
                    class="flex items-center text-l font-semibold text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512">
                      <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                      <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <div class="ml-4">{{ Auth::user()->username }}</div>
                  </button>
                </x-slot>
                <x-slot name="content">
                  <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                  </x-dropdown-link>
                  <x-dropdown-link :href="route('myorder')">
                    {{ __('My Order') }}
                  </x-dropdown-link>
                  @role('admin')
                  <x-dropdown-link :href="route('admin.index')">
                    {{ __('Admin') }}
                  </x-dropdown-link>
                  @endrole
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link as="a" :href="route('logout')"
                      onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                    </x-dropdown-link>
                  </form>
                </x-slot>
              </x-dropdown>
              @else
              <x-responsive-nav-link href="{{ route('login') }}" :active="request()->is('login')">Login
              </x-responsive-nav-link>
              @endif
            </div>
          </div>
        </nav>
      </div>
    </x-splade-toggle>
  </div>
</div>