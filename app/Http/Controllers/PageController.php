<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
//use app\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:pages',
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:4096',
        ]);
        
        $filename = null;
        
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('pages', 'public');
        }
        
        $content = $request->content; //HTML from TinyMCE
        
        Page::create([
            'slug' => $request->slug,
            'title' => $request->title,
            'content' => $content,
            'image' => $filename,
            'is_locked' => $request->is_locked ?? false,
        ]);
        
        return redirect()->back()->with('success', 'Page created.');
    }
    
    public function show(Page $page)
    {
        $comments = Comment::where('source_page', $page->slug)
        ->orderBy('id', 'desc')
        ->get();
        
        return view('page', compact('page', 'comments'));
    }
    
    public function create()
    {
        return view('admin.pages.create');
    }
    
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }
    
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $page->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        return redirect()->back()->with('success', 'Page updated.');
    }
    
    
    
}
