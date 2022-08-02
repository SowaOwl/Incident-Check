<?php

namespace App\Http\Controllers;

use App\Models\IncidentModel;
use App\Models\PhotoModel;
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

        $path = $request->file('image')->store('uploads','public');

        $incident_photo = new PhotoModel();
        $incident = new IncidentModel();
        $incident->type = $request->input('type');
        $incident->place = $request->input('place');
        $incident->name = $request->input('name');
        $incident->desc = $request->input('desc');
        $incident->shortDesc = $request->input('shortDesc');
        $incident->coordinates = $request->input('coord');
        $incident->date = $request->input('date');
        $incident->save();

        $incident_photo->incidentId = $incident->id;
        $incident_photo->path = $path;
        $incident_photo->save();
        return redirect()->route('incidents');
    }
    public function add_incident(Request $request){
        return view('add_incident');
    }
    public function incidents(Request $request){
        $incidents = new IncidentModel();
        $incident_photo = new PhotoModel();
        return view('incidents', ['incidents' => $incidents->all()], ['photos' => $incident_photo->all()]);
    }
}
