<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = Tag::all();
        $all_post = Post::orderBy('created_at' , 'desc')->where('status' , '1')->get();
        $electronics = Category::find(3);
        $travel = Category::find(2);
        $first_post = Post::orderBy('created_at' , 'desc')->where('status' , '1')->first();
        $second_post = Post::orderBy('created_at' , 'desc')->where('status' , '1')->skip(1)->take(3)->get();
        return view('home' , compact('first_post','second_post','all_post','tags','electronics'));
    }

    public function dashboard()
    {
        $cat_count = Category::all()->count();
        $post_count = Post::all()->count();
        $tag_count = Tag::all()->count();
        $user_count = User::all()->count();
        return view('admin.dashboard' , compact('cat_count','post_count','tag_count','user_count'));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $categories = Category::all();
        return view('single' , compact('post','categories'));
    }

    public function byCategory($id)
    {
        $category_post = Post::where('category_id' , $id)->where('status' , '1')->get();
        
        return view('category' , compact('category_post'));
    }

    public function byTag($id)
    {
        $tag_post = Tag::find($id);
        
        return view('tag' , compact('tag_post'));
    }

    public function bySearch(Request $request)
    {
        // dd($request->all());
          // Get the search value from the request
        $search = $request->input('query');
        // dd($search);
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->where('status' , '1')
            ->get();
            $title = $request->input('query');
            // dd($title);

            // dd($posts);
        
        return view('result' , compact('posts' ,'title'));
    }
}
