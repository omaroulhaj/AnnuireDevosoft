<nav class="navbar navbar-expand-sm">
    <div class="container">
    <a class="navbar-brand" href="#"><img class="img-fluid" width="60" height="54" src="{{ asset('img/logo.png') }}" alt=""></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="/" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Villes</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/ville/">Liste</a>
                    <a class="dropdown-item" href="/ville/add.php">Ajouter</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">s'inscrire</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">se connecter</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">se deconnecter</a>
            </li>
        </ul>
    </div>
</div>
</nav>
