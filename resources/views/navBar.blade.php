<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">DAARA_DJI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('students-list')}}">Apprenant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('list_mat')}}">Matiere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Ajouter</a>

                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
@yield('content')
