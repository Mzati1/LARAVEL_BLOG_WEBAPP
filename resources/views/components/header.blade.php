<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a href="{{route('home')}}" class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
            {{ \App\Models\textWidget::getTitle('header') }}
        </a>
        <p class="text-lg text-gray-600">
            {{ \App\Models\textWidget::getContent('header') }}
        </p>
    </div>
</header>