<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Hall;

class HallController extends Controller
{

    public function index()
    {
        return view('hall.index');
    }

    public function show($id)
    {
        $hall = Hall::findOrFail($id);
        $data = [];
        $data['name'] = strtoupper($hall->getName());
        $data['hall'] = $hall->getId();
        $data['matches'] = $hall->getMatches();
        $data['crew'] = $hall->crew()->get();
        return view('hall.show')->with('data', $data);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        validator($data)->validate();
        $hall = Hall::findOrFail($data['hall_id']);

        if ($data['password'] == $hall->getPassword()) {
            $password = $data['password'];
            $request->session()->put('password', $password);
        }
        $password = $request->session()->get("password");
        if ($password == $hall->getPassword()) {

            $data['crew'] = $hall->crew()->get();

            $crewmateBonus = 0;
            if ($data['wintype'] == 2) {
                $crewmateBonus = (int)(sizeof($data['crew'])/2);
            }
            $crewmatePoints = $data['remainingcrewmates'] + $crewmateBonus;

            $impostorPoints = ($data['wintype'] == 3) ?
                sizeof($data['crew']) : (sizeof($data['crew']) - $data['remainingcrewmates']);

            foreach ($data['crew'] as $crewmate) {
                $id = $crewmate->getId();
                if ($id == $data['impostor1'] or $id == $data['impostor2']) {
                    $crewmate->setPoints($impostorPoints);
                } else {
                    $crewmate->setPoints($crewmatePoints);
                }
                $crewmate->save();
            }
            $hall->addMatch();
            $hall->save();
        }
        return back();
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'remainingcrewmates' => ['required', 'string', 'max:255'],
            'impostor1'          => ['required', 'string', 'max:255'],
            'impostor2'          => ['required', 'string', 'max:255'],
            'wintype'            => ['required', 'string', 'max:255'],
            'hall_id'            => ['required', 'numeric', 'max:255'],
        ]);
    }
}
