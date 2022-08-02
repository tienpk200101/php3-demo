<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinh_vien';
    protected $fillable = ['id','tuoi', 'anh','khoa','tensv'];

    // public function loadList($params = []) {
    //     $query = DB::table($this->table)
    //     ->select($this->fillable)
    //     ->where('tuoi', '>', 22)
    //     ->where('khoa', '=', 'CNTT');
    //     return $query->get();
    // }

    public function loadListWithPager($params = []) {
        $query = DB::table($this->table)
        ->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }

    public function saveNew($params){
        $data = array_merge($params['cols']);

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id, $param = null){
        $query = DB::table($this->table)
            ->where('id', '=' ,$id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params) {
        if(empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }
        $dataUpdate = [];
        foreach($params['cols'] as $colName => $val){
            if($colName == 'id') continue;

            if(in_array($colName, $this->fillable)){
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }

        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }
}
