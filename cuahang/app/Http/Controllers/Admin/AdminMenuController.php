<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminMenu\AdminMenuRepositoryInterface;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    protected $adminMenuRepository;
    protected $route='admin.menu.getList';
    protected $path='admin.module.menu.';
    public function __construct(AdminMenuRepositoryInterface $adminMenuRepositoryInterFace)
    {
        $this->adminMenuRepository = $adminMenuRepositoryInterFace;
    }

    public function getList()
    {

    }

    public function getAdd()
    {
        return view($this->path.'add');
    }
}
