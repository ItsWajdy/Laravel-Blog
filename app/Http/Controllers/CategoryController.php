<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required|max:255'
        ]);

        $category = new Category;
        $category->name = request('name');
        $category->save();

        session()->flash('message', 'Category Created');
        return redirect()->route('categories.index');
    }
}
