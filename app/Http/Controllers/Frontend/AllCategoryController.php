<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class AllCategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->where('status', '1')->first();
        $allCategory = Category::all();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '1')->get();

            $latestPosts = Post::where('status', '1')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get(); 
                        
            return view('frontend.post.allblog', compact('post', 'category','latestPosts','allCategory'));
        } else {
            return redirect('user/home');
        }
    }
}
