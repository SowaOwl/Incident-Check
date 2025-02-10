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


        $incident = new IncidentModel();
        $incident->type = $request->input('type');
        $incident->place = $request->input('place');
        $incident->name = $request->input('name');
        $incident->desc = $request->input('desc');
        $incident->shortDesc = $request->input('shortDesc');
        $incident->coordinates = $request->input('coord');
        $incident->date = $request->input('date');
        $incident->status = 'approved';
        $incident->Country = $request->input('country');
        $incident->save();

        if ($request->file != null){
            $path = $request->file('image')->store('uploads','public');
            $incident_photo = new PhotoModel();
            $incident_photo->incidentId = $incident->id;
            $incident_photo->path = $path;
            $incident_photo->save();
        }


        return redirect()->route('incidents');
    }
    public function add_incident(Request $request){
        $countries = ["Afghanistan","Angola","Albania","United Arab Emirates","Argentina","Armenia","Australia","Austria","Azerbaijan","Burundi","Belgium","Benin","Burkina Faso","Bangladesh","Bulgaria","Bosnia and Herzegovina","Belarus","Belize","Bolivia","Brazil","Brunei Darussalam","Bhutan","Botswana","Central African Republic","Canada","Switzerland","China","Ivory Coast","Cameroon","Democratic Republic of the Congo","Republic of the Congo","Colombia","Costa Rica","Cuba","Czech Republic","Germany","Djibouti","Denmark","Dominican Republic","Algeria","Ecuador","Egypt","Eritrea","Estonia","Ethiopia","Finland","Gabon","United Kingdom","Georgia","Ghana","Guinea","The Gambia","Guinea-Bissau","Equatorial Guinea","Greece","Greenland","Guatemala","Guyana","Honduras","Croatia","Haiti","Hungary","Indonesia","India","Ireland","Iran","Iraq","Iceland","Israel","Italy","Jamaica","Jordan","Japan","Kazakhstan","Kenya","Kyrgyzstan","Cambodia","Republic of Korea","Kuwait","Laos","Lebanon","Liberia","Libya","Sri Lanka","Lesotho","Lithuania","Luxembourg","Latvia","Morocco","Moldova","Madagascar","Mexico","Macedonia","Mali","Myanmar","Montenegro","Mongolia","Mozambique","Mauritania","Malawi","Malaysia","Namibia","Niger","Nigeria","Nicaragua","Norway","Nepal","Oman","Pakistan","Panama","Peru","Philippines","Papua New Guinea","Poland","North Korea","Paraguay","Palestine","Qatar","Romania","Rwanda","Western Sahara","Saudi Arabia","Sudan","South Sudan","Senegal","Sierra Leone","Salvador","Serbia","Suriname","Slovakia","Slovenia","Sweden","Swaziland","Syria","Chad","Togo","Thailand","Tajikistan","Turkmenistan","East Timor","Tunisia","Turkey","Taiwan","Tanzania","Uganda","Ukraine","Uruguay","Uzbekistan","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe","Somalia","Kosovo","South Africa","New Zealand","Chile","Netherlands","Portugal","Russia","Spain","France","USA","French Guiana","Aruba","Anguilla","American Samoa","Antigua and Barbuda","Bahrain","Bahamas","Saint Barthelemy","Bermuda","Barbados","Comoros","Cape Verde","Curacao","Cayman Islands","Cyprus","Dominica","Falkland Islands","Faeroe Islands","Federated States of Micronesia","Grenada","Guam","Saint Kitts and Nevis","Saint Lucia","Saint Martin","Maldives","Marshall Islands","Malta","Northern Mariana Islands","Montserrat","Mauritius","New Caledonia","Nauru","Palau","Puerto Rico","French Polynesia","Solomon Islands","Sao Tome and Principe","Sint Maarten","Seychelles","Turks and Caicos Islands","Tonga","Trinidad and Tobago","Tuvalu","Saint Vincent and the Grenadines","British Virgin Islands","United States Virgin Islands","Vanuatu","Samoa","Netherlands","Sint Eustatius","Saba","Martinique","Canary Islands","Mayotte","Reunion","Guadeloupe","Fiji"];
        return view('add_incident',['countries' => $countries]);
    }
    public function incidents(Request $request){
        $incidents = new IncidentModel();
        $incident_photo = new PhotoModel();
        $country = $request->country;
        return view('incidents', ['incidents' => $incidents->all(),
            'photos' => $incident_photo->all(),
            'country' => $country]);
    }
    public function incident(Request $request){
        $incidents = new IncidentModel();
        $incident_photo = new PhotoModel();
        return view('incident',['incidents' => $incidents->all(),'photos' => $incident_photo->all(), 'request_id' => $request->id]);
    }
}
