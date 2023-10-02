<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return redirect('user/blog/' . $request->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::with('comments')->where('slug', $slug)->where('status', '1')->first();
        $allCategory = Category::all();
        $latestPosts = Post::where('status', '1')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();

        return view('frontend.post.blog')->with(compact('post','latestPosts','allCategory'));        
    }
}
