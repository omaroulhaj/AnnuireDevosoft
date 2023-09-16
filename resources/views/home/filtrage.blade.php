<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Istok+Web:wght@700&display=swap"
        rel="stylesheet">

    <style>
    

        div.logo .row .col-12 {
            text-transform: uppercase;
            font-family: 'Istok Web', Verdana, Tahoma, sans-serif;
            font-weight: bold;
        }

        div.filtrage {
            background-color: #fff;
            padding: 20px 0px;
            border-top-left-radius: 40px;
            border-top-right-radius: 40px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        div.filtrage1 {
            background-color: #fff;
            padding: 45px 40px;
            margin: 0px 0px;
            clear: left;
        }

        .filtrage1::after {
            content: "";
            display: table;
            clear: both;
        }

        div.recherche {
            float: left;
            background-color: #F5F7FC;
            padding: 20px;
            border-radius: 10px;
            margin-left: 2px;
            width: 20%;
        }

        div.affichage {
            float: right;
            width: 70%;
        }

        .row .card .card-body span {
            display: block;
            font-family: 'Inconsolata', 'Courier New', Courier, monospace !important;
            font-weight: 400;

        }

        .row .card .card-body span label {
            font-weight: 600;
        }

        .card {
            --bs-card-border-width: 0px;
            padding: 0px !important;
            background-color: #D9D9D9;
        }

        .card-footer a {
            text-decoration: none;
            color: #1510FF;
            font-family: 'Inconsolata', 'Courier New', Courier, monospace !important;
            font-weight: 400;
        }

        .card-footer {
            background-color: inherit;
            border: none;
        }

        .card .card-header img {
            border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius);
        }

        form label {
            font-family: 'Inconsolata', 'Courier New', Courier, monospace !important;
            font-weight: 500;
            font-size: 23px;
        }

        form select,
        input {
            height: 35px;
            border-radius: 20px;
        }

        form select {
            padding-left: 10px;
        }

        input {
            padding: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }

        button.button {
            background-color: #007A95;
            color: white;
            border: 0px;
            padding: 5px;
            height: 35px;
            border-radius: 5px;
            width: 100px;
        }

        .card_c {
            border: 0.5px solid #5e5e5e7f;
            border-radius: 10px;
            padding: 10px;
        }


        span.Boutique {
            font-family: "Istok Web", Georgia, 'Times New Roman', Times, serif;
            font-weight: 700;
            font-size: larger;
        }

        .test {
            border: 3px solid red;
        }

        
    </style>
</head>

<body>
    <!-- ========== Start Navbar ========== -->
    @include('home.navbar')
    <!-- ========== End navbar ========== -->

    <!-- ========== Start Logo ========== -->
    <div class="logo container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center mt-3 text-center">
                <img class="img-fluid mx-auto d-block" width="15%" height="15%" src="{{ asset('img/logo.png') }}"
                    alt="phone">
                <nav class="text-center justify-content-center" aria-label="breadcrumb">
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Recherche</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- ========== End Logo ========== -->

    <!-- ========== Start Filtrage ========== -->
    <div class="container-fluid filtrage1">
            <div class="recherche ">
                <form action="{{ url('/home/search') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="from-label mb-2" for="ville">Ville</label>
                        <select class="form-select" name="ville" id="ville">
                            <option value="">Select ville</option>
                            @foreach ($ville as $v)
                                <option value="{{ $v->id }}">{{ $v->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="from-label mb-2" for="Categorie">Categorie</label>
                        <select class="form-select" name="Categorie" id="Categorie">
                            <option value="">Select categorie</option>
                            @foreach ($categorie as $c)
                                <option value="{{ $c->id }}">{{ $c->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                
                </form>
            </div>
            <div class="affichage ">

                @foreach ($boutique as $b)
                    <div class="d-flex m-2 card_c">
                        <div class="text-center">
                            <img class="img-fluid mx-auto" width="50%" width="50%"
                                src="{{ asset('img/logo.png') }}" alt="phone">
                        </div>
                        <div class="w-100">
                            <div class="mb-2"><span class="Boutique">{{ $b->nom }}</span></div>
                            <span class="me-3"><img class="img-fluid mx-auto" height="30" width="30"
                                    src="{{ asset('img/localisation.svg') }}"
                                    alt="phone">{{ $ville->find($b->ville_id)->nom }}</span>
                            <span class="me-3"><img class="img-fluid mx-auto" height="30" width="30"
                                    src="{{ asset('img/categorie.svg') }}"
                                    alt="phone">{{ $categorie->find($b->categorie_id)->nom }}</span>
                            <div class="card-footer text-center p-0 m-0">
                                <a href="{{ url('home/details/' . $b->id) }}">Voir plus ...</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
    </div>

    <!-- ========== End Filtrage ========== -->

    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
