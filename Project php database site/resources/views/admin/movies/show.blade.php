@extends('layouts.layout')

@section('topmenu_items')

    <!-- Top navbar -->
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
            create
        </button>
    </a>
@endsection

@section('content')

<!-- component -->
        <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4">
            <img class="w-full h-56 object-cover object-center" src="https://media.discordapp.net/attachments/905794258265591870/910111655952797766/lamgame.png?width=1191&height=670">
            <div class="flex items-center px-6 py-3 bg-gray-900">
                <h1 class="mx-3 text-white font-semibold text-lg">{{$movie->name}}</h1>
        </div>

        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800"></h1>
            <p class="py-2 text-lg text-gray-700">Genre: {{$movie->genre->name}}</p>
            <p class="py-2 text-lg text-gray-700">{{ $movie->description }}</p>

                <a href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Edit  |</a>
                <a href="{{ route('movies.delete', ['movie' => $movie->id]) }}">Delete  </a>
@endsection
