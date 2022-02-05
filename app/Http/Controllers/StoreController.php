<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }

    public function store_add()
    {
        $user = auth()->user();
        return view('store.forms.store_add',['user' => $user]);
    }
}
