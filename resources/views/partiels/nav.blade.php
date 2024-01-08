@once
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home.index')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profiles.index')}}">tous les profiles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('publication.index')}}">publication list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profiles.create')}}">add profile</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('publication.create')}}">add publication</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('login.index')}}">Se connecter</a>
                    </li>
                @endguest

            </ul>
            @auth
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{route('login.delete')}}">déconnecter</a></li>
                    </ul>
                </div>
            @endauth
        </div>
        </div>
    </nav>
@endonce
