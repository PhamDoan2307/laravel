<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupProductRequest;
use App\Models\GroupProduct;
use App\Repositories\GroupProduct\GroupProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GroupProduct\GroupProductRepository;
use Illuminate\Support\Facades\Input;

class GroupProductController extends Controller
{
    //
     var $path = 'resources/upload/';
    protected $groupProductRepository;

    public function __construct(GroupProductRepositoryInterface $groupProductRepository)
    {
        $this->groupProductRepository = $groupProductRepository;
    }

    public function getList()
    {
        $path=$this->path;
        $data = $this->groupProductRepository->getAll();
        return view('admin.module.groupproduct.list', compact('data','path'));
    }

    public function getAdd()
    {
        $data=$this->groupProductRepository->getCompany();
        return view('admin.module.groupproduct.add',compact('data'));
    }

    public function postAdd(GroupProductRequest $request)
    {
//        Lấy dữ liệu đẩy vào array trong bảng group
        $input = $request->only('name', 'describe','status');
        $input['company_id']=$request->company;
        $input['image'] = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('resources/upload', $input['image']);
        $input['admin_id']='1';
        $this->groupProductRepository->create($input);
        return redirect()->route('admin.groupproduct.getList')->with(['success' => 'Thêm mới thành công']);

    }

    public function getEdit($id)
    {
        $company=$this->groupProductRepository->getCompany();
        $data = $this->groupProductRepository->getById($id);
        $path=$this->path;
        return view('admin.module.groupproduct.edit', compact('data', 'path','company'));
    }

    public function postEdit(Request $request, $id)
    {
        $input = $request->only('name', 'describe', 'status');
        $input['company_id']=$request->company;
        if($request->file('image1')!=null) {
            $input['image'] = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->move('resources/upload', $input['image']);
        }
        $input['admin_id'] = '1';
        $this->groupProductRepository->update($id,$input);
        return redirect()->route('admin.groupproduct.getList')->with(['success' => 'Sửa thành công']);
    }
}
