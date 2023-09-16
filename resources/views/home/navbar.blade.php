<style>
    * {
        box-sizing: border-box;
    }

    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,400;0,700;0,800;1,700&family=&family=Istok+Web:wght@700&family=Jost&family=Montserrat&display=swap');

    html,
    body {
        background-color: #E9EDF5;
    }

    a {
        text-decoration: none;
    }
    nav.navbar {
        background-color: #E9EDF5 !important;
        position: sticky !important;
        padding: 10px;
    }

    nav.navbar.sticky {
        background-color: #FFFFFF !important;
        padding: 10px;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9990;
        box-shadow: 0px 40px 60px -15px rgba(0, 0, 0, 0.16);
    }

    nav.navbar a {
        color: rgb(0, 0, 0);
        text-decoration: none;
        transition: all .2s ease-in;
        font-size: 17px;
        font-family: Jost, Verdana, Geneva, Tahoma, sans-serif !important;
    }

    nav.navbar a:hover {
        color: rgb(22, 22, 22);
    }

    a.log {
        background-color: #DBE5F7 !important;
        font-family: Jost, Verdana, Geneva, Tahoma, sans-serif !important;
        color: #004cff !important;
        font-size: 14px !important;
        border-radius: 15px !important;
    }

    a.log:hover {
        background-color: #004cff !important;
        color: #DBE5F7 !important;
    }
</style>

<nav id="admenu" class="navbar navbar-expand-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}"><img class="img-fluid" width="60" height="54"
                src="{{ asset('img/logo.png') }}" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                @auth
                    <li class="ms-2 nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#categorie">Categorie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#apropos">À propos</a>
                    </li>
                @else
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#categorie">Categorie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="#apropos">À propos</a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    @guest

                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="nav-link log">Log in/Registre</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                                class="log nav-link">Log out</a>
                        </li>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                @endguest

            </div>
        </div>
    </nav>
    <script>
        window.onscroll = function() {
            myFunction()
        };
        var adheader = document.getElementById("admenu"),
            sticky = adheader.offsetTop;

        function myFunction() {
            window.pageYOffset > sticky ? adheader.classList.add("sticky") : adheader.classList.remove("sticky")
        }
    </script>
