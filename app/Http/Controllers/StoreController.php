<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\Categories;
use App\Models\Puncts;
use App\Models\Product;
use App\Models\Reviews;
use App\Models\OrderOne;
use App\Models\CarouselProduct;

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
        $review->ostatok = $data->input('ostatok');
        $review->save();
        Storage::putFileAs($upload_folder, $file, $filename);
        
        //Выгрузка обложки
        
        return redirect()->route('store');
    }

    public function edit_product_process(Request $data, $id){
        $valid = $data->validate([
            'article' => ['required', 'min:1'],
            'name' => ['required', 'min:1'],
            'description' => ['required', 'min:1'],
            'price' => ['required', 'min:1'],
            'ostatok' => ['required', 'min:1'],
            'category' => ['required', 'min:1'],
        ]);

        $review = Product::find($id);
        $review->article = $data->input('article');
        $review->name = $data->input('name');
        $review->description = $data->input('description');
        $review->category = $data->input('category');
        $review->price = $data->input('price');
        $review->ostatok = $data->input('ostatok');
        $review->status = 0;
        $review->save();
        
        return redirect()->route('store_products');
    }

    public function delete_product_process(Request $data, $id){
        $review = Product::find($id)->delete();
        return redirect()->route('store_products');
    }

    public function edit_product_img_process(Request $data, $id){
        $valid = $data->validate([
            'image' => ['image', 'mimetypes:image/jpeg,image/png,image/webp'],
        ]); 
        
        $review = Product::find($id);
        $upload_folder = 'public/product/cover/';
        $file = $data->file('image');
        $filename = $file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $review->image);
        Storage::putFileAs($upload_folder, $file, $filename);    
        $review->image = $filename;
        Storage::putFileAs($upload_folder, $file, $filename); 
    
        $review->save();
        return redirect()->route('store_products');
    }

    public function store_products(){
        $user = auth()->user();
        $reviews = new Reviews;
        $item = Store::where('user',$user->id)->first();
        $products = new Product();
        $productst = new Product();
        $categories = new Categories();
        $puncts = new puncts();
        return view('store.products',['item'=>$item,'products'=>$products->all(),'productst'=>$productst,'reviews'=>$reviews, 'categories'=>$categories->all(), 'puncts'=>$puncts->all()]);
    }

    public function orders(){
        $one = new OrderOne;
        $product = new Product;
        $store = new Store;
        return view('store.orders',[
            'one_orders'=>$one->all(),
            'product'=>$product,
            'store'=>$store
        ]);
    }

    public function carousel_product_process($id) {
        $product = Product::find($id);
        $carousel_product = CarouselProduct::where('product_id', '=', $id)->get();
        $carousel_product_count = CarouselProduct::where('product_id', '=', $id)->count();
        return view('store.forms.carousel_product', ['product' => $product, 'carousel_product' => $carousel_product, 'carousel_product_count' => $carousel_product_count]);
    }

    public function add_carousel_product_process($id, Request $data) {
        $carousel_product = new CarouselProduct();
        $carousel_product->product_id = $id;
        $upload_folder = 'public/product/carousel/'.$id.'/';
        $file = $data->file('image');
        $filename = $file->getClientOriginalName();
        Storage::putFileAs($upload_folder, $file, $filename); 
        $carousel_product->image = $filename;
        $carousel_product->save();
        return redirect()->route('carousel_product', $id);
    }

    public function edit_carousel_product_process($id, Request $data) {
        $carousel_product = CarouselProduct::find($id);
        $upload_folder = 'public/product/carousel/'.$carousel_product->product_id.'/';
        $file = $data->file('image');
        $filename = $file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $carousel_product->image);
        Storage::putFileAs($upload_folder, $file, $filename); 
        $carousel_product->image = $filename;
        $carousel_product->save();
        return redirect()->route('carousel_product', $carousel_product->product_id);
    }

    
    public function delete_carousel_product_process($id) {
        $carousel_product = CarouselProduct::find($id);
        $product_id = $carousel_product->product_id;
        $upload_folder = 'public/product/carousel/'.$carousel_product->product_id.'/';
        Storage::delete($upload_folder . '/' . $carousel_product->image); 
        $carousel_product = CarouselProduct::find($id)->delete(); 
        return redirect()->route('carousel_product', $product_id);
    }
}