<x-layouts.mentor>
    <div class="container mt-2">
        <section class="my-4 d-flex align-item-center gap-3">

            <div style="width: 70px; max-width: 70px; min-height: 70px; height: 70px;">
                @if (Auth::user()->display_image && Auth::user()->display_image->image_path)
                    <img src="{{ asset('storage/' . Auth::user()->display_image->image_path) }}" alt="..."
                        class="border d-block img-fluid h-100 w-100 rounded-5 object-fit-cover border-3 border-warning">
                @elseif (Auth::user()->social_handle && Auth::user()->social_handle->image_path)
                    <img src="{{ Auth::user()->social_handle->image_path }}" alt="..."
                        class="border d-block img-fluid h-100 w-100 rounded-5 object-fit-cover border-3 border-warning">
                @else
                    <img src="{{ asset('images/default-dp.png') }}" alt="..."
                        class="border d-block img-fluid w-100 rounded-5 object-fit-cover border-3 border-warning">
                @endif
            </div>
            <section class="lh-sm">
                <p class="m-0 text-red fw-bold">
                    Mentor
                </p>
                <h2 class="fw-bold fs-2 m-0">
                    My Profile
                </h2>
                <p class="m-0">
                    {{ ucfirst(strtolower(Auth::user()->first_name)) }}
                    {{ ucfirst(strtolower(Auth::user()->last_name)) }}
                </p>
            </section>

        </section>

        <section>
            {{ $slot }}
        </section>
        <hr class="my-5 opacity-0">
    </div>
</x-layouts.mentor>
