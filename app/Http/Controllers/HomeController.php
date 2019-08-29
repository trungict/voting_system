<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('home');
        }

        $positions = Position::all();
        $candidates = $request->position_id ? Candidate::where('position_id', $request->position_id)->get() : collect();
        return view('candidate.poll', compact('positions', 'request', 'candidates'));
    }

    public function profile()
    {
        return view('user.profile');
    }
}
