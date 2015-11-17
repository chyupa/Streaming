<?php

namespace App\Http\Controllers\Dashboard;

use App\Role;
use App\User;
use App\VideoCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDashboard()
    {
        return view('admin.dashboard');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUsers()
    {
        $role = Role::find(2);
        $users = User::where('role_id', $role->_id)->paginate(20);
        return view('admin.user.all', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStudios()
    {
        $role = Role::find(3);
        $studios = User::where('role_id', $role->_id)->paginate(20);
        return view('admin.studio.all', compact('studios'));
    }

    public function showCategories()
    {
        $categories = VideoCategory::paginate(20);
        return view('admin.category.all', compact('categories'));
    }
}
