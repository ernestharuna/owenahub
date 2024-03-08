<x-mentor.profile-layout>
    <div class="mt-5">
        <a href="{{ route('mentor.profile.index') }}"
            class="btn btn-sm btn-theme rounded-4 px-3 fw-semibold text-decoration-none">
            <i class="bi bi-arrow-left me-2"></i> Previous
        </a>
    </div>

    <div class="mt-3 bg-white rounded-4 shadow-sm p-2 col-12 col-md-6 mb-4">
        <p class="fw-semibold">
            Your availability calender
        </p>
        <livewire:calender />
    </div>

    <div class="mt-3 rounded-4">
        <livewire:mentor.profile.manage-availability />
    </div>

    <div class="mt-3 bg-white rounded-4 shadow-sm p-2 col-12 col-md-6 mb-4">
        {{-- TODO create component --}}
    </div>

</x-mentor.profile-layout>
