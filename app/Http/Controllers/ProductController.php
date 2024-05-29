<?php

namespace App\Http\Controllers;
// use App\Tables\Products;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use ProtoneMedia\Splade\SpladeTable; 
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Toast;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
return view('admin.product.index',[
    'products'=>SpladeTable::for(Product::class)
    ->column('image',sortable:true)
    ->column('name',sortable:true)
    ->withGlobalSearch(columns: ['name', 'description'])
    ->column('description',sortable:true,hidden: true)
     ->column('price',sortable:true)
     ->column('weight',sortable:true)
     ->column('stock',sortable:true)
     ->column('action')
     ->column('created_at', sortable: true, hidden: true)
     ->paginate(15)]);

    }

    public function create()
    {
        
        $details = [
            'url' => route('admin.products.store'),
            'method' => 'POST',
            'title' => 'Create New Product',
            'type' => 'create'
        ];
    return view('admin.product.create', [
        'details' => $details,
    ]);
    }

    
    public function store(StoreProductRequest $request)
    {

     
        $imagePath = $request->file('image')->store('products', 'public');
        $originalFilename = $request->file('image')->getClientOriginalName();
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'weight' => $request->weight,
            'stock' => $request->stock,
           
            
        ]);
        $product->media()->create([
            'product_id' =>$product->id,
            'file_name'=>$originalFilename,
            'file_path'=>$imagePath
        ]);
        
        Toast::success('Product created successfully!')->autoDismiss(5);
        // return redirect()->route('admin.products.index',$product)->with('product', $product);
        return redirect()->route('admin.products.index');
    }

   
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $productMedia = $product->media;
        $details = [
            'url' => route('admin.products.update',$product),
            'method' => 'PUT',
            'title' => 'Update Product',
            'type' => 'update'
        ];
        $defaults = [
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'weight' => $product->weight,
            'stock' => $product->stock,
            'image' => asset('storage/'.$product->media->file_path),
        ];
        // dd($defaults);
    return view('admin.product.create')->with('defaults', $defaults)->with('details', $details);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());
        $imagePath = $request->file('image')->store('products', 'public');
        $originalFilename = $request->file('image')->getClientOriginalName();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->save();
        $product->media()->update([
            'file_name'=>$originalFilename,
            'file_path'=>$imagePath
        ]);

    
        Toast::success('Product Updated successfully!')->autoDismiss(5);;
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Toast::success('Product Deleted successfully!')->autoDismiss(5);;
        return redirect()->route('admin.products.index');
       
    }
}
