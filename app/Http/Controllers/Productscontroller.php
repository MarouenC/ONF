<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;

class Productscontroller extends Controller
{
    public function index(Request $request)
    {
        // locations + categories //
        $product_categories_options = Product::getCategoriesOptions();
        $product_location_options = Product::getLocationOptions();
        // ------ //
        
        $products = Product::orderBy('created_at', 'desc');
        if ($request->has('search') && $request->search !== "") {
            $products = $products->where('product_name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('searchName') && $request->searchName !== "") {
            $products= Product::whereHas('user', function($products) use($request) {
            $products->where('username', 'like', '%'.$request->searchName.'%');
            });
        }
        if ($request->has('product_category') && $request->has('product_category') !== "") {
            $products = $products->where('product_category', 'like', '%' . $request->product_category . '%');
        }
        if ($request->has('product_location') && $request->has('product_location') !== "") {
            $products = $products->where('product_location', 'like', '%' . $request->product_location . '%');
        }
        if ($request->has('sortBy') && $request->sortBy === "Lowest"){
            $products =  Product::orderBy('product_price', 'asc');
        }
        if( $request->has('sortBy') && $request->sortBy === "Highest"){
            $products =  Product::orderBy('product_price', 'desc');
        }
        if ($request->has('minimum') && $request->minimum != "") {
            $products = $products->where('product_price', '>=', $request->minimum);
        }
        if ($request->has('maximum') && $request->maximum != "") {
            $products = $products->where('product_price', '<=', $request->maximum);
        }
        $products = $products->get();
        //dd($request->all());
        return view('Products.index', compact('products', 'product_categories_options', 'product_location_options'));
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('Products.show', compact('product'));
    }


    public function __construct(){
        $this-> middleware('auth');
    }

    public function create(){
        $product_categories_options = Product::getCategoriesOptions();
        $product_location_options = Product::getLocationOptions();

        return view ('products.create', compact('product_categories_options', 'product_location_options'));
    }
   
    public function store(Request $request){
        $validated =  $request -> validate([
            'product_name' => ['required', 'string'],
            'product_price' => ['required','numeric'],
            'product_description' => ['required'],
            'product_category' => ['required','nullable', 'in:'.implode(",", Product::getAllCategories())],
            'product_location' => ['required','nullable', 'in:'.implode(",", Product::getAllLocation())],
            'product_deliverable' => 'required',
            'product_phone' => ['required','integer'],
            'product_email' => ['required','string','email','max:255']
        ]);     
        
       $product_image_path= request('product_image_1')->store("uploads","public");
       $image= Image::make(public_path("storage/{$product_image_path}"))->fit(1200,1200);
       $image -> save();
        //partie mizmiz
        $new_product = auth()-> user()-> products()-> create($validated);
       
        $productImage = ProductImage::create([
            'product_id' =>  $new_product->id,
            'product_image_path' => $product_image_path
        ]);

        if($request->has('product_image_2')){
            $product_image_path = request('product_image_2')->store("uploads","public");
            $productImage2 = ProductImage::create([
                'product_id' =>  $new_product->id,
                'product_image_path' => $product_image_path
            ]);
        }

        if($request->has('product_image_3')){
            $product_image_path = request('product_image_3')->store("uploads","public");
            $productImage3 = ProductImage::create([
                'product_id' =>  $new_product->id,
                'product_image_path' => $product_image_path
            ]);
        }

        $new_product->save();
        return redirect('/profile/' . auth()-> user()->id);
    }

    
    public function edit(Product $product){
        $product_categories_options = Product::getCategoriesOptions();
        $product_location_options = Product::getLocationOptions();
        return view ('products.edit', compact('product', 'product_categories_options', 'product_location_options'));

    }
    public function update(Request $request,Product $product){
        $product = Product::find($product->id);
        $validated =  $request -> validate([
            'product_name' => ['required', 'string'],
            'product_price' => ['required','numeric'],
            'product_description' => ['required'],
            'product_category' => ['required','nullable', 'in:'.implode(",", Product::getAllCategories())],
            'product_location' => ['required','nullable', 'in:'.implode(",", Product::getAllLocation())],
            'product_deliverable' => 'required',
            'product_phone' => ['required','integer'],
            'product_email' => ['required','string','email','max:255']
        ]);     
        
      
         //partie mizmiz
        $product-> update($validated);
       
        if($request->has('product_image_1')){
            $product->product_image[0]->$productImage;
            $product_image_path = request('product_image_1')->store("uploads","public");
            $image= Image::make(public_path("storage/{$product_image_path}"))->fit(1200,1200);
            $image -> save();
            $productImage = ProductImage::create([
                'product_id' =>  $product->id,
                'product_image_path' => $product_image_path
            ]);
        }
        if($request->has('product_image_2')){
            $product->product_image[1]->delete();
            $product_image_path = request('product_image_2')->store("uploads","public");
            $image= Image::make(public_path("storage/{$product_image_path}"))->fit(1200,1200);
            $image -> save();
            $productImage2 = ProductImage::create([
                'product_id' =>  $product->id,
                'product_image_path' => $product_image_path
            ]);
        }

        if($request->has('product_image_3')){
            $product->product_image[2]->delete();
            $product_image_path = request('product_image_3')->store("uploads","public");
            $image= Image::make(public_path("storage/{$product_image_path}"))->fit(1200,1200);
            $image -> save();
            $productImage3 = ProductImage::create([
                'product_id' =>  $product->id,
                'product_image_path' => $product_image_path
            ]);
        }
        
        
        return redirect('/profile/' . auth()-> user()->id);
    }
    
    public function destroy(Product $product){
        $product->delete();    
        return redirect('/profile/' . auth()-> user()->id);
    }
}