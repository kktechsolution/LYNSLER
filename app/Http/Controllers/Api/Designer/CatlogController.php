<?php

namespace App\Http\Controllers\Api\Designer;

use App\Http\Controllers\Controller;
use App\Models\Catlog;
use App\Models\CatlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CatlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = Catlog::query();
        $results = Search($request, $query, function ($query) {
            return $query->where('user_id', Auth::user()->id);
        });
        return Res('My Catlogs List.', $results, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Res('Catlog Categories List.', CatlogCategory::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->authorize(['designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'catlog_category_id' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        if ($request->hasfile('img1')) {
            $file = $request->file('img1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $input['img1'] =  $filename;
        }

        if ($request->hasfile('img2')) {
            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $input['img2'] =  $filename;
        }

        if ($request->hasfile('img3')) {
            $file = $request->file('img3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $input['img3'] =  $filename;
        }

        $input['user_id'] =  Auth::user()->id;


        $new_cat = Catlog::create($input);

        return Res('Catlog Added.', $new_cat, 200);
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
        if (!$this->authorize(['designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'catlog_category_id' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $catlog = Catlog::find($id);
        if (empty($catlog)) {
            $message = "Catlog not found.";
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        if ($request->hasfile('img1')) {
            $file = $request->file('img1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img1'));
            $validated['img1'] =  $filename;
        }

        if ($request->hasfile('img2')) {
            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img2'));
            $validated['img2'] =  $filename;
        }

        if ($request->hasfile('img3')) {
            $file = $request->file('img3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img3'));
            $validated['img3'] =  $filename;
        }


        $new_cat = $catlog->update($validated);

        return Res('Catlog updated.', $new_cat, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authorize(['designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }


        $catlog = Catlog::find($id);
        if (empty($catlog)) {
            $message = "Catlog not found.";
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        return Res('Catlog deleted.', $catlog, 200);

    }
}
