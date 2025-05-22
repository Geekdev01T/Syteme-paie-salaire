<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function dashboard()
    {
        //Title of the page
        $title = 'Dashboard';

        // Total number of departments
        // Assuming you have a Department model and it is already imported

        $TotalDepartments = Departement::all()->count();

        // Total number of departments
        // Assuming you have a Department model and it is already imported
        $TotalEmployes = Employer::all()->count();

        // Total number of departments
        // Assuming you have a Department model and it is already imported
        $TotalAdmins = User::all()->count();

        return view(
            'dashboard',
            compact('title','TotalDepartments', 'TotalEmployes', 'TotalAdmins')
        );
    }
}
