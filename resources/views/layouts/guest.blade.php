{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
 --}}

 @vite(['resources/css/app.css', 'resources/js/app.js'])
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>ds
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        {{-- @vite(['resources/assets/css/app.css', 'resources/assets/js/app.js']) --}}


        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/tooplate-gymso-style.css') }}">


    </head>
    <body data-spy="scroll" data-target="#navbarNav" data-offset="50">
        <div class="mb-14">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">

                    <a class="navbar-brand" href="index.html">USMBA Pitches Group</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- ------------------ --}}

                    {{-- @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                    @endif --}}
                    {{-- ----------------- --}}
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a href="#class" class="nav-link smoothScroll">reservations</a>
                            </li>

                            @if (Route::has('login'))
                            @auth
                                {{-- @if (Auth::user()->role=='admin') --}}
                                    {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                                    {{-- @else --}}

                                {{-- @endif --}}
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link smoothScroll">log in</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link smoothScroll">register</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                            <li class="nav-item">
                                <a href="#about" class="nav-link smoothScroll">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a href="#contact" class="nav-link smoothScroll">Contact</a>
                            </li>

                            @auth
                            <li class="nav-item">
                                <div @click.away="open = false" class="relative w-40" x-data="{ open: false }">
                                    <button @click="open = !open" class="nav-link smoothScroll">

                                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
                                             <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>


                                            @if (Auth::user()->role=='admin')
                                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-800 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-red-600 focus:text-red-600 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.index') }}">Admin Panel</a>

                                            @endif
                                            @if (Auth::user()->role=='manager')
                                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-800 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-red-600 focus:text-red-600 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.index') }}">Manager Panel</a>

                                            @endif



                                             <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-800 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-red-600 focus:text-red-600 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">My Account</a>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </li>
                            @endauth
                        </ul>

                        <ul class="social-icon ml-lg-3">
                            <li><a href="https://fb.com/tooplate" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>


        <main  class="font-sans text-gray-900 antialiased">
            <div class="hero">
                <div>
                    @if(session()->has('danger'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:rext-red-800" role="alert">
                        <span class="font-medium "></span> {{session()->get('danger')}}
                    </div>
                    @endif

                    @if(session()->has('warning'))
                    <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:rext-yellow-800" role="alert">
                        <span class="font-medium "></span> {{session()->get('warning')}}
                    </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:rext-green-800" role="alert">
                        <span class="font-medium "></span> {{session()->get('success')}}
                    </div>
                    @endif
                </div>

                    {{ $slot }}

            </div>
        </main>


        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                      <div class="ml-auto col-lg-4 col-md-5">
                          <p class="copyright-text">Copyright &copy; 2020 Gymso Fitness Co.

                              <br>Design: <a href="https://www.tooplate.com">Tooplate</a></p>
                            </div>

                            <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                                <p class="mr-4">
                                    <i class="fa fa-envelope-o mr-1"></i>
                                    <a href="#">hello@company.co</a>
                                </p>

                                <p><i class="fa fa-phone mr-1"></i> 010-020-0840</p>
                            </div>

                        </div>
                    </div>
                </footer>

                        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
                        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
                        <script src="{{ asset('assets/js/aos.js') }}"></script>
                        <script src="{{ asset('assets/js/smoothscroll.js') }}"></script>
                        <script src="{{ asset('assets/js/custom.js') }}"></script>

    </body>
</html>
