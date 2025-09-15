<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $data['cat'] = Cat::findOrFail($id);
        $data['allCats'] = Cat::select('id','name')->get();
        $data['skills']= $data['cat']->skills()->paginate(6);
        return view("web.cats.show")->with($data);
    }
}
