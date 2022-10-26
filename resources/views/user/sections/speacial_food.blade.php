<!-- component -->
<div class="w-full bg-gray-800">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="text-center pb-12">
            <h2 class="text-base font-bold text-indigo-600">
                We have the best food
            </h2>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-white">
                Check our awesome Food <span class="text-blue-500 hover:text-red-800 transition duration-800 ease-in-out">{{$categorie_name->title}}</span>
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($foods as $food)
            <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="/foods/{{$food->image}}" alt="photo">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">{{$food->title}}</p>
                    <p class="text-base text-gray-400 font-normal">{{$food->description}}</p>
                    <p class="text-xl text-white font-bold mb-2">{{$food->price}}$</p>
                    @if (auth()->check())
                        @if (auth()->user()->is_admin == 0)
                            <a href="{{route('new_order',$food->id)}}">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    order now
                                    <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </a>
                        @endif
                        @else
                        <a href="{{route('new_order',$food->id)}}">
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                order now
                                <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </section>
</div>
