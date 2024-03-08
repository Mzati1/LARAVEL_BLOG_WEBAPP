<?php

namespace App\Http\Controllers;

use App\Models\category;
use  Illuminate\Database\Eloquent\Builder;
use App\Models\post;
use App\Models\textWidget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select('categories.title', 'categories.slug', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->get();


        $posts = post::query()
            ->where('active', "=", 1)
            ->whereDate('published_at', "<", Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(5);

        return view('home', compact('posts', 'categories'));
    }

    public function byCategory(category $category)
    {

        $categories = category::query()
        ->join('category_post', 'categories.id', '=', 'category_post.category_id')
        ->select('categories.title', 'categories.slug', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
        ->groupBy('categories.id')
        ->orderByDesc('total')
        ->get();   

        $posts = post::query()
            ->join('category_post', 'post_id', '=', 'category_post.post_id')
            ->where('category_post.post_id', '=', $category->id)
            ->where('active', '=', 1)
            ->whereDate('category_post.post_id', '<', Carbon::now())
            ->orderBy('category_post')
            ->paginate(3);

        return view('home', compact('posts', 'categories'));
    }

    public function show(Post $post, Request $request)
    {
        if (!$post->active || $post->published_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }


        $categories = category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select('categories.title', 'categories.slug', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->get();

        $next = Post::query()
            ->where('active', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->limit(1)
            ->first();

        $prev = Post::query()
            ->where('active', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->limit(1)
            ->first();

        return view('posts.view', compact('post', 'prev', 'next', 'categories'));
    }
}
