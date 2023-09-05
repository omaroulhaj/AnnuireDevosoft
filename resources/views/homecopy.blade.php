@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

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

    <form action="{{ route('search') }}" method="GET" class="search-bar">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
    </form>
    <br>
    {{-- <form action="map-small.html">
        <div class="form-group">
            <select class="form-control selectpicker" name="search_types" id="search_types_option" title="I’m looking for...">
                <option value="a" data-icon="ion-arrow-graph-up-right">Categories</option>
                <option value="restaurants" data-icon="ion-android-restaurant">Clothes </option>
                <option value="coffe" data-icon="ion-coffee">Coffee</option>
                <option value="nightlife" data-icon="ion-android-bar">Nightlife</option>
                <option value="shopping" data-icon="ion-bag">Shopping</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="location" placeholder="Location" />
        </div>         
        <div class="form-group form-group-btns">
            <button type="submit" class="btn btn-custom btn-custom-secondary btn-icon"><i class="ion-ios-search-strong"></i></button>
        </div>
    </form>  --}}

    <div class="d-flex">

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
                                           
                                            {{-- <span>{{ App\Models\Boutique::TYPE_SELECT[$boutique->type] ?? '' }}</span> --}}
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


                                {{-- <div class="caption-rs">
                                    <a href="{{ route('admin.boutiques.show', $boutique->id) }}" class="btn-marker">
                                        <span class="box"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                                  </svg></span>
                                                <span class="title">Location</span>
                                    </a>
                                </div> --}}
                                
                                <br>
                               

                            </div>


                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    <script src="js/all.min.css"></script>
@endsection
@section('scripts')
    @parent
@endsection
