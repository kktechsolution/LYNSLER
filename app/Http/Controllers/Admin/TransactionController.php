<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
}
