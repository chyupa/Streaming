<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\VideoCategoryRequest;
use App\VideoCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEditCategory( VideoCategory $category )
    {
        return view('admin.category.edit', compact('category'));
    }

    public function postEditCategory( VideoCategory $category, VideoCategoryRequest $request )
    {
        $category->update([
           "name" => $request->get('name')
        ]);

        return redirect()->route('admin.show.categories');
    }

    public function getAddCategory()
    {
        return view('admin.category.add');
    }

    public function postAddCategory( VideoCategoryRequest $request )
    {
        $videoCategory = new VideoCategory();
        $videoCategory->name = $request->get('name');
        $videoCategory->slug = $videoCategory->makeSlugFromName( $request->get('name') );
        $videoCategory->save();

        return redirect()->route("admin.show.categories");
    }
}
