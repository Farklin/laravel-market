<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Components\Slider;
use Illuminate\Support\Facades\Storage;



class SliderController extends Controller
{

    public function validation(Request $request)
    {
        $validation_data = $request->validate(
            [
                'title' => ['nullable', 'max:100'],
                'description' => ['nullable', 'max:300'],
                'price' => ['nullable', 'max:5'],
                'image' => ['required'],
                'status' => ['boolean']
            ]
        );
        return $validation_data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Создание нового слайдера';
        $h1 = 'Создание нового слайдера';
        $action = 'admin.slider.create';
        $slider = new Slider();
        return view('admin.components.slider.form', compact('title', 'action', 'h1', 'slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation($request);
        $slider = new Slider();
        $path = $request->file('image')->store('slider');
        $slider->title = $validate['title'];
        $slider->description = $validate['description'];
        $slider->price = $validate['price'];
        $slider->image = $path;
        $slider->status = $validate['status'];
        $slider->save();
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
