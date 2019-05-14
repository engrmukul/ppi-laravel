<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">{{ config('app.name') }}</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Menu</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('category', 'laptop') }}" class="text-white">
                                Laptop
                            </a>
                        </li>
                        @auth()
                            <li>
                                <a href="{{ route('profile') }}" class="text-white">
                                    Profile ({{ optional(auth()->user())->full_name }})
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-white">
                                    Logout
                                </a>
                            </li>
                        @endauth

                        @guest()
                            <li>
                                <a href="{{ route('login') }}" class="text-white">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="text-white">
                                    Register
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <strong>{{ config('app.name') }}</strong>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
