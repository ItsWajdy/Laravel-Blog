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

    public function edit() {

    }

    public function update() {

    }
    
    public function destroy() {
        
    }
}
