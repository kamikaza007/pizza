<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Auth;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas=Pizza::with('creator')->get();
        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
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
            'name'=>'required|min:3|max:60',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('image')) 
        {
            $pizza=new Pizza;
            $pizza->name=$request->name;
            $pizza->description=$request->description;
            $pizza->price=$request->price;
            $pizza->created_by=$pizza->updated_by=Auth::user()->id;
            $pizza->save();

            $name = $pizza->id.'.jpg';
            $destinationPath = public_path('/uploads/pizzas').'/';
            \Image::make($request->image)->fit(1280, 853)->save($destinationPath.$name);
            \Image::make($request->image)->fit(300, 200)->save($destinationPath.'thumbnail_'.$name);
        }
        return redirect()->route('pizza.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        return view('pizza.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        return view('pizza.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'name'=>'required|min:3|max:60',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'image|mimes:jpeg,png,jpg|max:5120'
        ]);
        $pizza->name=$request->name;
        $pizza->description=$request->description;
        $pizza->price=$request->price;
        $pizza->updated_by=Auth::user()->id;
        $pizza->save();

        if ($request->hasFile('image')) 
        {

            

            $name = $pizza->id.'.jpg';
            $destinationPath = public_path('/uploads/pizzas').'/';
            \Image::make($request->image)->fit(1280, 853)->save($destinationPath.$name);
            \Image::make($request->image)->fit(300, 200)->save($destinationPath.'thumbnail_'.$name);
        }

        return redirect()->route('pizza.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizza.index');
    }
}
