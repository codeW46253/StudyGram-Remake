<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Project Title -->
        <a class="navbar-brand" href="{{ url('/') }}">
            StudyGram
        </a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>

                <!-- Sections Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="sectionsDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sections
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="sectionsDropdown">
                        <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ url('/account') }}">User Account</a></li>
                        <li><a class="dropdown-item" href="{{ url('/public_section') }}">Public Section</a></li>
                        <li><a class="dropdown-item" href="{{ url('/admin') }}">Admin Control</a></li>
                    </ul>
                </li>

                <!-- Auth -->
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Log Out</button>
                    </form>
                </li>
                @else
                <li>
                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
