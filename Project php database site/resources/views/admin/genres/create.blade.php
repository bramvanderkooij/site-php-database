@extends('layouts.layout')

@section('topmenu_items')
    <!-- Top NavBar -->

    <a
        href="{{ route('genres.create') }}"
        class="py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
        Create
    </a>
    <a href="{{ route('genres.index') }}">
        <button
            class="ml-6 py-2 block border-b-2 border-transparent
						focus:outline-none font-medium capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
            Index
        </button>
    </a>
@endsection
@section('content')

    <div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semi-bold text-gray-600 dark:text-gray-400">
                Genre Admin
            </h2>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8"
                 style="...">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8"
                 style="...">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
            </div>
        @endif

    <form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
    action="{{ route('genres.store') }}" method="POST">
    @csrf
    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
    Name
    </label>

    <input
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
    focus:outline-none focus:shadow-outline @error('name')border-red-500 @enderror" name="name" id="name"
    value="{{ old('name') }}" type="text" required>
    </div>

    <div class="flex items-center justify-between">
    <button id="submit"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded
           focus:outline-none focus:shadow-outline" type="submit">Submit
    </button>
    </div>
    </form>
    </div>
@endsection
