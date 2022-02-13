<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;

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

    public function store_add_process(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'name' => ['required', 'min:1'],
            'description' => ['required', 'min:1'],
            'keywords' => ['required', 'min:1']
        ]);

        $user = auth()->user();

        //Выгрузка обложки
        $upload_folder = 'public/store/cover/';
        $file = $data->file('image');
        $filename = 'User_ID_' . $user->id . '_' . $file->getClientOriginalName();
        Storage::putFileAs($upload_folder, $file, $filename);

        $review = new Store();
        $review->image = $data->input('image');
        $review->name = $data->input('name');
        $review->description = $data->input('description');
        $review->keywords = $data->input('keywords');
        $review->user = $user->id;
        $review->save();

        return $user;
    }
}