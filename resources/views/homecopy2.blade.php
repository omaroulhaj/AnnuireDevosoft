@extends('layouts.admin')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <!-- Styles Tables -->

                    <head>


                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                     

                    </head>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <form action="{{ route('admin.boutiques.search') }}" type="get"  method="GET" class="search-bar">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-search" viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></button>
    </form> --}}


    {{-- <div class="d-flex">

        @foreach ($boutiques as $key => $boutique)
            </td>

            <td>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="image" style="width: 18rem;">
                                <div class="products">
                                    <div class="product">

                                        @foreach ($boutique->galery as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img height="161,5px" src="{{ $media->getUrl('') }}" alt="Image">
                                            </a>
                                        @endforeach

                                        <br>
                                        <div class="namePrice">
                                           <h5>{{ $boutique->nom ?? '' }}</h5>     
                                           
                              </div>
                                        <p>{{ $boutique->tiktok ?? '' }}</p>
                                     
                                        
                                        <div class="stars">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                              </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                              </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                              </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                              </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                              </svg>
                                              
                                        </div>
                                        
                                        
                                        <div class="bay">

                                            <a href="{{ route('admin.boutiques.show', $boutique->id) }}">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="button"
                                                    aria-pressed="false" autocomplete="off">More Details</button>
                                            </a>
                                            
                                        </div>
                                        

                                    </div>
                                </div>


                            
                                
                                <br>
                               

                            </div>


                        </div>
                    </div>
                </div>
        @endforeach
    </div> --}}
    {{--     
    <script src="js/all.min.css"></script> --}}


    <body>


        <section class="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table" class="table table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>nom</th>
                                        <th>Ta9yim</th>
                                        <th>adresse</th>
                                        <th>plus dinfos</th>

                                    </tr>

                                    {{-- <script>
                                        $(document).ready(function() {
                                            $('#table').DataTable({
                                                "columns": [
                                                    null, // Colonne 1
                                                    null, // Colonne 2
                                                    null // Colonne 3
                                                    null // Colonne 3
                                                    null // Colonne 3
                                                    
                                                ]
                                            });
                                        });
                                    </script> --}}
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($boutiques as $key => $boutique)
                                            <td class="d-flex align-items-center">
                                                <div class="img" style="background-image: url(images/person_1.jpg);">

                                                    @foreach ($boutique->galery as $key => $media)
                                                        <a href="{{ $media->getUrl() }}" target="_blank"
                                                            style="display: inline-block">
                                                            <img width: 80px; height: 80px; " height="70px" src="{{ $media->getUrl('') }}" alt="Image">
                                                                            
                                                                        </a>
                                                  @endforeach

                                                </div>

                                            </td>

                                            <td>
                                                <div class="namePrice">
                                                    <h5>{{ $boutique->nom ?? '' }}</h5>

                                                    {{-- <span>{{ App\Models\Boutique::TYPE_SELECT[$boutique->type] ?? '' }}</span> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="stars">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="adresse">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />

                                                    </svg>
                                                    <p> {{ $boutique->facebook ?? '' }}</p>

                                                </div>

                                            </td>

                                            <td>

                                                <div class="bay">

                                                    <a href="{{ route('admin.boutiques.show', $boutique->id) }}">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="button" aria-pressed="false"
                                                            autocomplete="off">More Details</button>
                                                    </a>

                                                </div>

                                            </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        {{-- <div id="taaa" class="table-responsive">
            <table
                class="table table-striped-columns
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Table Name</caption>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="table-primary">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                    <tr class="table-primary">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div> --}}




        <!-- jQuery -->


        <!-- DataTables -->




    </body>

    </html>
@endsection
@section('scripts')
    @parent
@endsection
