<?php

namespace App\Http\Controllers;

use App\Models\IncidentModel;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function incident_check(Request $request){
        $valid = $request->validate([
            'type'=> 'required',
            'place'=> 'required',
            'name'=> 'required',
            'coord'=> 'required',
            'date'=> 'required'
        ]);
        $incident = new IncidentModel();
        $incident->type = $request->input('type');
        $incident->place = $request->input('place');
        $incident->name = $request->input('name');
        $incident->desc = $request->input('desc');
        $incident->shortDesc = $request->input('shortDesc');
        $incident->coordinates = $request->input('coord');
        $incident->date = $request->input('date');

        $incident->save();
        return redirect()->route('incidents');
    }
    public function add_incident(Request $request){
        return view('add_incident');
    }
    public function incidents(Request $request){
        $incidents = new IncidentModel();
        return view('incidents', ['incidents' => $incidents->all()]);
    }
}
