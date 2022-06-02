@extends('frontend.layouts.app')

@section('content')
<br>
<br>
<br>
<style>
    .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: 5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>

<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-8">
            <div class="profile-tab">


              {{-- <div class="clearfix"></div> --}}



{{--
              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">
                     <i class="fa fa-book x2"></i>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Approve Book {{$total_approve}}</h5>
                  <h5 class="card-title">UnApprove Book {{$total_unapprove}}</h5>
                </div>
              </div>




              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <i class="fa fa-heart x2"></i>

                </div>
                <div class="card-body">
                  <h5 class="card-title">whislist</h5>
                  <p class="card-text">{{$total_wishlist}}</p>
                </div>
              </div>



              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <i class="fa fa-star x2"></i>

                </div>
                <div class="card-body">
                  <h5 class="card-title">Star Ratings</h5>
                  <p class="card-text">{{$total_rating}}</p>
                </div>
              </div>







{{$total_messages}}






 --}}

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="col-md-10 ">
    <div class="row ">
        <div class="col-md-6">
            <div class="card l-bg-cherry">
                <div  onclick="location.href='{{ route('users.dashboard.books') }}'">

                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-book"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title">Book</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                           {{$total_unapprove}}
                            </h2>
                        </div>
                        <div class="col-4 text-center">
                            <span> <i class="fa fa-book"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div  onclick="location.href='{{ route('wishlistShow') }}'">


            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-heart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Wishlist</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$total_wishlist}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 90%;margin-left:20px" ></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div  onclick="location.href='{{ route('Rating') }}'">

            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-star"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Rating</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$total_rating}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><i class="fas fa-star"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">

            <div class="card l-bg-orange-dark">
                <div  onclick="location.href='{{ route('chatify') }}'">

                {{-- <div class="card-statistic-3 p-4">


                    <div class="card-icon card-icon-large"><i class="fas fa-comment-dots"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Chat</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               {{$total_messages}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><i class="fas fa-comment-dots"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div> --}}
            </div>
            </div>
        </div>
    </div>
</div>



            </div>
          </div>

          <div class="col-md-4 p-1">
            @include('frontend.pages.users.partials.sidebar')
          </div>

      </div>
    </div>
  </div>

</div>
<div style="margin-bottom:420px"></div>
@endsection
