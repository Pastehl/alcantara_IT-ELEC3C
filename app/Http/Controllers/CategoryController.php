<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function viewCategory(){
        $categories = Category::all();
        $trashes = Category::onlyTrashed()->get();

        return view("admin.category.category",compact("categories","trashes"));
    }
    public function createCategoryPage(){
        return view("admin.category.addCategory");
    }
    public function editCategoryPage($categoryId){
        $category = Category::find($categoryId);

        return view("admin.category.editCategory", compact('category'));
    }
    public function deleteCategoryPage(){
        return view("admin.category.deleteCategory");
    }
    public function addCategory(Request $request){
        $data['user_id'] = auth()->user()->id;
        $data['category_name'] = $request->input('category_name');
        

        $insert = Category::create($data);

        return redirect()->route('AllCat');

    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => auth()->user()->id
        ]);




        return redirect()->route('AllCat')->with('success', 'Category updated successfully');
    }
    public function RemoveCat($id){
        $remove = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Removed Successfully');
    }

    public function RestoreCat($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored Successfully');
    }

    public function DeleteCat($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Deleted Successfully');
    }

}