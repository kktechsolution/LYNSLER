<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\ManufacturerCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        $orders = ManufacturerCost::where('manufacturer_id', Auth::user()->id)
        ->paginate(5);

    return view('Manufacturer.costs', ['items' => $orders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }



    return view('Manufacturer.create_cost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }
        $validated = $request->validate([

            'style_name' => 'required',
            'size' => 'required',
            'manufacuturing_cost' => 'required',

        ]);

        $manufacutering_cost = new ManufacturerCost();
        $manufacutering_cost->manufacturer_id = Auth::user()->id;
        $manufacutering_cost->style_name = $request->style_name;
        $manufacutering_cost->size = $request->size;
        $manufacutering_cost->manufacuturing_cost = $request->manufacuturing_cost;
        $manufacutering_cost->save();

        return redirect()->route('manufacturer_cost.index')->with('success', 'cost added successfully.');


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
