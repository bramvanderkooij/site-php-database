@extends('layouts.layout')

@section('topmenu_items')
    <!-- Top NavBar -->

    <a
        href="{{ route('games.index') }}"
        class="py-2 block
                        block border-b-2 border-transparent
						focus:outline-none font-medium capitalize text-center
						focus:text-green-500 focus:border-green-500
						dark-focus:text-green-200 dark-focus:border-green-200
						transition duration-500 ease-in-out">
        Index
    </a>
    <a href="{{ route('games.create') }}">
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
    <form class="w-full max-w-sm"
          id="form"
          action="{{ route('games.store')}}"
          method="POST">
        @csrf
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4x     ">
            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="name" name="name" placeholder="game" required>
            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="description" name="description" placeholder="description" required>
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="tag_id" id="tag_id">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="downloadlink" name="downloadlink" placeholder="downloadlink" required>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                create tags
            </button>
        </div>
    </form>
@endsection
