<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sinh_vien')->insert($this->studentSeeder());
    }

    public function studentSeeder(){
        $arrStu = [];

        $arrKhoa = ['cntt', 'mkt', 'ksdl'];

        for ($i=0; $i < 100; $i++) { 
            $a = rand(0,2);
            $arrStu[] = [
                'tensv' => 'Nguyễn văn ' . $i,
                'anh' => '',
                'khoa' => $arrKhoa[$a],
                'tuoi' => $i
            ];
        }
        return $arrStu;
    }
}
