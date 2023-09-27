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
    .my-button {
            margin-top: 7px;
            background-size: cover;
            background-repeat: no-repeat;
            width: 30px;
            height: 30px;
            border: none;
        }
</style>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
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
            <ul class="navbar-nav me-auto mt-2 mt-lg-0 ">
                @auth
                    <li class="ms-2 nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#categorie') }}">Categorie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#contact') }}">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#apropos') }}">À propos</a>
                    </li>
                @else
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#categorie') }}">Categorie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#contact') }}">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" data-widget="pushmenu" href="{{ url('home#apropos') }}">À propos</a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto ul1">
                    @guest

                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="nav-link log">Log in/Registre</a>
                        </li>
                    @else
                        <!-- Authentication Links -->
                        {{-- <li class="nav-item dropdown ml-1 ml-md-3">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img
                                src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="Avatar" class="rounded-circle"
                                width="40"></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="http://lms-devosoft.com:8080/frontend/profile">
                                <i class="material-icons">person</i> Profile
                            </a>
                            <form action="http://lms-devosoft.com:8080/logout" method="post">
                                <input type="hidden" name="_token" value="YryoPFzD0blzXljLpZ5Y55wUcQrvCLXc7wSeX0sV">
                                <button class="dropdown-item">
                                    <i class="material-icons">lock</i> Logout
                                </button>
                            </form>
                        </div>
                    </li> --}}
                    <li>
                        <div class="form-group">
                            <button class="my-button rounded-circle" style=" background-image: url('data:image/png;base64,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');">
                            </button>
                        </div>
                        <ul class="list-unstyled" >
                          @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                          @can('profile_password_edit')
                              <li class="nav-item ">
                                  <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                      href="{{ route('profile.password.edit') }}">
                                      <i class="fa-fw fas fa-key nav-icon">
                                      </i>
                                      
                                          {{ trans('global.my_profile') }}
                                      
                                  </a>
                              </li>
                          @endcan
                      @endif
                      <li class="nav-item">
                          <a href="#" class="nav-link"
                              onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                             
                                  <i class="fas fa-fw fa-sign-out-alt nav-icon">
                                  </i>
                                  {{ trans('global.logout') }}
                              
                          </a>
                      </li>
                        </ul>
                    </li>
                    </ul>
                @endguest

            </div>
        </div>
    </nav>
    <script>
        $(document).ready(function() {
            $('.ul1 ul').slideUp();
            $('.ul1 li').click(function() {
                $(this).children('ul').slideToggle("speed");
            });
        });
    </script>
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
