<?php

namespace App\View\Components;

use Closure;
use App\Models\category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use  Illuminate\Database\Eloquent\Builder;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->get()
            ->paginate(1);

        return view('home', compact('categories'));
    }
}
