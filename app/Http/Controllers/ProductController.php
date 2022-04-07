<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->product::create([
                'name' => $request['name'],
                'stock' => $request['stock'],
                'boardingDate' => $request['boardingDate'],
                'observations' => $request['observations'],
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
