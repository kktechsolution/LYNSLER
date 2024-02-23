<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {

        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'gender' => 'nullable'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $input['password'] = bcrypt($request->password);

        $user = User::create($input);
        $accessToken = $user->createToken('LaravelAuthApp')->accessToken;
        $message = 'Registration Done.';
        $data = ['user' => $user, 'access_token' => $accessToken];
        $code = 201;
        return Res($message, $data, $code);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        // return response(['data' => $request->all()]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
            'password' => "required",
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        if (auth()->attempt($data)) {
            $accessToken = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            $message = 'Login Success.';
            $data = ['user' => auth()->user(), 'access_token' => $accessToken];
            $code = 201;
            return Res($message, $data, $code);
        } else {
            $message = 'Invalid Credentials.';
            $data = [];
            $code = 401;
            return Res($message, $data, $code);
        }
    }

    function changePassword(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'old_password' => "required",
            'new_password' => "required",
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $user = User::find(Auth::guard('api')->user()->id);
        // return $user;
        //Changing the password only if is different of null
        if (isset($data['old_password']) && !empty($data['old_password']) && $data['old_password'] !== "" && $data['old_password'] !== 'undefined') {
            //checking the old password first
            $check  = Auth::guard('web')->attempt([
                'email' => $user->email,
                'password' => $data['old_password']
            ]);
            if ($check && isset($data['new_password']) && !empty($data['new_password']) && $data['new_password'] !== "" && $data['new_password'] !== 'undefined') {
                $user->password = bcrypt($data['new_password']);
                // $user->token()->revoke();
                // $token = $user->createToken('newToken')->accessToken;
                $user->update();
                $message = 'Password Change.';
                $data = [];
                $code = 200;
                return Res($message, $data, $code);
            } else {
                $message = 'Invalid Password.';
                $data = [];
                $code = 401;
                return Res($message, $data, $code);
            }
        }
        $message = 'Invalid Password.';
        $data = [];
        $code = 401;
        return Res($message, $data, $code);
    }

    public function forgot_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message =  $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        } else {
            try {
                $response = Password::sendResetLink($request->only('email'));
                switch ($response) {
                    case Password::RESET_LINK_SENT:

                        $message =  trans($response);
                        $data = [];
                        $code = 200;
                        return Res($message, $data, $code);
                    case Password::INVALID_USER:
                        $message =  trans($response);
                        $data = [];
                        $code = 400;
                        return Res($message, $data, $code);
                }
            } catch (\Swift_TransportException $ex) {
                $message =  $ex->getMessage();
                $data = [];
                $code = 400;
                return Res($message, $data, $code);
            } catch (Exception $ex) {
                $message =  $ex->getMessage();
                $data = [];
                $code = 400;
                return Res($message, $data, $code);
            }
        }
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'token' => "required",
            'email' => "required",
            'password' => "required",
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $rest_tbl = PasswordReset::where('email', $data['email'])->first();
        if (empty($rest_tbl)) {
            $message = 'Invalid Token.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        } else {
            if (Hash::check($data['token'], $rest_tbl->token)) {
                $user = User::where('email', $data['email'])->first();
                $user->password = bcrypt($data['password']);
                $user->update();
                $token = $user->createToken('newToken')->accessToken;
                PasswordReset::where('email', $data['email'])->delete();
                $message = 'Password Reset Done.';
                $data = ['user' => $user, 'access_token' => $token];
                $code = 200;
                return Res($message, $data, $code);

            } else {
                PasswordReset::where('email', $data['email'])->delete();
                $message = 'Invalid Token.';
                $data = [];
                $code = 400;
                return Res($message, $data, $code);
            }
        }
    }

    public function changeProfile(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $input = $request->all();
        $rules = array(
            'email' => "required|email|unique:users,email," . $user->id,
            'phone' => "required|unique:users,phone," . $user->id,
            'name' => "required|max:55",
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array(), 400);
            return \Response::json($arr);
        }

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->update();

        return response(['message' => 'Profile Updated', 'user' => $user], 200);
    }

    public function LoginMobile(Request  $request)
    {
        // $user = User::find(Auth::guard('api')->user()->id);
        $input = $request->all();
        $rules = array(
            'phone' => "required",
            'appToken' => "required",
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array(), 400);
            return \Response::json($arr);
        }

        if($request->appToken == "bcryumtaska09123")
        {
            $user = User::where("phone",$request->phone)->get()->first();
            if(!empty($user))
            {
                $token = $user->createToken('newToken')->accessToken;
                $message = 'Login Done.';
                $data = ['user' => $user, 'access_token' => $token];
                $code = 200;
                return Res($message, $data, $code);
            }
            else
            {
                return Res("This No doesnot exsit in database.",[],200);
            }
        }
        else
        {
            return Res("Invalid Token.",[],200);
        }
    }

    public function changePassOtp(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'password' => "required",
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array(), 400);
            return \Response::json($arr);
        }

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->update();
        return Res("Password Reset.",[$user],200);
    }
}
