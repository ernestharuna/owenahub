<div id="announcement" class="text-center text-theme fs-tiny py-1 bg-dark">
    <i class="bi bi-megaphone-fill fs-6"></i>
    <!-- Button trigger modal -->
    <a type="button" class="text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#joinCommunity">
        <span class="fw-bold text-decoration-underline">Click Here</span> — our community awaits your grand entrance!
    </a>

    <!-- Modal -->
    <div class="modal fade" id="joinCommunity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border border-0">
                    <p class="modal-title fs-4 text-dark fw-bold" id="exampleModalLabel">Join Our Community</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="social-links fw-semibold fs-5">
                        <a href="https://instagram.com/owenahub?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"
                            target="_blank"
                            class="py-4 mt-3 rounded-4 shadow text-white text-decoration-none d-block instagram">
                            <i class="bi bi-instagram d-block icon"></i>
                            Follow Us On Instagram
                        </a>
                        <a href="https://x.com/owenahub?t=i4-Iz4K9RaKJ4vWP1QuLlA&s=08" target="_blank"
                            class="py-4 my-3 rounded-4 shadow text-white text-decoration-none d-block twitter">
                            {{-- <i class="bi bi-twitter d-block icon"></i> --}}
                            <i class="bi bi-twitter-x d-block icon"></i>
                            Follow Us On X
                        </a>

                        <hr class="bg-dak text-dark" />

                        <a href="https://www.facebook.com/groups/896520008575738/?ref=share" target="_blank"
                            class="py-4 rounded-4 shadow text-white text-decoration-none d-block facebook">
                            <i class="bi bi-facebook d-block icon"></i>
                            Facebook Community
                        </a>
                        <a href="https://linkedin.com/in/ernestharuna" target="_blank"
                            class="py-4 rounded-4 shadow text-white text-decoration-none d-block my-3 linkedin">
                            <i class="bi bi-linkedin d-block icon"></i>
                            LinkedIn Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-theme-2">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">OwenaHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="bi bi-three-dots fs-3"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('guest.slices.index') }}">Courses</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Mentorship
                    </a>
                    <ul class="dropdown-menu rounded-4">
                        <li><a class="dropdown-item" href="#">See Mentors</a></li>
                        <li><a class="dropdown-item" href="#">Book a session</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-red fw-semibold" href="#">Become a mentor</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('guest.articles.index') }}">Blog</a>
                </li>
            </ul>

            <div class='fs-tiny fw-semibold'>
                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active fw-bold bg-dark rounded-5 px-4 text-white"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst(strtolower(Auth::user()->first_name)) }}
                                {{ ucfirst(strtolower(Auth::user()->last_name)) }}
                            </a>
                            <ul class="dropdown-menu rounded-4">
                                <li class="animated-2 fadeIn">
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        <i class="me-1 bi bi-house"></i> Dashboard
                                    </a>
                                </li>
                                <li class="animated-2 fadeIn">
                                    <a class="dropdown-item" href="{{ route('guest.slices.index') }}">
                                        <i class="me-2 bi bi-box"></i> View Slices
                                    </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="animated-2 fadeIn">
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#joinCommunity">
                                        <i class="bi bi-people me-1"></i> Community
                                    </a>
                                </li>
                                <li class="animated fadeIn">
                                    <a class="dropdown-item fw-bold text-danger" href="{{ route('user.logout') }}">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endauth

                @auth('mentor')
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active fw-bold bg-dark rounded-5 px-4 text-white"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst(strtolower(Auth::guard('mentor')->user()->first_name)) }}
                                {{ ucfirst(strtolower(Auth::guard('mentor')->user()->last_name)) }}
                            </a>
                            <ul class="dropdown-menu rounded-4">
                                <li class="animated-2 fadeIn">
                                    <a class="dropdown-item" href="{{ route('mentor.dashboard') }}">
                                        <i class="me-1 bi bi-house"></i> Dashboard
                                    </a>
                                </li>
                                <li class="animated-2 fadeIn">
                                    <a class="dropdown-item" href="{{ route('guest.slices.index') }}">
                                        <i class="me-2 bi bi-box"></i> View Slices
                                    </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="animated-2 fadeIn">
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#joinCommunity">
                                        <i class="bi bi-people me-1"></i> Community
                                    </a>
                                </li>
                                <li class="animated fadeIn">
                                    <a class="dropdown-item fw-bold text-danger" href="{{ route('mentor.logout') }}">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endauth

                @if (!Auth::check() && !Auth::guard('mentor')->check())
                    <a href="{{ route('user.login') }}" class="btn btn-dark rounded-5 px-4 me-2">Log in</a>
                    <a href="{{ route('user.register') }}" class="btn btn-outline-dark rounded-5 px-4">Sign up</a>
                @endif
            </div>
        </div>
    </div>
</nav>
