<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jobposting;
use App\Models\Application;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $jobCount = jobposting::count();
        $applicationCount = Application::count();
        $users = User::all();
        $jobs = jobposting::all();
        $applications = Application::with(['job', 'user'])->get();
        return view('admin.dashboard', compact('userCount', 'jobCount', 'applicationCount', 'users', 'jobs', 'applications'));
    }
}
