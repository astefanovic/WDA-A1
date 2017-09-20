<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://www.rmit.edu.au/"><div class="rmit-icon" id="nav-icon"></div></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="./">Create Ticket</a></li>
            <li class="nav-item"><a class="nav-link" href="./view">View Tickets</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link" href="./FAQ">FAQ</a></li>
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="./login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="./register">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->fname.' '.Auth::user()->lname}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>

                    </div>
                </li>
            @endif

        </ul>
    </div>
</nav>