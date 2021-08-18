<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Item;
     */
    public function store(Request $request)
    {
        //
        $newItem = new Item();
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
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
     * @return Item | string
     */
    public function update(Request $request, $id)
    {
        //
        $exitingItem = Item::firstOrFail($id);
        if ($exitingItem) {
            $exitingItem->completed = $request->item['completed'] ? true : false;
            $exitingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $exitingItem->save();

            return $exitingItem;
        }

        return 'Item not found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        //
        $exitingItem = Item::firstOrFail($id);
        if ($exitingItem) {
           $exitingItem->delete();
           return "Item deleted";
        }

        return "Item not found";
    }
}
