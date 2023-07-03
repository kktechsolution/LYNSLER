<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
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
        $query = OurTeam::query();
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
            'education' => 'required',
            'description' => 'required',
            'profile' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $team_member = new OurTeam();
        $team_member->name = $request->name;
        $team_member->education = $request->education;
        $team_member->description = $request->description;

        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('profile/', $filename);
            $team_member->profile = $filename;
        }

        $team_member->save();

        $message = 'Team Member Created.';
        $data = ['team_member' => $team_member];
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

        $team_member = OurTeam::find($id);
        if (empty($team_member)) {
            $message = 'Team Member Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $team_member->is_active = true;

        $team_member->update();

        $message = 'Team Member Activated.';
        $data = ['Team Member' => $team_member];
        $code = 200;
        return Res($message, $data, $code);
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



        $team_member = OurTeam::find($id);
        if (empty($team_member)) {
            $message = 'Team Member Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $team_member->is_active = false;

        $team_member->update();

        $message = 'Team Member Deactivated.';
        $data = ['Team Member' => $team_member];
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
            'name' => 'required|max:55',
            'education' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $team_member = OurTeam::find($id);
        if (empty($team_member)) {
            $message = 'Team Member Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $team_member->name = $request->name;
        $team_member->education = $request->education;
        $team_member->description = $request->description;



        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('profile/', $filename);
            File::delete('profile/' . $team_member->getRawOriginal('profile'));
            $team_member->profile = $filename;
        }

        $team_member->update();

        $message = 'Team Member Updated.';
        $data = ['Team Member' => $team_member];
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



        $xml = simplexml_load_file('https://www.ds.net.au/export/datafeeds/ds-standard-soh.xml');

        // $vendor_sku = trim('AT010575267');
        $vendor_sku = trim('UU011243506');

        foreach ($xml->item as $product) {

            if ($product->vendor_sku == $vendor_sku) {
                $total_soh = (int) $product->total_soh;

                if ($total_soh == 0) {
                    echo "The total SOH for {$vendor_sku} is zero.";
                } else {
                    echo "The total SOH for {$vendor_sku} is {$total_soh}.";
                }

                break;
            }
        }

        if (!isset($total_soh)) {
            echo "{$vendor_sku} not found in file";
        }
    }
}
