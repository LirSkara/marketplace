<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $count_shop = Store::where('user',$user->id)->count();
        if($count_shop == 0){
            return view('store.index');
        } else {
            $item = Store::where('user',$user->id)->first();
            return view('store.store',['item'=>$item]);
        }
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

        
        $review = new Store();
        $upload_folder = 'public/store/cover/';
        $file = $data->file('image');
        $filename = 'User_ID_' . $user->id . '_' . $file->getClientOriginalName();
        $review->image = $filename;
        $review->name = $data->input('name');
        $review->description = $data->input('description');
        $review->keywords = $data->input('keywords');
        $review->user = $user->id;
        $review->save();
        Storage::putFileAs($upload_folder, $file, $filename);
        
        //Выгрузка обложки
        
        return 111;
    }
}