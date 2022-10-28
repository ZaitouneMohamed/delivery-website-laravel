<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
        </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form action="{{route('add_order.store')}}" method="post">
            @csrf
            <div class="w-80 bg-white shadow rounded">
                <input type="hidden" name="id" value="{{$food->id}}">
                <div class="h-48 w-full bg-gray-200 flex flex-col justify-between p-4 bg-cover bg-center"style="background-image: url('/foods/{{$food->image}}')">
                    <div class="flex justify-between"></div>
                </div>
                <div class="p-4 flex flex-col items-center">
                    <p class="text-gray-400 font-light text-xs text-center">
                    </p>
                <h1 class="text-gray-800 text-center mt-1">{{$food->title}}</h1>
                <h1 class="text-gray-800 text-center mt-1">{{$food->description}}</h1>
                <p class="text-center text-gray-800 mt-1">{{$food->price}}$</p>
                <div class="inline-flex items-center mt-2">
                    <p id="add" onclick="add()" class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200">
                        +
                    </p>
                    <input name="qty" id="qty" value="1" type="number" class="bg-gray-100 border-t border-b border-gray-100 text-gray-600 hover:bg-gray-100 inline-flex items-center px-4 py-1 select-none w-20"></input>
                    <p id="n9ss" onclick="n9ss()" class="bg-white rounded-r border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200">
                        -
                    </p>
                </div>
                @if (auth()->user()->adresse=="")
                    <div class="inline-flex items-center mt-2">
                        <input name="adresse" placeholder="adresse" type="text" class="bg-gray-100 border-t border-b border-gray-100 text-gray-600 hover:bg-gray-100 inline-flex items-center px-4 py-1 select-none w-50"></input>
                    </div>
                    <div class="inline-flex items-center mt-2">
                        <input name="phone" placeholder="phone" type="text" class="bg-gray-100 border-t border-b border-gray-100 text-gray-600 hover:bg-gray-100 inline-flex items-center px-4 py-1 select-none w-50"></input>
                    </div>
                @endif

                <button type="submit"
                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-4 w-full flex items-center justify-center">
                    Add to order
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 ml-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </button>
                </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </section>
