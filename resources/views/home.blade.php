@extends('layouts.app')
<?php
use Illuminate\Database\Eloquent\Builder;
?>
@section('content')
    <div class="container mx-auto flex-box flex-wrap py-6">
        <!-- Posts Section -->

        <section class="w-full md:w-2/3 flex flex-col items-center px-3 float-start">

            @foreach ($posts as $post)
                <x-post-item :post="$post">
                </x-post-item>
                
            @endforeach
            <!--pagination-->
            {{ $posts->links() }}

        </section>
        <x-sidebar />
    </div>
@endsection
