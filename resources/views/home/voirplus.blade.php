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
        * {
            box-sizing: border-box;
        }

        html,
        body {
            background-color: #E3E3E3;
        }

        nav {
            background-color: #007A95;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            transition: all .5s ease-in;
            font-size: 20px;
            font-family: 'Inconsolata', 'Courier New', Courier, monospace;
        }

        nav a:hover {
            color: white;
        }

        div.logo .row .col-12 {
            text-transform: uppercase;
            font-family: 'Istok Web', Verdana, Tahoma, sans-serif;
            font-weight: bold;
        }

        div.voirplus {
            background-color: #fff;
            padding: 10px;
            border-top-left-radius: 40px;
            border-top-right-radius: 40px;
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
            width: 20%;
            height: 35px;
            border-radius: 20px;
        }

        div.voirplus a {
            text-decoration: none;
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

        .row .col-6 h3 {
            color: #007A95;
            text-align: center;
            font-family: Inconsolata, 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 40;
            font-style: normal;
            font-weight: bolder;
            line-height: normal;
        }

        p {
            text-align: left;
        }

        .testgithub {
            color: red;
            text-align: center
        }
    </style>
</head>

<body>
    <!-- ========== Start Navbar ========== -->
    <nav class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 text-center">
                    <a href="#">Navbar</a>
                </div>
            </div>

        </div>
    </nav>
    <!-- ========== End navbar ========== -->

    <!-- ========== Start Logo ========== -->
    <div class="logo container">
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h1>LOGO DE L'application</h1>
            </div>
        </div>
    </div>
    <!-- ========== End Logo ========== -->

    <!-- ========== Start voirplus ========== -->
    <div class="row justify-content-center">
        <div class="col-11 voirplus container-fluid">
            <div class="row text-center p-3">

                <div class="row">
                    <div class="col-6">
                        <h2>{{ $boutique[0]->nom }}</h2>
                        <p class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt esse
                            voluptates laborum,
                            qui modi dicta maiores repellat recusandae vel sunt natus soluta quidem autem saepe harum
                            suscipit cum totam, asperiores iste nesciunt quis architecto. Nisi sit doloremque obcaecati
                            delectus quas.</p>
                        <a href="{{ $boutique[0]->site_web }}"><img class="me-2" src="{{ asset('img/site.svg') }}"
                                alt="phone" height="30" width="30" />ALLER SUR LE SITE</a>
                    </div>
                    <div class="col-6">
                        <img class="float-start" src="{{ asset('img/image1.jpeg') }}" alt="phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h3>CONTACTEZ-NOUS</h3>
                    <div class="mb-2">
                        <img src="{{ asset('img/phone.svg') }}" class="me-2" alt="phone" height="30"
                            width="30" /><span>{{ $boutique[0]->telephone }}</span>
                    </div>
                    <div class="mb-2">
                        <img src="{{ asset('img/email.svg') }}" class="me-2" alt="phone" height="30"
                            width="30" /><span>{{ $boutique[0]->email }}</span>
                    </div>
                    <h3>SUIVEZ NOUS</h3>
                    <div class="text-center justify-content-center">
                        <a class="ms-2" href="{{ $boutique[0]->facebook }}"><img class="m-2"
                                src="{{ asset('img/facebook.svg') }}" alt="phone" height="30"
                                width="30" />Facebook</a>
                        <a class="ms-2" href="{{ $boutique[0]->instagram }}"><img class="m-2"
                                src="{{ asset('img/instagram.svg') }}" alt="phone" height="30"
                                width="30" />Instagram</a>
                        <a class="ms-2" href="{{ $boutique[0]->tiktok }}"><img class="m-2"
                                src="{{ asset('img/tiktok.svg') }}" alt="phone" height="30"
                                width="30" />Tiktok</a>
                        <a class="ms-2" href="{{ $boutique[0]->youtube }}"><img class="m-2"
                                src="{{ asset('img/youtube.svg') }}" alt="phone" height="30"
                                width="30" />Youtube</a>
                        {{-- <a class="ms-2" href="{{$boutique[0]->twitter}}"><img class="m-2" src="{{ asset('img/twitter.svg') }}" alt="phone" height="30" width="30" />Twitter</a> --}}
                    </div>
                </div>
                <div class="col-6 ju">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108696.7144146591!2d-8.223894035458656!3d31.640083554240878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafedbb73ae8c67%3A0xa31d60834d75df43!2sBoutique%20younes!5e0!3m2!1sfr!2sma!4v1693820392766!5m2!1sfr!2sma"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="testgithub">
            <h1> just test github push and pull</h1>
            <h1> just test github push and pull</h1>
            <h1> just test github push and pull</h1>
        </div>
        <!-- ========== End voirplus ========== -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
