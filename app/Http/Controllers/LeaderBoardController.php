<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crewmate;

class LeaderBoardController extends Controller
{
    public function index()
    {   
        $data = [];
        $data['participants'] = Crewmate::orderBy('points', 'desc')->get();
        return view('leaderboard')->with('data', $data);
    }
}
