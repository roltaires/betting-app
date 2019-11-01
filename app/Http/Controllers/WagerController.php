<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wager;
use App\Http\Requests\WagerStoreRequest;

class WagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wagers = Wager::paginate($request->input('limit'));

        return response()->json($wagers);
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
     * @return \Illuminate\Http\Response
     */
    public function store(WagerStoreRequest $request)
    {
        $validated = $request->validated();

        $newWager = new Wager;
        $newWager->total_wager_value     = $request->input('total_wager_value');
        $newWager->odds                  = $request->input('odds');
        $newWager->selling_percentage    = $request->input('selling_percentage');
        $newWager->selling_price         = $request->input('selling_price');
        $newWager->current_selling_price = $request->input('selling_price');
        $newWager->save();
        $newWager->refresh();

        return response()->json($newWager);
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
