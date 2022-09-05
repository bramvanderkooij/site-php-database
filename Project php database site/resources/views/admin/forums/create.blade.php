@extends('layouts.layout')

@section('topmenu_items')
    <!-- Top NavBar -->

    <a href="{{ route('forums.index') }}"
        class="py-2 block
                        block border-b-2 border-transparent
						focus:outline-none font-medium capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
        Index
    </a>
    <a href="{{ route('forums.create') }}">
        <button
            class="ml-6 py-2
                        text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">

            Create
        </button>
    </a>
@endsection


@section('content')
    <form class="w-full max-w-sm" id="form" action="{{ route('forums.store') }}" method="POST">
        @csrf
        <input
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            id="name" name="name" placeholder="name" required>
        <textarea
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            id="description" name="description" placeholder="description" required></textarea>
        <button
            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
            type="submit">
            create forums
        </button>
    </form>
@endsection
