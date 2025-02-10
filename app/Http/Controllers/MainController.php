<?php

namespace App\Http\Controllers;

use App\Models\IncidentModel;
use Illuminate\Http\Request;

class incident_in_this_day{
    public $name;
    public $count;

    public function __construct($name, $count){
        $this->name = $name;
        $this->count = $count;
    }
}

class svg_coord{
    public $name;
    public $coord;

    public function __construct($name, $coord){
        $this->name = $name;
        $this->coord = $coord;
    }
}

class MainController extends Controller
{
    public function main(){
        $incidents = new IncidentModel();
        $obj_arr = [];
        $fd = fopen(asset('world.txt'),'r');
        $re = [];
        while(!feof($fd)){
            array_push($re, htmlentities(fgets($fd)));
        }
        fclose($fd);
        foreach ($re as $item){
            $items = explode(";", $item);
            $svg = new svg_coord($items[0],$items[1]);
            array_push($obj_arr, $svg);
        }
        return view('main',['svg_coords'=>$obj_arr, 'incidents'=>$incidents->all()]);
    }
}
