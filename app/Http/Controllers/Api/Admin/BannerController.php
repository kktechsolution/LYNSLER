<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Filel;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = Banner::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Banner List.', $results, 200);
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
    public function store(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'banner' => 'required',
            'title_1' => 'nullable',
            'title_2' => 'nullable',
            'title_3' => 'nullable',
            'url' => 'nullable',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }


        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('site_banner/', $filename);
            $input['banner'] =  $filename;
        }

        $banner = Banner::create($input);

        $message = 'Banner Created.';
        $data = ['banner' => $banner];
        $code = 200;
        return Res($message, $data, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = Banner::find($id);
        $results['banner'] = $query;
        return Res('Banners.', $results, 200);
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
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'banner' => 'nullable',
            'title_1' => 'nullable',
            'title_2' => 'nullable',
            'title_3' => 'nullable',
            'url' => 'nullable',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $banner = Banner::find($id);
        if (empty($banner)) {
            $message = 'Banner Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }


        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('site_banner/', $filename);
            File::delete('site_banner/' . $banner->getRawOriginal('banner'));

            $input['banner'] = $filename;
        }
        $banner->update($input);

        $message = 'Banner Updated.';
        $data = ['banner' => $banner];
        $code = 200;
        return Res($message, $data, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $banner = Banner::find($id);
        if (empty($banner)) {
            $message = 'Banner Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        File::delete('site_banner/' . $banner->getRawOriginal('banner'));

        $banner->delete();

        $message = 'Banner Deleted.';
        $data = ['banner' => $banner];
        $code = 200;
        return Res($message, $data, $code);
    }
}
