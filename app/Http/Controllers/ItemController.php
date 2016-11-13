<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class ItemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //show data
        $items = Item::all();
        return view('item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //create new data
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validation
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        // create new data
        $item = new item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        return redirect()->route('item.index')->with('alert-success', 'Dados salvos com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = Item::findOrFail($id);
        // return to the edit views
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // validation
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();

        return redirect()->route('item.index')->with('alert-success', 'Dados salvos com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // delete data
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item.index')->with('alert-success', 'Dados salvos com sucesso!');
    }

}
