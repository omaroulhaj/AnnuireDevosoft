<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Istok+Web:wght@700&display=swap" rel="stylesheet">

    <style>

        *{
            box-sizing: border-box;
        }
        html,body{
            background-color: #E3E3E3;
        }
        nav{
            background-color: #007A95;
            border-bottom-left-radius:40px;
            border-bottom-right-radius:40px;
            padding: 10px;
        }
        div.filtrage a
        {
            text-decoration: none;
        }
        nav a{
            color: white;
            text-decoration: none;
            transition: all .5s ease-in;
            font-size: 20px;
            font-family:'Inconsolata','Courier New', Courier, monospace;
        }  

        nav a:hover{
            color:white;
        }
        div.logo .row .col-12{
            text-transform: uppercase;
            font-family:  'Istok Web',Verdana,Tahoma, sans-serif;
            font-weight: bold;
        }
        div.filtrage{
            background-color: #fff;
            padding: 10px;
            border-top-left-radius:40px;
            border-top-right-radius:40px;
        }
        .row .card .card-body span{
            display: block;
            font-family:'Inconsolata','Courier New', Courier, monospace!important;
            font-weight: 400;

        }
       
        .row .card .card-body span label{
            font-weight: 600;
        }
        .card
        {
            --bs-card-border-width:0px;
           padding: 0px!important;
            background-color: #D9D9D9;
        }
        .card-footer a{
            text-decoration: none;
            color: #1510FF;
            font-family:'Inconsolata','Courier New', Courier, monospace!important;
            font-weight: 400;
        }
        .card-footer{
            background-color: inherit;
            border: none;
        }
        .card .card-header img{
            border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius);
        }
        form label{
            font-family:'Inconsolata','Courier New', Courier, monospace!important;
            font-weight:500;
            font-size: 23px;
        }
        form select,input{
            width: 20%;
            height: 35px;
            border-radius: 20px;
        }
        form select{
            padding-left: 10px;
        }
        input{
           padding: 10px;
           margin-left: 20px;
           margin-right: 20px;
        }
        button.button
        {
            background-color:  #007A95;
            color: white;
            border:0px;
            padding: 5px;
            height: 35px;
            border-radius: 5px;
            width: 100px;
        }
        
    </style>
</head>
<body>
    <!-- ========== Start Navbar ========== -->
    <nav class="">
        <div class="container-fluid">
            <div class="row">
            
                <div class="col-12 text-center">
                    <a  href="#">Navbar</a>
                </div>
            </div>

        </div>
    </nav> 
    <!-- ========== End navbar ========== -->

    <!-- ========== Start Logo ========== -->
    <div class="logo container">
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h1>Boutiques</h1>
            </div>
        </div>
    </div>
    <!-- ========== End Logo ========== -->

    <!-- ========== Start Filtrage ========== -->
    <div class="filtrage container-fluid">
        <div class="row text-center p-3">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/home/search')}}" method="post">
                        @csrf
                        <span>
                            <label class="from-label" for="ville">Ville</label>
                            <select name="ville" id="ville">
                                <option value="">Select ville</option>
                                @foreach ($ville as $v) 
                                <option value="{{$v->id}}">{{$v->nom}}</option>
                                @endforeach
                            </select>
                        </span>
                        <span>
                            <label class="ms-3 from-label" for="Categorie">Categorie</label>
                            <select name="Categorie" id="Categorie">
                                <option value="">Select categorie</option>
                                @foreach ($categorie as $c) 
                                <option value="{{$c->id}}">{{$c->nom}}</option>
                                @endforeach
                            </select>
                        </span>
                        <button type="submit" class="ms-3 button">Search</button>
                    </div>
                    <div>
                        <hr class="border border-dark border-2">
                    </div> 
                </form>                                             
            </div>
        </div>
        <div class="row"> 
            @foreach($boutique as $b)
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center">
                        <img class="img-fluid" src="{{asset($b->uuid)}}" alt="phone">
                    </div>
                    <div class="card-body">
                        <span><label for="ville">Ville :</label>{{$ville->find($b->ville_id)->nom}}</span>
                        <span><label for="Boutique">Boutique :</label>{{$b->nom}}</span>
                        <span><label for="Categorie">Categorie :</label>{{$categorie->find($b->categorie_id)->nom}}</span>
                    </div>
                    <div class="card-footer text-center p-0 pb-2 m-0">
                        <a href="{{url('home/details/'.$b->id)}}">Voir plus ...</a>
                    </div>
                
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ========== End Filtrage ========== -->
    <!-- ========== End Filtrage ========== -->
    <!-- ========== End Filtrage ========== -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>