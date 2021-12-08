<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use App\Models\ActualProduct;
use App\Models\Components\Actual;
use App\Models\Product;
use Illuminate\Http\Request;

class ActualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actuals = Actual::all(); 
        return view('admin.components.actual.index', compact('actuals')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actual = new Actual(); 
        $products = Product::all();
        $actualProducts = $actual->products; 
        return view('admin.components.actual.create', compact('actual', 'products', 'actualProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required', 
        ]); 

        $actual = new Actual();
        $actual->title = $request->input('title');
        $actual->description = $request->input('description');
        $actual->status = $request->input('status') === 'on' ? true : false;
        $actual->save(); 

        foreach ($request->input('products') as $product)
        {
            $actualProduct = new ActualProduct();
            $actualProduct->product_id = $product; 
            $actualProduct->actual_id = $actual->id; 
            $actualProduct->save(); 
        }
        return back()->with('message', 'Подборка успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Components\Actual  $actual
     * @return \Illuminate\Http\Response
     */
    public function show(Actual $actual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Components\Actual  $actual
     * @return \Illuminate\Http\Response
     */
    public function edit(Actual $actual)
    {
        $products = Product::all();
        $actualProducts = $actual->products; 
        return view('admin.components.actual.edit', compact('actual', 'products', 'actualProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Components\Actual  $actual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actual $actual)
    {   
        $request->validate([
            'title' => 'required', 
        ]); 

        $actual->title = $request->input('title');
        $actual->description = $request->input('description');
        $actual->status = $request->input('status') === 'on' ? true : false;
        $actual->save(); 

        $actualProduct = ActualProduct::where('actual_id', $actual->id)->delete();
        foreach ($request->input('products') as $product)
        {
            $actualProduct = new ActualProduct(); 
            $actualProduct->product_id = $product; 
            $actualProduct->actual_id = $actual->id; 
            $actualProduct->save(); 
        }

        return back()->with('message', 'Подборка успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Components\Actual  $actual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actual $actual)
    {
       $actual->delete();
       return back()->with('message', 'Подборка успешно удалена');
    }
}
