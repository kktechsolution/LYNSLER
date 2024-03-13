<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtraController extends Controller
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


   public function index(Request $request)
   {
       if (Auth::user()->type != 'master_admin') {
           return redirect()->back();
       }

       $extras = Extra::orderBy('name');
       // Default sorting
       // Check if request has a sort parameter
       if ($request->has('sort')) {
           $sortField = $request->get('sort');
           $sortDirection = $request->get('direction', 'asc');

           $extras = Extra::orderBy($sortField, $sortDirection);
       }

       $extras = $extras->paginate(5);
       return view('admin.extras', ['extras' => $extras]);
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

        return view('admin.add_extra');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
