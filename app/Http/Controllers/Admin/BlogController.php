<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['blogs'] = Blog::select('id','title','description','image')->paginate(10);
        return view('dashboard.blog.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        $blogData = $request->only(['title', 'description', 'image']);

        $response =  blog::create($blogData);

        if($response->id) {
            return redirect()->route('admin.blog.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if($blog->update($request->only(['title', 'description']))) {
                return redirect()->to(route('admin.blog.index'));
            } else {
                return redirect()->back();
            }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->delete()) {
            return redirect()->to(route('admin.blog.index'));
        } else {
            return redirect()->back();
        }
    }
}
