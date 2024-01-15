<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];

        if (Auth::user()->type == 'master_admin') {
            $total_users  = User::all()->count();
            $total_emloyeees  = User::where('type', 'employee')->count();
            $total_admins  = User::where('type', 'admin')->count();
            $total_clients  = User::where('type', 'user')->count();
            $total_active_bookings  = Booking::where('is_compeleted', false)->count();
            $total_compeleted_bookings  = Booking::where('is_compeleted', true)->count();

            exit();
            $data = [
                'total_users' => $total_users,
                'total_emloyeees' => $total_emloyeees,
                'total_admins' => $total_admins,
                'total_clients' => $total_clients,
                'total_active_bookings' => $total_active_bookings,
                'total_compeleted_bookings' => $total_compeleted_bookings,
            ];
        } elseif (Auth::user()->type == 'admin') {
            $total_emloyeees  = User::where('user_id', Auth::user()->id)->count();
            $total_active_bookings  = Booking::where('user_id', Auth::user()->id)->where('is_compeleted', false)->count();
            $total_compeleted_bookings  = Booking::where('user_id', Auth::user()->id)->where('is_compeleted', true)->count();

            $data = [
                'total_emloyeees' => $total_emloyeees,
                'total_active_bookings' => $total_active_bookings,
                'total_compeleted_bookings' => $total_compeleted_bookings,
            ];
        } elseif (Auth::user()->type == 'employee') {
            $total_active_bookings  = BookingDetails::where('user_id', Auth::user()->id)->where('is_compeleted', false)->count();
            $total_compeleted_bookings  = BookingDetails::where('user_id', Auth::user()->id)->where('is_compeleted', true)->count();

            $data = [
                'total_active_bookings' => $total_active_bookings,
                'total_compeleted_bookings' => $total_compeleted_bookings,
            ];
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized Attempt.');
        }
        return view('admin.dashboard', compact('data'));
    }
}
