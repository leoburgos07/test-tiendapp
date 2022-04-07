<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{

    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $brands = $this->brand->all();
        return view('brands.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            $this->brand::create([
                'name' => ucfirst($request['name']),
                'reference' => strtoupper($request['reference']) 
            ]);

            return redirect('brands')->with('status', 'Marca creada correctamente');
        } catch (\Throwable $th) {
            return Redirect::back()->withErrors(['msg' => 'La marca ya existe']);
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
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact([
            'brand'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {   
        $ref = Brand::where('reference', $request['reference'])->first();
        if($ref && $ref->name == $request['name']){
            return Redirect::back()->withErrors(['msg' => 'Ya existe una referencia igual']);
        }
        $brand->name = $request['name'];
        $brand->reference = $request['reference'];
        $brand->save();
        return redirect('brands')->with('status', 'Marca Actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "leonardoddd";
    }
}
