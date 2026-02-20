<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('company-profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'company_profile' => 'required|string',
        ]);
        $user->company_profile = $request->company_profile;
        $user->save();
        return redirect()->back()->with('status', 'Company profile updated successfully!');
    }
}
