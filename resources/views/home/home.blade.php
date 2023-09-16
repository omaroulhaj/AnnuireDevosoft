<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>


        div.filtrage a {
            text-decoration: none;
        }


       
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
            box-shadow: -1px 8px 22px 3px rgba(0, 0, 0, 0.132);

        }

        div.filtrage1 {
            background-color: #fff;
            padding: 45px 10px;
            border-bottom: 1px solid #b5b5b547;

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
        .box input {
            width: 20%;
            height: 35px;
            border-radius: 20px;
        }

        form select {
            padding-left: 10px;
        }

        .box input {
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

        .test {
            border: 3px solid red;
        }

        img.fil {
            object-fit: cover !important;
            width: 100%;
        }

        h1 {
            color: #000;
            font-family: Montserrat, Verdana, Geneva, Tahoma, sans-serif;
            font-size: 35px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        h4 {
            color: #000000;
            font-family: Montserrat, Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 100;
            line-height: normal;
        }

        h2 {
            position: relative;
            display: block;
            font-family: Jost, Verdana, Geneva, Tahoma, sans-serif;
            font-size: 35px;
            line-height: 1.2em;
            color: #202124;
            font-weight: 500;
            margin-bottom: 50px;
        }



        span.istok {
            text-transform: uppercase;
            font-family: 'Inconsolata', 'Courier New', Courier, monospace;
            font-size: larger;
            font-weight: bolder;
            margin-bottom: 5px;
        }

    

        .filtrage1 .col-6 {
            text-align: left;
        }

        .filtrage1 .col-6 p {
            font-size: 30px;
            line-height: 1.3em;
            color: #000;
            font-family: Jost, Verdana, Geneva, Tahoma, sans-serif !important;
        }

      
    </style>
</head>

<body>
    <!-- ========== Start Navbar ========== -->
    @include('home.navbar')
    <!-- ========== End navbar ========== -->

    <!-- ========== Start Logo ========== -->

    <!-- ========== End Logo ========== -->
    <div class="container-fluid box">
        <div class="row align-items-center justify-content-center p-0 pb-5 pt-4">

            <div class="col-6">
                <div class="p-2 m-0">
                    <h1>Découvrez les boutiques au Maroc</h1>
                    <h4>Il y a {{ $boutique[0] }} Magasin ici</h4>
                </div>
                <div class="filtrage text-center">
                    <form action="{{ url('/home/search') }}" method="post">
                        @csrf
                        <span>
                            <label class="from-label" for="ville">Ville</label>
                            <select name="ville" id="ville">
                                <option value="">Select ville</option>
                                @foreach ($ville as $v)
                                    <option value="{{ $v->id }}">{{ $v->nom }}</option>
                                @endforeach
                            </select>
                        </span>
                        <span>
                            <label class="ms-3 from-label" for="Categorie">Categorie</label>
                            <select name="Categorie" id="Categorie">
                                <option value="">Select categorie</option>
                                @foreach ($categorie as $c)
                                    <option value="{{ $c->id }}">{{ $c->nom }}</option>
                                @endforeach
                            </select>
                        </span>
                        <button type="submit" class="ms-3 button">Search</button>
                    </form>
                </div>
            </div>
            {{-- <div>
            <hr class="border border-dark border-2">
        </div> --}}
            <div class="col-5 mt-4">
                <img class="img-fluid fil" src="{{ asset('img/photo.png') }}" alt="phone">
            </div>
        </div>
    </div>
    <div id="categorie" class="container-fluid">
        <div class="filtrage1 row text-center">
            <h2>Categorie</h2>
            <div class="col-3">
                <div class="card">
                    <a href="{{ url('/home/search/telephone') }}">

                        <div class="card-body text-center">
                            <span class="istok">Telephone</span>
                            <img class="img-fluid mx-auto" src="{{ asset('img/phonecategorie.svg') }}" alt="phone">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <a href="{{ url('/home/search/vetement') }}">
                        <div class="card-body text-center">
                            <span class="istok">Vêtement</span>
                            <img class="img-fluid mx-auto" src="{{ asset('img/vetement.svg') }}" alt="phone">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== End Filtrage ========== -->
    <div id="apropos" class="container-fluid">
        <div class="filtrage1 row justify-content-start">
            <h2 class="text-center">À propos</h2>
            <div class="col-6">
                <p>Annuaire Devosoft est une liste, un répertoire mis à jour chaque année qui regroupe des informations
                    sur les entreprises , les boutiques dans la region de Maroc</p>
                <p>Retrouvez toutes les magasins par catégories ainsi que leur numéro de téléphone, adresse</p>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <img class="img-fluid mx-auto fil" src="{{ asset('img/logo.png') }}" alt="phone">
            </div>
        </div>
    </div>
    <!-- ========== Start contact ========== -->
    <div id="contact" class="container-fluid">
        <div class="filtrage1 row justify-content-center text-center">
            <h2 class="text-center">Contact US</h2>
            <div class="col-4">
                <form id="contactForm">

                    <!-- Name input -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" placeholder="Name" />
                    </div>

                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label" for="emailAddress">Email Address</label>
                        <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
                    </div>

                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Envoyer</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
    @include('home.footer')

    <script src="https://kit.fontawesome.com/5491c3529b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
