<x-layouts.app>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="card border-0 my-5">
                        <div class="card-body text-start">
                            <h2 class="fw-bold">
                                Verify Your Email Address
                            </h2>
                            <div class="fs-tiny">
                                <p class="m-0">
                                    A verification email has been sent to <b>{{ Auth::user()->email }}</b>.
                                </p>
                                <p class="text-danger fw-semibold">
                                    Verification email might take up to 5 minutes.
                                </p>
                            </div>

                            <div class="my-4">
                                <a href="mailto:" class="btn btn-theme rounded-3 text-dark fw-semibold shadow-sm">
                                    Open Email
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('resend').submit();"
                                    class="btn btn-dark rounded-3 text-white fw-semibold shadow-sm ms-2">
                                    Resend Email
                                </a>
                            </div>

                            <hr>

                            <div class="fs-tiny text-start">
                                Questions? email us at <a href="mailto:hello@owenahub.com">hello@owenahub.com</a>
                            </div>

                            <form action="{{ route('verification.send') }}" class="d-none" method="POST"
                                id="resend">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
