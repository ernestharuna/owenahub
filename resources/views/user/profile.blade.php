<x-layouts.user>
    <div class="bg-f2">
        <section class="bg-white py-3 shadow-sm">
            <div class="container">
                <h2 class="fs-4">Profile</h2>
            </div>
        </section>

        <section class="w-32 container pt-5 pb-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <p class="fw-bold m-0">Profile Information</p>
                    <p>Your account's profile information and email address</p>
                </div>

                <div class="bg-white rounded p-4 col-12 col-lg-6 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">First name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John"
                            value="{{ Auth::user()->first_name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">Last name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Doe"
                            value="{{ Auth::user()->last_name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" value="{{ Auth::user()->email }}" disabled>
                    </div>

                    <button class="btn btn-dark rounded-1 px-4 fs-tiny fw-bold" disabled>
                        SAVE
                    </button>
                </div>
            </div>
        </section>

        <div class="container">
            <hr>
        </div>

        <section class="w-32 container pb-5 pt-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <p class="fw-bold m-0">Contact Information</p>
                    <p>
                        Your account's contact information
                    </p>
                </div>

                <div class="bg-white rounded p-4 col-12 col-lg-6 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">Facebook</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="https://facebook.com/..." disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">X (twitter)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="https://x.com.com/..." disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold m-0">Instagram </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="https://instagram.com/..." disabled>
                    </div>

                    <button class="btn btn-dark rounded-1 px-4 fs-tiny fw-bold" disabled>
                        SAVE
                    </button>
                </div>
            </div>
        </section>
    </div>
</x-layouts.user>
