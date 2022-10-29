<!-- component -->
<div class="flex items-center justify-center h-screen bg-gray-600">
    <div class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 max-w-xs">
        <img class="mb-3 w-32 h-32 rounded-full shadow-lg mx-auto" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="product designer">
        <h1 class="text-lg text-gray-700"> {{$profile->name}} </h1>
        <h3 class="text-sm text-gray-400 "> {{$profile->email}} </h3>
        @if (auth()->user()->adresse!="" || auth()->user()->phone!="" )
            <p class="text-xs text-gray-400 mt-4"> {{$profile->adresse}} </p>
            <p class="text-xs text-gray-400 mt-4"> {{$profile->phone}} </p><br>
        @else
            <p>sir t9awd</p>
        @endif

        <a href="{{route('my_profile.edit',$profile->id)}}" class="bg-indigo-600 px-8 py-2 mt-8 rounded-3xl text-gray-100 font-semibold uppercase tracking-wide">update profile</a>
    </div>
</div>