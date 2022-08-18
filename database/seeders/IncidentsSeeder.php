<?php

namespace Database\Seeders;

use App\Models\IncidentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentModel::factory()->create([
            'type' => "Град",
            'place' => "Китай,Пекин",
            'name' => "Огромный град в Пекине",
            'desc' => "Большие капли града в Пекине Повредили множество машин и городскую структуру",
            'shortDesc' => "Огромный град в Пекине",
            'coordinates' => "39.704264, 117.510740",
            'date' => date("d.m.Y",strtotime("12.12.2022")),
            'status' => "approved",
            'Country' => "China",
        ]);
//        IncidentModel::factory()->create([
//            'type' => "",
//            'place' => "",
//            'name' => "",
//            'desc' => "",
//            'shortDesc' => "",
//            'coordinates' => "39.704264, 117.510740",
//            'date' => date("d.m.Y",strtotime("12.12.2022")),
//            'status' => "approved",
//            'Country' => "China",
//        ]);
    }
}
