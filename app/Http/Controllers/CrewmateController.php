<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crewmate;

class CrewmateController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['points'] = 0;
        Crewmate::validate($data)->validate();
        Crewmate::create($data);
        return back();
    }
}
