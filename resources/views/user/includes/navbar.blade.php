<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="/" class="flex items-center">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Navbar</span>
    </a>
    <div class="flex md:order-2">
        @guest
            <a href="{{ route('login') }}">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">login</button>
            </a>
        @else
        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{auth()->user()->name}}<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdownInformation" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 510px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
            {{-- <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                <div>{{auth()->user()->name}}</div>
                    <div class="font-medium truncate"></div>
            </div> --}}
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                @if (auth()->user()->role==1)
                    <li>
                        <a href="{{ url('/admin') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                @endif
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
            </ul>
            <div class="py-1">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Sign out
                    </button>
                    @csrf
                    @method('post')
                </form>
            </div>
        </div>

        @endguest
        {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button> --}}
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-cta">
        <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">categories <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        @foreach ($categories as $item)
                        {{-- <li><a class="dropdown-item" href="{{route('user.spacial_food',$item->id)}}">{{$item->title}}</a></li> --}}
                            <li>
                                <a href="{{route('user.spacial_food',$item->id)}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$item->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="py-1">
                        <a href="{{route('user.categories')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">all categories</a>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{route('user.foods')}}" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">foods</a>
            </li>
            @if (auth()->check())
                @if (auth()->user()->role == 0 )
                    <li>
                        <a href="{{route('add_order.index')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">my orders</a>
                    </li>
                @endif
            @endif

            @if (!auth()->check() || auth()->user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=""></a>
                    </li>
                    <li>
                        <a href="{{route('message')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">messages</a>
                    </li>
            @endif
    </ul>
    </div>
    </div>
</nav>


