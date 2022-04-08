<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    private $product;
    private $size;
    private $brand;

    public function __construct(Product $product, Size $size, Brand $brand)
    {
        $this->product = $product;
        $this->size = $size;
        $this->brand = $brand;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                    ->join('brands', 'products.brand_id', 'brands.id')
                    ->join('sizes', 'products.size_id', 'sizes.id')
                    ->select('products.*','brands.name as marca', 'sizes.size as talla')->get();
        return view('products.list', compact([
            'products'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $brands = $this->brand->all();
        $sizes = $this->size->all();
        return view('products.create', compact(
            'brands',
            'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->product::create([
                'name' => ucfirst($request['name']),
                'stock' => $request['stock'],
                'boardingDate' => $request['boardingDate'],
                'observations' => ucfirst($request['observations']),
                'brand_id' => $request['brand'],
                'size_id' => $request['size']
            ]);
            return redirect('products')->with('status', 'Producto creado correctamente');
        } catch (\Throwable $th) {
            return Redirect::back()->withErrors(['msg' => 'Error al crear el producto']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = $this->brand->all();
        $sizes = $this->size->all();
        return view('products.edit', compact(
            'brands',
            'sizes',
            'product'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $data = $request->all();
            $product->update($data);
            return redirect('products')->with('status', 'Producto Actualizado correctamente');
        } catch (\Throwable $th) {
            return redirect('products')->with('status', 'Error al actualizar el producto');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::back()->with('status','Producto eliminado correctamente');

    }
}
