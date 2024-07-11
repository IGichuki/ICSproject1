<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobposting;

class jobpostingController extends Controller
{

   public function index()
   {
    $jobpostings = jobposting::get();
       return view('joblisting', compact('jobpostings'));
   }
   public function create()
   {
       return view('jobposting');
   }
   public function store(Request $request)
   {
     $request->validate([
         'job_title' => 'required',
         'job_description' => 'required',
         'job_location' => 'required',
         'job_type' => 'required',
         'job_category' => 'required',
         'experience' => 'required',
         'salary' => 'required',
         'company_name' => 'required',
         'company_description' => 'required',
         'company_website' => 'required',
         'how_to_apply' => 'required',
         'application_deadline' => 'required',
     ]);
        jobposting::create([
            'job_title' => $request->job_title, 
            'job_description' => $request->job_description,
            'job_location' => $request->job_location,
            'job_type' => $request->job_type,
            'job_category' => $request->job_category,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'company_website' => $request->company_website,
            'how_to_apply' => $request->how_to_apply,
            'application_deadline' => $request->application_deadline,
        ]);
        return redirect('jobposting')->with('status', 'Job posted successfully');
   }
   public function edit(int $id)
   {
       $jobposting = jobposting::findorFail($id);
       return view('edit', compact('jobposting'));
       return redirect('jobposting')->with('message', 'Job updated successfully');
   }
   public function delete(int $id)
   {
       $jobposting = joblisting::findorFail($id);
       $jobposting->delete();
       return redirect('joblisting')->back()->with('status', 'Job deleted successfully');
   }
}
