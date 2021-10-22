<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDATION 

        $request->validate([
            'title' => 'required|string|unique:posts|min:2',
            'content' => 'required|string|min:10',
            'image' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'string' => 'Il campo :attribute deve essere una stringa',
            'min' => 'Il minimo dei caratteri deve essere :min',
            'title.unique' => 'Questo titolo esiste già'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $post = new Post();
        $post->slug = Str::slug($data['title'], '-');
        $post->fill($data);
        $post->save();
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        // VALIDATION 

        $request->validate([
            'title' => ['required', 'string' | Rule::unique('posts')->ignore($post->id), 'min:2'],
            'content' => 'required|string|min:10',
            'image' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',

        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'string' => 'Il campo :attribute deve essere una stringa',
            'min' => 'Il minimo dei caratteri deve essere :min',
            'title.unique' => 'Questo titolo esiste già'
        ]);

        $data = $request->all();
        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert', "Il post: $post->title è stato cancellato correttamente");
    }
}
