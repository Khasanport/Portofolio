<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khasanport</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            transition: 1s;
        }
    </style>
</head>

<body class="bg-slate-200">
    <div id="Navbar"
        class="w-full h-16 fixed top-0 right-0 left-0 bg-transparent px-4 py-2 flex justify-center items-center backdrop-blur-sm border-b-2 shadow-sm
                md:justify-items-stretch transition-all duration-500 z-50">
        <h1 class="w-1/3 font-bold justify-self-start
                    md:w-1/4 md:text-2xl text-xl specialttt"><a
                href="http://" target="_blank"class=""> Khasanport </a></h1>
        <div class="w-1/2 flex justify-evenly
                    md:w-40 md:justify-around">
            <input type="radio" name="theme" onclick="setTheme('white')" checked>
            <input type="radio" name="theme" onclick="setTheme('dark')">
            <input type="radio" name="theme" onclick="setTheme('texture')">
        </div>
        <div
            class="bar fixed bg-transparent right-0 left-20 bottom-0 top-16 translate-x-full transition flex flex-wrap backdrop-blur-md
                    md:static md:w-3/6 md:flex md:flex-nowrap md:gap-2 md:translate-x-0 md:justify-around md:pl-16 z-50 md:text-xl">
            <form action="/posts" method="get" class="md:fixed w-full right-10 top-5 flex flex-wrap form-search">
                @csrf
                <input type="search" name="search" id="search"
                    class="w-2/3 md:w-max shadow-md md:shadow-none border-2 px-4 py-1 bg-slate-200 md:opacity-0 my-4"
                    placeholder="Search...">
                <button type="submit" class="w-1/3 flex justify-center items-center px-2 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:hidden border-2 border-sky-400 text-sky-400 hover:text-white hover:bg-sky-600 p-2 box-content transition duration-300" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <button type="reset" class="hidden md:static w-full border-b-2 border-black h-2 md:relative cursor-pointer"
                    onclick="setClass(document.querySelector('#search'), 'opacity-0'), setClass(document.querySelector('.form-search'), 'translate-y-10'), setClass(document.querySelector('.form-search button[type=submit] svg'), 'hidden')">
                    <div class="rotate-90 w-1 h-1 md:absolute right-0 top-2 font-bold text-xl">
                        &gt;
                    </div>
                </button>
            </form>

            <a href="" class="w-full shadow-md md:shadow-none py-3 pl-2">Category</a>
            <a href="" class="w-full shadow-md md:shadow-none py-3 pl-2">About</a>
            <a href="" class="w-full shadow-md md:shadow-none py-3 pl-2">Filter</a>
            @guest
                <a href="/login"
                    class="w-full shadow-md md:shadow-none py-2 pl-2 md:px-7 font-semibold rounded-full border-4 bg-sky-400 hover:bg-sky-600 text-white text-center">Login</a>
            @endguest
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full shadow-md md:shadow-none py-2 pl-2 md:px-7 font-semibold rounded-full border-4 bg-sky-400 hover:bg-sky-600 text-white text-center">Logout</button>
                </form>
            @endauth
        </div>
        <div class="bar-icon w-7 h-7 rotate-90 cursor-pointer
                    md:hidden"
            onclick="setClass(document.querySelector('.bar'), 'active')">
            <span class="w-full h-2 bg-black">.</span>
            <span class="w-full h-2 bg-black">.</span>
            <span class="w-full h-2 bg-black">.</span>
        </div>
    </div>

    {{-- <div id="Cookies">
        <div class="fixed right-0 left-0 bottom-2 h-1/4 bg-gray-600 text-white pt-1 text-xs z-50">
            <div class="grid grid-rows-4 grid-cols-3 relative gap-1 pt-2
                        md:grid-rows-3 md:grid-cols-6 md:items-center md:justify-center md:text-lg">
                <div class="absolute right-0 left-0 top-0 shadow-lg w-full h-1 bg-white"></div>
                <div class="row-span-4 md:row-span-3 md:col-span-2 p-3">
                    <img src="{{URL::asset('img/cookie.svg')}}" class="h-full md:h-36"/>
                </div>
                <h1 class="row-span-1 col-span-2
                            md:row-span-1 md:col-span-4 md:text-xl md:font-bold">Cookies</h1>
                <p class="row-span-2 col-span-2 pr-5
                            md:row-span-2 md:col-span-2">
                    Maukah Anda Menerima Cookies Dari Website Ini?
                </p>
                <div class="group-button row-span-1 col-span-2
                            md:row-span-3 md:col-span-2 text-black font-bold">
                    <button type="submit" class="bg-sky-300 rounded-md shadow-md px-4 py-2 mx-5" onclick="setClass(document.querySelector('#Cookies'), 'hidden')">Allow</button>
                    <button type="submit" class="bg-sky-300 rounded-md shadow-md px-4 py-2 mx-5" onclick="setClass(document.querySelector('#Cookies'), 'hidden')">Deny</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="mt-24">
        @yield('container')
    </div>

    <footer class="h-96 bg-slate-900 w-full text-white px-4 py-2">
        Ini Adalah Footer
    </footer>

    <script src="{{ URL::asset('js/index.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>
