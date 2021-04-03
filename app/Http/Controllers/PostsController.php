<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // if()

        $user = Auth::user();
        if($user->admin){
            $posts = Post::orderBy('created_at','desc')->get();
        } else {
            $posts = Post::where("user_id", "=", $user->id)->orderBy('created_at','desc')->get();
        }
        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0){
            return redirect()->back()->with('message','You must have categories in order to create a post');
        }
        return view('admin.posts.create' , compact('categories' , 'tags') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    

       $request->validate([
            'title' => 'required|min:5|max:50',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
       ]);

       if($request->featured){
           //get image
           $image = $request->featured;
            //set image name
           $name = time().$image->getClientOriginalName();
            //move image name with new name
           $image->move('images' , $name);

           $post = Post::create([
               'title' => $request->title,
               'slug' => Str::slug($request->title),
               'content' => $request->content,
               'featured' => 'images/' . $name,
               'category_id' => $request->category_id,
         
               'user_id' => Auth::id()
           ]);

           $post->tags()->attach($request->tags);

           return redirect(route('admin.post.index'))->with('message' , 'Post Created Successfully');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit' , compact('post' , 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|min:5|max:50',
            'content' => 'required',
            'category_id' => 'required'
       ]);

       $post = Post::find($id);

       if($request->has('featured')){
           $featured = $request->featured;
           $name = time().$featured->getClientOriginalName();
           $featured->move('images' , $name);
           $post->featured = 'images/' . $name;
       }

       $post->title = $request->title;
       $post->content = $request->content;
       $post->category_id = $request->category_id;

       $post->save();

       $post->tags()->sync($request->tags);

       return redirect(route('admin.post.index'))->with('message' , 'Post Updated Successfully');


    }

    /**
     * Dsiable the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function disable(Request $request, $id)
     {
        $post = Post::find($id);

        $post->status = 0;

        $post->save();

        return redirect(route('admin.post.index'))->with('message' , 'Post Disabled Successfully');
     }
    /**
     * Approve the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function approve(Request $request, $id)
     {
        $post = Post::find($id);

        $post->status = 1;

        $post->save();

        return redirect(route('admin.post.index'))->with('message' , 'Post Approved Successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        return redirect(route('admin.post.index'))->with('message' , 'Post Deleted Successfully');
    }
}
