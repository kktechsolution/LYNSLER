<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManufacturingCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }

        $transactions = ManufacturingCost::paginate(3);        ;
        return view('admin.styles', ['items' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        return view('admin.addStyle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type !='master_admin') {
            return redirect()->back();
        }
        $validated = $request->validate([

            'style_name' => 'required',
            'style_no' => 'required',
            'manufacuturing_cost' => 'required',

        ]);

        ManufacturingCost::create($validated);
        return redirect()->route('style.index')->with('success', 'cost added successfully.');

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
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $style=ManufacturingCost::find($id);
        return view('admin.edit_style',['style' => $style]);
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
        if (Auth::user()->type !='master_admin') {
            return redirect()->back();
        }
        $validated = $request->validate([

            'style_name' => 'required',
            'style_no' => 'required',
            'manufacuturing_cost' => 'required',

        ]);

        $cost=ManufacturingCost::find($id);
        $cost->update($validated);
        return redirect()->route('style.index')->with('success', 'cost update successfully.');

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
