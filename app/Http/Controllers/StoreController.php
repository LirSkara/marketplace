<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\Categories;
use App\Models\Puncts;
use App\Models\Product;
use App\Models\Reviews;

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
            'keywords' => ['required', 'min:1'],
            'email' => ['required', 'min:1'],
            'tel' => ['required', 'min:1'],
            'city' => ['required', 'min:1'],
            'adress' => ['min:1']
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
        $review->email = $data->input('email');
        $review->tel = $data->input('tel');
        $review->city = $data->input('city');
        $review->adress = $data->input('adress');
        $review->save();
        Storage::putFileAs($upload_folder, $file, $filename);
        
        //Выгрузка обложки
        
        return redirect()->route('store');
    }

    public function add_product(){
        $categories = new Categories();
        $puncts = new puncts();
        return view('store.forms.add_product',['categories'=>$categories->all(),'puncts'=>$puncts->all()]);
    }

    public function add_product_process(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'article' => ['required', 'min:1'],
            'name' => ['required', 'min:1'],
            'description' => ['required', 'min:1'],
            'category' => ['required', 'min:1'],
            'price' => ['required', 'min:1']
        ]);

        $user = auth()->user();

        $store = Store::where('user',$user->id)->first();
        $review = new Product();
        $upload_folder = 'public/product/cover/';
        $file = $data->file('image');
        $filename = 'User_ID_' . $user->id . '_' . $file->getClientOriginalName();
        $review->image = $filename;
        $review->article = $data->input('article');
        $review->name = $data->input('name');
        $review->description = $data->input('description');
        $review->category = $data->input('category');
        $review->price = $data->input('price');
        $review->store = $store->id;
        $review->status = 0;
        $review->save();
        Storage::putFileAs($upload_folder, $file, $filename);
        
        //Выгрузка обложки
        
        return redirect()->route('store');
    }

    public function store_products(){
        $user = auth()->user();
        $reviews = new Reviews;
        $item = Store::where('user',$user->id)->first();
        $products = new Product();
        return view('store.products',['item'=>$item,'products'=>$products->all(),'reviews'=>$reviews]);
    }
}