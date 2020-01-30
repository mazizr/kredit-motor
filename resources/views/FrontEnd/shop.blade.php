@extends('layouts.frontend')

@push('title')
    Kremo - Shop
@endpush
		
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('assets/FrontEnd/images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">Koleksi</h1>
        </div>
      </div>
    </div>
  </div>
      
      <section class="ftco-section bg-light">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                    <div class="item">
                            <div class="product">
                                <a href="{{ url('/single') }}" class="img-prod"><img class="img-fluid" src="{{asset('assets/FrontEnd/images/trending/honda-gtr-150.jpg')}}" alt="Colorlib Template"></a>
                                <div class="text pt-3 px-3">
                                    <h3><a href="#">Honda GTR 150</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span>Rp. 23.900.000,-</span></p>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right">
                                                <span>DP: Rp. 900.000,-</span> <br>
                                                <span>Rp. 1.100.000,-/bulan</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>
          </div>
      </div>
  </section>
@endsection

     