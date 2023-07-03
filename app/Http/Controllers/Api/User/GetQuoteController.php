<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ContactUsData;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GetQuoteController extends Controller
{
    public function sendEmail(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'email' => 'email|required',
            'phone' => 'required',
            'content' => 'required'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $contactUsData = ContactUsData::create($input);

        $data = [
          'name' => $input['name'],
          'email' => $input['email'],
          'to_mail' => env('ADMIN_MAIL'),
          'content' => $input['content'],
          'phone' => $input['phone'],
          'subject' => 'User Query.'
        ];

        Mail::send('email.contact-email', $data, function($message) use ($data) {
          $message->to($data['to_mail'])
          ->subject($data['subject']);
        });

        return Res('Email successfully sent!',[],200);
    }

    public function subscribe_newsletter(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => 'email|required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $newsletter_check = Newsletter::where('email',$request->email)->get()->first();

        if(!empty($newsletter_check))
        {
            return Res('Subscribed Already!',[],200);

        }
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        return Res('Subscribe Successfully!',[],200);

    }
}
