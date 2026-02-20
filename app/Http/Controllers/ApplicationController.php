employers have a separate company profile management page?
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\jobposting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationSubmitted;
use App\Notifications\ApplicationStatusUpdated;

class ApplicationController extends Controller
{
    // Show all applications for jobs posted by the current employer
    public function employerIndex()
    {
        $user = auth()->user();
        // Assuming company_name is unique per employer, or add employer_id to jobposting
        $jobs = jobposting::where('company_name', $user->name)->pluck('id');
        $applications = Application::whereIn('jobposting_id', $jobs)->with(['job', 'user'])->get();
        return view('applications', compact('applications'));
    }

    // Update application status (accept/reject)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);
        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();
        // Notify applicant
        $user = $application->user;
        $job = $application->job;
        if ($user && $job) {
            $user->notify(new ApplicationStatusUpdated($job->job_title, $application->status));
        }
        return redirect()->back()->with('status', 'Application status updated!');
    }

    public function create($jobposting_id)
    {
        $job = jobposting::findOrFail($jobposting_id);
        return view('application', compact('job'));
    }

    public function store(Request $request, $jobposting_id)
    {
        $request->validate([
            'cover_letter' => 'required',
            // 'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $application = new Application();
        $application->user_id = Auth::id();
        $application->jobposting_id = $jobposting_id;
        $application->cover_letter = $request->cover_letter;
        // Handle file upload if needed
        // if ($request->hasFile('resume')) {
        //     $path = $request->file('resume')->store('resumes', 'public');
        //     $application->resume_path = $path;
        // }
        $application->save();

        // Notify employer
        $job = jobposting::findOrFail($jobposting_id);
        $employer = User::where('name', $job->company_name)->first();
        if ($employer) {
            $employer->notify(new ApplicationSubmitted($job->job_title, Auth::user()->name));
        }

        return redirect()->back()->with('status', 'Application submitted successfully!');
    }
}
