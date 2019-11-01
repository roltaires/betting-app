<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuyWager;
use App\Wager;
use App\Http\Requests\BuyWagerStoreRequest;
use DB;

class BuyWagerController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyWagerStoreRequest $request, $wager_id)
    {
        $newBuyWager = new BuyWager;

        DB::transaction(function() use ($wager_id, $request, $newBuyWager) {
            $newBuyWager->wager_id     = $wager_id;
            $newBuyWager->buying_price = $request->input('buying_price');
            $newBuyWager->save();
            $newBuyWager->refresh();

            $wager = Wager::find($wager_id);
            $wager->current_selling_price -= $newBuyWager->buying_price;
            $wager->amount_sold           += $newBuyWager->buying_price;
            $wager->percentage_sold       = $wager->amount_sold / $wager->selling_price * 100;
            $wager->save();
        });

        return response(201)->json($newBuyWager);
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
