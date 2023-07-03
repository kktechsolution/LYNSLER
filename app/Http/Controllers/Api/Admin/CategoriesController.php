<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Google\Client;
use Google\Service\MyBusinessAccountManagement;
use Google\Service\MyBusinessAccountManagement\Account;
use Google\Service\MyBusinessAccountManagement\ListAccountsResponse as ListAccounts;

class CategoriesController extends Controller
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

        $query = Category::query();
        $results = Search($request, $query, function ($query) {
            return $query;
        });


        return Res('Search Results', $results, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = User::find(1);
        $user->name = 'Jane Doe';
        $user->save();
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
            'name' => 'required|max:55|unique:categories',
            'icon' => 'nullable',
            'description' => 'required',
            'parent_id' => 'nullable',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('icon/', $filename);
            $input['icon'] = $filename;
        }

        $category = Category::create($input);

        $message = 'Category Created.';
        $data = ['category' => $category];
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
        if (!$this->authorize(['admin', 'department'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = Category::find($id);
        $query->products;
        $results['category'] = $query;
        $results['sub_categories'] = Category::where('parent_id', $query->id)->with('products')->get();
        return Res('Single Category With Products.', $results, 200);
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
            'name' => 'nullable|max:55|unique:categories,name,' . $id,
            'description' => 'nullable',
            'icon' => 'nullable',
            'is_active' => 'nullable'

        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $category = Category::find($id);
        if (empty($category)) {
            $message = 'Category Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('icon/', $filename);
            File::delete('icon/' . $category->getRawOriginal('icon'));
            $input['icon'] = $filename;
        }


        // Update an existing user


        $category->update($input);

        $message = 'Category Updated.';
        $data = ['category' => $category];
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



        $category = Category::find($id);
        if (empty($category)) {
            $message = 'Category Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }



        File::delete('icon/' . $category->getRawOriginal('icon'));

        $products = $category->products;

        foreach ($products as $product) {
            File::delete('product/thumbnail/' . $product->getRawOriginal('thumbnail'));

            $images = $product->images;

            foreach ($images as $image) {
                File::delete('product/images/' . $image->getRawOriginal('image'));
            }
        }

        $category->delete();

        $message = 'Category Deleted.';
        $data = ['category' => $category];
        $code = 200;
        return Res($message, $data, $code);
    }
}
