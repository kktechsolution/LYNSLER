<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function manu_transactions()
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }

        $transactions = Transaction::with('user')->paginate(3);        ;
        return view('admin.manufacturer_trans', ['transactions' => $transactions]);

    }

    public function update(Request $request,$id)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }

        $validated = $request->validate([
            'payment_mode' => 'required',
        ]);

        $transactions = Transaction::find($id);

        $transactions->payment_mode = $request->payment_mode;
        $transactions->update();

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');


    }

    public function edit_profile()
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        return view('admin.edit_profile', ['user' => $user]);

    }

    public function update_profile(Request $request)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'nullable',
            'avatar' => 'nullable',


        ]);
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('avatar/', $filename);
            $validated['avatar'] =  $filename;
        }


        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->has('passwrod'))
        {
            $user->password = bcrypt($request->password);
        }
        $user->phone = $request->phone;

        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('avatar/', $filename);
            $user->avatar =  $filename;
        }

        $user->update();


        return redirect()->route('aprofile.edit')->with('success', 'Profile updated successfully.');
    }
}
