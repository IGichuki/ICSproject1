@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text display-4">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jobs</h5>
                    <p class="card-text display-4">{{ $jobCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Applications</h5>
                    <p class="card-text display-4">{{ $applicationCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <h3>Users</h3>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr></thead>
        <tbody>
        @foreach($users as $user)
            <tr><td>{{ $user->id }}</td><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->role }}</td></tr>
        @endforeach
        </tbody>
    </table>
    <h3>Jobs</h3>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Title</th><th>Company</th><th>Location</th></tr></thead>
        <tbody>
        @foreach($jobs as $job)
            <tr><td>{{ $job->id }}</td><td>{{ $job->job_title }}</td><td>{{ $job->company_name }}</td><td>{{ $job->job_location }}</td></tr>
        @endforeach
        </tbody>
    </table>
    <h3>Applications</h3>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Job</th><th>Applicant</th><th>Status</th></tr></thead>
        <tbody>
        @foreach($applications as $app)
            <tr><td>{{ $app->id }}</td><td>{{ $app->job->job_title ?? '' }}</td><td>{{ $app->user->name ?? '' }}</td><td>{{ $app->status }}</td></tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
