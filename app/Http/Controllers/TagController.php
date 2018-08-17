<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag) {
        return view('tags.show', compact('tag'));
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required|min:1|max:255'
        ]);

        $tag = new Tag;
        $tag->name = request('name');
        $tag->save();

        Session::flash('message', 'New Tag Successfuly Created');
        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag) {
        return view('tags.edit', compact('tag'));
    }

    public function update(Tag $tag) {
        $this->validate(request(), [
            'name' => 'required|max:255'
        ]);

        $tag->name = request('name');
        $tag->update();

        Session::flash('message', 'Tag Updated');
        return redirect()->route('tags.show', $tag->id);
    }
    
    public function destroy(Tag $tag) {
        $tag->posts()->detach();     // Removes any reference to this tag from the many-to-many post_tag table
        $tag->delete();

        Session::flash('message', 'Tag Deleted');
        return redirect()->route('tags.index');
    }
}
