@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Company Profile</h2>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('company-profile.update') }}">
        @csrf
        <div class="mb-3">
            <label for="company_profile" class="form-label">Company Profile</label>
            <textarea name="company_profile" id="company_profile" class="form-control" rows="8" required>{{ old('company_profile', $user->company_profile) }}</textarea>
            @error('company_profile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
