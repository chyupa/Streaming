<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\RelatedCategoriesRequest;
use App\Http\Requests\VideoCategoryRequest;
use App\VideoCategory;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function getRelatedCategories( VideoCategory $category )
    {
        $categories = VideoCategory::all()->except($category->_id);
        return view('admin.category.related', compact('category', 'categories'));
    }

    public function postRelatedCategories( VideoCategory $category, RelatedCategoriesRequest $request )
    {
        foreach( $request->get('related') as $categ )
        {
            if( $categ == 0 )
                continue;
            $category->addRelated( $categ );
        }

        return redirect()->route('admin.show.categories');
    }
}
