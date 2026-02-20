<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apply for: ') }} {{ $job->job_title ?? '' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('status'))
                    <div class="mb-4 font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('application.store', $job->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Cover Letter</label>
                        <textarea name="cover_letter" class="w-full border rounded p-2" rows="5" required>{{ old('cover_letter') }}</textarea>
                        @error('cover_letter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Uncomment to enable resume upload
                    <div class="mb-4">
                        <label class="block text-gray-700">Resume (PDF, DOC, DOCX)</label>
                        <input type="file" name="resume" class="w-full border rounded p-2">
                        @error('resume')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    -->
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>