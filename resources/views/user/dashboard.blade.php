<x-layouts.user>
    <section class="mt-4">
        <p class="text-dark fw-bold mb-2">
            {{-- <h2 class="fs-4 fw-bold text-secondary">
            <i class="bi bi-house-fill text-theme"></i> Dashboard
        </h2> --}}
        <section class="mb-4">
            <p class="m-0">Welcome To OwenaHub,</p>
            <h2 class="fw-bold fs-2">
                {{ ucfirst(strtolower(Auth::user()->first_name)) }}
                {{ ucfirst(strtolower(Auth::user()->last_name)) }}
            </h2>
        </section>
        </p>

        {{-- <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
            <div class="col">
                <div class="card py-4 px-3 h-100 border-none shadow-sm">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-5 p-3 bg-theme">
                            <i class="bi bi-box fs-5 text-white"></i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold fs-4">
                                <b class="text-red">3</b> slices
                            </p>
                            <h3 class="fs-tiny text-secondary m-0">Completed Bites</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card py-4 px-3 h-100 border-none shadow-sm">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-5 p-3 bg-theme">
                            <i class="bi bi-box fs-5 text-white"></i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold fs-4">
                                <b class="text-red">3</b> slices
                            </p>
                            <h3 class="fs-tiny text-secondary m-0">Completed Bites</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
    </section>



    <section>
        <div class="p-3 bg-white shadow-sm border rounded">
            <h3 class="fw-bold fs-4 text-secondary">Your slices</h3>

            <hr class="mb-4">

            @forelse ($enrolled_slices as $enrolled)
                <div class="accordion accordion-flush mb-1 border-1 border rounded-2 position-relative"
                    id="accordionFlushExample">
                    {{-- Badge --}}
                    @php
                        $data = $enrolled->created_at;
                        $datetime = \Carbon\Carbon::parse($data);
                        $now = \Carbon\Carbon::now();

                        $minutes = $datetime->diffInMinutes($now);

                        if ($minutes < 1440) {
                            $created_now = true;
                        } else {
                            $created_now = false;
                        }
                    @endphp

                    {{-- Badge Start --}}
                    @if ($created_now == true)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-red z-3">
                            New
                            <span class="visually-hidden">new item</span>
                        </span>
                    @endif
                    {{-- Badge End --}}

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-body-secondary " type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $enrolled->slice->id }}"
                                aria-expanded="false" aria-controls="flush-collapse{{ $enrolled->slice->id }}">
                                <span class="fw-semibold">
                                    <i class="bi bi-box-fill text-red"></i> {{ $enrolled->slice->title }}
                                </span>

                                <div class="d-md-block d-none">
                                    <livewire:user.slice-progress :slice="$enrolled" />
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $enrolled->slice->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="p-3">
                                @forelse ($enrolled->slice->bite->sortBy('position') as $bite)
                                    <div class="p-3 border d-flex align-items-center mb-2 rounded shadow-sm">
                                        <div class="text-theme">
                                            <livewire:user.checked-badge :bite="$bite->id" />
                                        </div>
                                        <div>
                                            <a href="{{ route('user.slice.show', ['slice' => $enrolled->slice->id, 'bite' => $loop->iteration]) }}"
                                                class="text-decoration-none text-dark">
                                                Bite {{ $bite->position }} - {{ $bite->title }}
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <p class="p-1 m-0 text-secondary fs-tiny">
                                        Hungry? <br>
                                        Nothing to bite for now 😣
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <p class="text-secondary">
                        You are not having any slices right now 😩
                    </p>
                </div>
            @endforelse

            <div class="mt-2">
                <a href="{{ route('guest.slices.index') }}"
                    class="btn btn-theme border-0 rounded-1 shadow-sm fw-semibold mt-1 cta-animation" target="_blank">
                    <i class="bi bi-plus-circle"></i> Have a Slice
                </a>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="p-3 bg-white shadow-sm border rounded">
            <h3 class="fw-bold fs-4 text-secondary">Sessions</h3>
            <div>
                <p class="text-secondary">
                    Sessions are unavailable at the moment.
                </p>
            </div>
            <div class="mt-2">
                <button href="{{ route('guest.slices.index') }}" disabled
                    class="btn btn-theme border-0 rounded-1 shadow-sm fw-semibold mt-1" target="_blank">
                    <i class="bi bi-plus-circle"></i> Create a session
                </button>
            </div>
        </div>
    </section>

    <section class="mt-4 mb-5">
        <div class="bg-white shadow-sm border rounded p-3">
            <h3 class="fw-bold fs-4 text-secondary">Recommended for you</h3>
            <livewire:recommended-articles />
        </div>
    </section>
</x-layouts.user>
