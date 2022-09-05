@extends('layouts.layout')

@section('topmenu_items')
    <!-- Top NavBar -->

    <a href="{{ route('movies.index') }}">
        <button
            class="ml-6 py-2 block border-b-2 border-transparent
						focus:outline-none font-medium capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
            Index
        </button>
    </a>
    <a href="{{ route('movies.create') }}">
        <button
            class="ml-6 py-2 block border-b-2 border-transparent
						focus:outline-none font-medium capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
            Create
        </button>
    </a>

@endsection
@section('content')

    @if(session('status'))
        <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8"
             style="...">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                movie Deleter
            </h2>
        </div>

    <form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
          action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Movie Name
            </label>

            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
    focus:outline-none focus:shadow-outline" name="name" id="name"
                value="{{ $movie->name }}" type="text" disabled>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>

            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
    focus:outline-none focus:shadow-outline" name="description" id="description"
                disabled>{{ $movie->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="genre_id">
                Genre
            </label>

            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
    focus:outline-none focus:shadow-outline" name="genre_id" id="genre_id"
                value="{{ $movie->genre->name }}" type="text" disabled>
        </div>

        <div class="flex items-center justify-between">
            <button id="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded
           focus:outline-none focus:shadow-outline" type="submit">Delete Permanently
            </button>
        </div>
    </form>
    </div>
@endsection
