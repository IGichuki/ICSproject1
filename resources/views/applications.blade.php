@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Applications for Your Job Postings</h2>
    @if($applications->isEmpty())
        <p>No applications found for your job postings.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Applicant</th>
                    <th>Cover Letter</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->job->job_title }}</td>
                        <td>{{ $application->user->name ?? 'N/A' }}</td>
                        <td>{{ $application->cover_letter }}</td>
                        <td>{{ $application->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('application.updateStatus', $application->id) }}">
                                @csrf
                                <select name="status">
                                    <option value="pending" @if($application->status=='pending') selected @endif>Pending</option>
                                    <option value="accepted" @if($application->status=='accepted') selected @endif>Accept</option>
                                    <option value="rejected" @if($application->status=='rejected') selected @endif>Reject</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
