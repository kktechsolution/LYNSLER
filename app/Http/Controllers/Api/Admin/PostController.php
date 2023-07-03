<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
        $query = Post::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Post List.', $results, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'title' => 'required|max:55',
            'sort_description' => 'required',
            'description' => 'required',
            'banner' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->sort_description = $request->sort_description;
        $post->description = $request->description;

        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('banner/', $filename);
            $post->banner = $filename;
        }

        $post->save();

        $message = 'Blog Created.';
        $data = ['post' => $post];
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
        $query = Post::find($id);
        $results['post'] = $query;
        return Res('Post.', $results, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }



        $post = Post::find($id);
        if (empty($post)) {
            $message = 'Blog Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $post->is_active = false;

        $post->update();

        $message = 'Blog Deactivated.';
        $data = ['blog' => $post];
        $code = 200;
        return Res($message, $data, $code);
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
            'title' => 'required|max:55',
            'sort_description' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $post = Post::find($id);
        if (empty($post)) {
            $message = 'Blog Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->sort_description = $request->sort_description;
        $post->description = $request->description;

        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('banner/', $filename);
            File::delete('banner/' . $post->getRawOriginal('banner'));
            $post->banner = $filename;
        }

        if($request->has('is_active')) {
            $post->is_active = $request->is_active;
        }

        $post->update();

        $message = 'Blog Updated.';
        $data = ['blog' => $post];
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



        $post = Post::find($id);
        if (empty($post)) {
            $message = 'Blog Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        File::delete('banner/' . $post->getRawOriginal('banner'));

        $post->delete();

        $message = 'Blog Deleted.';
        $data = ['blog' => $post];
        $code = 200;
        return Res($message, $data, $code);
    }
}
