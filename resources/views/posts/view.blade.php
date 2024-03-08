@extends('layouts.app')
@section('content')
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a class="hover:opacity-75">
                <img src="{{ $post->getThumbnail() }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                    @foreach ($post->categories as $category)
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $category->slug }}</a>
                    @endforeach
                </a>
                <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $post->title }}
                </h1>
                <p href="#" class="text-sm pb-8">
                    By <a class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on
                    {{ $post->getFormattedDate() }}
                </p>
                <div>
                    {!! $post->shortBody() !!}
                </div>
            </div>
        </article>


        <div class="w-full flex p-6 ml-20">
            <div class="w-1/2">
                @if ($prev)
                    <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg">
                        <a href="{{ route('post.view', $prev) }}" class="align-middle">
                            <p class="text-lg text-blue-800 font-bold flex items-center"><i
                                    class="fas fa-arrow-left pr-1"></i>
                                Previous</p>
                            <p class="pt-2"> {{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                        </a>
                    </button>   
                @endif
            </div>

            <div class="w-1/2">
                @if ($next)
                    <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg data-theme:light">
                        <a href="{{ route('post.view', $next) }}" class="align-middle block w-full">
                            <div class="flex w-full">
                                <p class="text-lg text-blue-800 font-bold flex items-center mr-1 align-middle">Next</p> <i
                                    class="fas fa-arrow-right pr-1 m-2 align-middle"></i>
                            </div>
                            <p class="pt-2"> {{ \Illuminate\Support\Str::words($next->title, 5) }}</p>
                        </a>
                    </button>
                @endif
            </div>
        </div>
    </section>
@endsection
