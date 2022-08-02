<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['*'];

    public function loadList($param = []) {
        $query = DB::table($this->table)
        ->select($this->fillable)
        ->where('id', '>', 2)
        ->orwhere('dia_chi', '=', '2');
        return $query->get();
    }
}
