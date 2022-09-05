@extends('layouts.layout')

@section('topmenu_items')
    <!-- Top NavBar -->
    <a
        href="{{ route('movie.index') }}"
        class="py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
        Movies
    </a>
    <a href="{{ route('game.index') }}">
        <button
            class="ml-6 py-2 block border-b-2 border-transparent
						focus:outline-none font-medium  capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
            Games
        </button>
    </a>
    <a href="{{ route('forum.index') }}">
        <button
            class="ml-6 py-2 block border-b-2 border-transparent
						focus:outline-none font-medium  capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
            Forums
        </button>
    </a>
@endsection


@section('content')

    <div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                movie overview
            </h2>
        </div>

        @if (session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status-wrong'))
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                {{ session('status-wrong') }}
            </div>
        @endif

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-8 lg:-mx-10">
                <div class="py-2 align-middle inline-block min-w-full sm:px-8 lg:px-10">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <div class="grid grid-cols-3 gap-2 m-1">
                                @for($i=0;$i<count($movies);$i++)
                                    <div class="w-auto border-2 rounded-lg border-gray-800 p-2">
                                        <h2 class="font-bold text-lg">{{ $movies[$i]->name }}</h2>
                                        <h3>{{ $movies[$i]->description }}</h3>
                                        <h3 class="border-2 rounded-full border-gray-300 outline-double w-12 p-0.5 mt-1"><a href="{{ route('movie.show', ['movie' => $movies[$i]->id]) }}">Show</a></h3>
                                    </div>
                                @endfor
                            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
