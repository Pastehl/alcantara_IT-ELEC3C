<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Suppport\Facades\Redirect;
class DashBoardController extends Controller
{
        public function viewCategory(){
        $categories = Category::all();
        return view("Admin.category.category",compact("categories"));
    }
    public function createCategoryPage(){
        return view("admin.category.addCategory");
    }
    public function addCategory(Request $request){
        $data['user_id'] = auth()->user()->id;
        $data['category_name'] = $request->input('category');
    }
}
