<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sliders = Slider::all();
        
        return view('admin.slider.index',[
            'sliders'=>SpladeTable::for(Slider::class)
         
            ->column('image',sortable:true)
            ->withGlobalSearch(columns: ['name', 'description'])
            ->column('name',sortable:true)
             ->column('action')
             ->column('created_at', sortable: true, hidden: true)
             ->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $details = [
            'url' => route('admin.slider.store'),
            'method' => 'POST',
            'title' => 'Create New Slider',
            'type' => 'create'
        ];
    return view('admin.slider.create', [
        'details' => $details,
    ]);
        // return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('slider', 'public');
        }
        Slider::create([
            'name' => $request->name,
            'image' => $image_path
        ]);
        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $details = [
            'url' => route('admin.slider.update',$slider),
            'method' => 'PUT',
            'title' => 'Update Slider',
            'type' => 'update'
        ];
        $defaults = [
            'name' => $slider->name,
           
            'image' => asset('storage/'.$slider->image),
        ];
        // dd($defaults);
    return view('admin.slider.create')->with('defaults', $defaults)->with('details', $details);
        // return redirect()->route('admin.slider.index');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('slider', 'public');
        }
        $slider->update([
            'name' => $request->name,
            'image' => $image_path
        ]);
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index');
        //
    }
}
