<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Collections;
use App\Models\Mactions;
use Illuminate\Http\Request;
use App\Models\Puncts;
use App\Models\Slides;

class MainController extends Controller
{
    public function home()
    {
        $slides = new Slides();
        $collections = new Collections();
        $mactions = new Mactions();
        return view('home',['slides' => $slides->orderBy('id','desc')->get(),'collections' => $collections->orderBy('id','desc')->get(),'mactions' => $mactions->orderBy('id','desc')->get()]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function product()
    {
        return view('product');
    }

    public function category($id)
    {
        $item = Puncts::find($id);
        $c_name = Categories::find($item->category)->name;
        return view('category',['item' => $item,'c_name' => $c_name]);
    }

    public function brand()
    {
        return view('brand');
    }

    public function favorites()
    {
        return view('favorites');
    }
}
