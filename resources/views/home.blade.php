<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.0-web/css/all.min.css')}}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <title>EENG</title>
</head>
<body x-data = "{open: false}" style = "background-image: url('{{asset('images/university.jpg')}}')" class = "bg-gradient-to-r from-gray-700 to-black via-transparent bg-center bg-cover bg-fixed">
    <div class = "h-auto -z-10">
        <nav class="z-10 top-0 flex  w-full h-10 p-5 text-white justify-between items-center bg-transparent">
            <span>
                logo
            </span>
            <button @click = "open = !open" class = "bg-none hover:text-gray-300 transition-all">
                login
                <i x-show = "!open"  class="fa-solid fa-chevron-right text-xs"></i>
                <i x-show = "open"  class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </nav>
        {{-- DROP DOWN --}}
        <div 
        x-show = "open" 
        @click.outside = "open = false" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-10"
        x-cloak
        class="absolute top-10 right-2 grid grid-rows-3 text-center w-36 h-24 text-white rounded-md bg-gray-50 border-2 border-gray-100 border-opacity-10 bg-opacity-5 backdrop-blur-sm drop-shadow-2xl">
            <a href = '/student' class = "hover:bg-gray-50 hover:text-gray-200 hover:bg-opacity-10 hover:backdrop-blur-md transition-all">student</a>
            <a href = '/lecturer' class = "hover:bg-gray-50 hover:text-gray-200 hover:bg-opacity-10 hover:backdrop-blur-md transition-all">lecturer</a>
            <a href = '/admin' class = "hover:bg-gray-50 hover:text-gray-200 hover:bg-opacity-10 hover:backdrop-blur-md transition-all">admin</a>
        </div>

        {{-- DESCRIPTION --}}
        <div class="text-center">
            <h1 class = "mt-20 text-white font-bold text-5xl">
                WELCOME, TO THE ELECTRICAL AND ELECTRONICS DEPARTMENT OF THE FOURAH BAY COLLEDGE
            </h1>
            <p class = "font-light m-2 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor illo, inventore sint ratione enim ipsam magni aspernatur nobis iste, laborum esse dolores nemo? Recusandae dolorum cupiditate sapiente fugiat iure error magnam deleniti suscipit cum consequuntur exercitationem illo accusantium animi voluptas, quis aliquid, nesciunt voluptatum provident, eius eos quibusdam voluptates! Pariatur.</p>
        </div>
    </div>
    {{-- CARDS --}}
    <section class = "grid grid-cols-3 gap-5 p-5">
        {{-- STUDENT CARD --}}
        <div class = "bg-gray-200 text-white backdrop-blur-sm bg-opacity-10 rounded-lg border-2 border-gray-400 border-opacity-30 p-5">
            <center>
                <h2 class = "font-bold m-2">STUDENT</h2>
            </center>
            <div>
                <ul class = "grid gap-2 p-5 font-light">
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>Login to student dashboard.</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view notes, assignments.</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view performance based on a specific module</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view all students of the same course or year</span>
                    </li>
                </ul>
                <a href="/student">
                    <button class = "ml-5 px-8 py-2 bg-white bg-opacity-10 shadow-lg backdrop-blur-md rounded text-white hover:opacity-50 transition-all">
                    login
                    </button>
                </a>
            </div>
        </div>
        {{-- LECTURER CARD --}}
        <div class = "bg-gray-200 text-white backdrop-blur-sm bg-opacity-10 rounded-lg border-2 border-gray-400 border-opacity-30 p-5">
            <center>
                <h2 class = "font-bold m-2">LECTURER</h2>
            </center>
            <div>
                <ul class = "grid gap-2 p-5 font-light">
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>Login to lecturer dashboard.</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view all student specific to the lecturer's module</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>Upload notes, give assignment and test</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>Grade students and reports to admin</span>
                    </li>
                </ul>
                <a href="/lecturer">
                    <button class = "ml-5 px-8 py-2 bg-white bg-opacity-10 shadow-lg backdrop-blur-md rounded text-white hover:opacity-50 transition-all">
                    login
                    </button>
                </a>
            </div>
        </div>
        {{-- ADMIN CARD --}}
        <div class = "bg-gray-200 text-white backdrop-blur-sm bg-opacity-10 rounded-lg border-2 border-gray-400 border-opacity-30 p-5">
            <center>
                <h2 class = "font-bold m-2">ADMIN</h2>
            </center>
            <div>
                <ul class = "grid gap-2 p-5 font-light">
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>Login to student dashboard.</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view notes, assignments.</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view performance based on a specific module</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-check text-gray-200"></i>
                        <span>view all students of the same course or year</span>
                    </li>
                </ul>
                <a href="/admin">
                    <button class = "ml-5 px-8 py-2 bg-white bg-opacity-10 shadow-lg backdrop-blur-md rounded text-white hover:opacity-50 transition-all">
                    login
                    </button>
                </a>
            </div>
        </div>
    </section>
</body>

</html>