<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/dashboard">PinSpinner</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/pins">Manage Pins</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/boards">Manage Boards</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/categories">Manage Catergories</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/pins/create">Add Pin</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/boards/create">Add Board</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/categories/create">Add Category</a>
            </li>

            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item active dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>