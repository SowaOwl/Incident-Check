<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class RequestController extends Controller
{
    public function request_approved(Request $request){
        DB::table('request_models')->where('id','=',$request->id)->update(['status'=>'approved']);
        DB::table('model_has_roles')->where('model_id', '=',$request->userId)->update(['role_id'=>'3']);
        return redirect()->route('moderator_list');
    }
    public function request_reject(Request $request){
        DB::table('request_models')->where('id','=',$request->id)->update(['status'=>'rejected']);
        return redirect()->route('moderator_list');
    }
    public function moderator_list(Request $request){
        $requests = new RequestModel();
        return view('moderator_list',['requests_list' => $requests->all()]);
    }
    public function request_check(Request $request){
        $valid = $request->validate([
            'name'=>'required',
            'secondName'=>'required',
            'place'=>'required',
            'desc'=>'required',
        ]);

        $new_request = new RequestModel();
        $new_request->name = $request->input('name');
        $new_request->secondName = $request->input('secondName');
        $new_request->place = $request->input('place');
        $new_request->desc = $request->input('desc');
        $new_request->status = 'under review';
        $new_request->userId = Auth::user()->id;
        $new_request->save();

        return redirect()->route('main');
    }
    public function add_request(Request $request){
        return view('add_request');
    }
}
