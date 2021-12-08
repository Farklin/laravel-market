<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Components\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


/*
TODO:
* - Сделать обновление слайдера
* - Сделать удаление слайдера
* - Сделать удаление картинки
* - Сделать отображение всех слайдеров
* - Посмотреть как грамотно реализовать

*/


class SliderController extends Controller
{

    public function validation(Request $request)
    {
        $validation_data = $request->validate(
            [
                'title' => ['nullable', 'max:100'],
                'description' => ['nullable', 'max:300'],
                'price' => ['nullable'],
                'image' => ['required'],
                'status' => ['nullable']
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
        $sliders = Slider::all();
        return view('admin.components.slider.index', compact('sliders'));
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
        return view('admin.components.slider.create', compact('title', 'action', 'h1', 'slider'));
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
        $slider->status = $validate['status'] === 'on' ? true : false;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.components.slider.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->price = $request->input('price');
        $slider->status = $request->input('status') === 'on' ? true : false;
        if ($request->file('image') != null) {
            Storage::delete($slider->image);
            $path = $request->file('image')->store('slider');
            $slider->image = $path;
        }
        $slider->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();

        return Redirect::back()->with('message', 'Слайдер успешно удален');
    }
}
