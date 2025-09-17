<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data['cats'] = Cat::paginate(10);
        return view('admin.cats.index')->with($data);
    }
}
