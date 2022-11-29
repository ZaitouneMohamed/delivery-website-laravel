@extends('user.layout.layout')

@if ($orders->count() <= 2)
    @section('style')
        <style>
            #div {
                height: calc(100vh - 140px)
            }
        </style>
    @endsection
@endif

@section('main')
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-succecr" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <section class="text-gray-400 bg-gray-900 body-font" id="div">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-white">{{ auth()->user()->name }} Orders
                </h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">
                                food</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">order
                                date</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">qty
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">price
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Total
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                status</th>
                            <th
                                class="w-10 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tr rounded-br">
                                action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td class="px-4 py-3">{{ $item->food->title }} <input type="hidden" name="order_id"
                                        value="{{ $item->id }}"></td>
                                <td class="px-4 py-3">{{ $item->created_at }}</td>
                                {{-- <td class="px-4 py-3">{{ $item->livreur->name }}</td> --}}
                                <td class="px-4 py-3">{{ $item->qty }}</td>
                                <td class="px-4 py-3">{{ $item->food->price }}$</td>
                                <td class="px-4 py-3">{{ $item->total }}$</td>
                                <td class="px-4 py-3">
                                    {{ $item->status }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex">
                                        <button type="button"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button"
                                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
