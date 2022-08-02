<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;

class Test1Controller extends Controller
{
    public function __construct()
    {
        $this->v=[];
    }

    public function index() {
        $objSinhVien = new SinhVien();
        $this->v['title'] = 'Người Dùng';
        $this->v['list'] = $objSinhVien->loadListWithPager();
//        dd($this->v['list']);
        return view("user.index", $this->v);
    }

    public function add(UserRequest $request){
        $this->v['title'] = "Thêm Sinh Viên";
        $method_route = 'route_Backend_Sinhvien_Add';
        if($request->isMethod('post')){
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            if($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
            {
                $params['cols']['anh'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }

            $modelsSinhvien = new SinhVien();
            $res = $modelsSinhvien->saveNew($params);
            if($res == null) {
                return redirect()->route($method_route);
            } else if ($res > 0) {
                Session::flash('success', "Thêm Mới Thành Công !");
                return redirect('/sinhvien');
            } else {
                Session::flash('error', "Lỗi Thêm Mới Không Thành Công !");
                return redirect()->route($method_route);
            }
        }
        return view("user.add", $this->v);
    }

    public function detail($id){
        $this->v['title'] = 'Chi tiết người dùng';
        $tests = new SinhVien();
        $objItem = $tests->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('user.detail', $this->v);
    }

    public function update($id, Request $request){
        $method_route = "route_BackEnd_Students_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $test1 = new SinhVien();
        $objItem = $test1->loadOne($id);
        $params['cols']['id'] = $id;

        // if(!is_null($params['cols']['password'])){
        //     $params['cols']['password'] = Hash::make($params['cols']['password']);
        // }

        $res = $test1->saveUpdate($params);
        if($res == null){
            return redirect()->route($method_route, ['id' => $id]);
        } elseif($res == 1){
            Session::flash('success', 'Update bản ghỉ ' . $objItem->id. ' thành công');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật bản ghi');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('cmnd', $fileName, 'public');
    }
}
