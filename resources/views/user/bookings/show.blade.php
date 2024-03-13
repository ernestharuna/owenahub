<x-layouts.user>
    <div>
        <div class="my-5 p-3 bg-white shadow-sm rounded-4 border">
            <x-status :status="$booking->status" />
            <h1 class="fw-bold">
                Session with
                <a href="{{ route('user.mentor.show', $booking->session->mentor->id) }}"
                    class="text-secondary">{{ $booking->session->mentor->first_name }}</a>
                <br>
                <small class="fs-6 fw-normal text-secondary">
                    <span class="fw-semibold text-dark">Topic:</span> {{ $booking->topic }}
                </small>
            </h1>

            <div class="mt-3">
                @php
                    $day;
                    switch ($booking->session->week_day) {
                        case 1:
                            $day = 'Sunday';
                            break;
                        case 2:
                            $day = 'Monday';
                            break;
                        case 3:
                            $day = 'Tuesday';
                            break;
                        case 4:
                            $day = 'Wednesday';
                            break;
                        case 5:
                            $day = 'Thursday';
                            break;
                        case 6:
                            $day = 'Friday';
                            break;
                        case 7:
                            $day = 'Saturday';
                            break;
                        default:
                            $day = 'Someday';
                    }
                @endphp
                <div class="fw-semibold">
                    <div class="d-inline-block me-2">
                        <i class="bi bi-calendar3-week"></i>
                        {{ $day }}
                    </div>

                    <div class="d-inline-block me-2">
                        <i class="bi bi-clock"></i>
                        {{ $booking->session->start_time }} — {{ $booking->session->end_time }}
                    </div>
                </div>
                <hr>
                <div>
                    @forelse ($booking->booking_info as $info)
                        <div class="mb-2">
                            <span class="fs-tiny d-block fw-bold text-red">
                                @if ($info->user_id)
                                    Me
                                @endif
                                @if ($info->mentor_id)
                                    <span class="fs-tiny d-block fw-bold text-theme">
                                        {{ $info->booking->session->mentor->first_name }} <span
                                            class="fw-normal text-dark">(mentor)</span>
                                    </span>
                                @endif
                            </span>
                            <div class="p-2 rounded d-inline-block bg-light bg-body-secondary border">
                                {!! nl2br($info->content) !!}
                            </div>
                        </div>
                    @empty
                        <p class="text-secondary fw-semibold">
                            No messages here yet
                        </p>
                    @endforelse

                    @if ($booking->status === 'cancelled')
                        <p class="mt-3 text-danger">
                            This meeting has been cancelled!
                        </p>
                    @elseif($booking->status === 'completed')
                        <p class="mt-3 text-success bg-light-green d-inline-block fw-semibold rounded-3 p-2">
                            Mentor considers this session completed! 😎🎉
                        </p>
                    @else
                        <form action="{{ route('user.session.create-booking-info') }}" class="col-12 col-md-6 mt-4"
                            method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <textarea name="content" id="content" cols="30" rows="10" placeholder="Message"
                                class="form-control mb-3 fw-semibold" required></textarea>
                            <button class="btn btn-theme rounded-4 px-4 py-1 fw-semibold">
                                Send <i class="bi bi-send ms-2"></i>
                            </button>
                        </form>
                    @endif


                </div>
            </div>
        </div>

        @include('partials.__join-community')
    </div>

    <hr class="opacity-0 my-5">

</x-layouts.user>
