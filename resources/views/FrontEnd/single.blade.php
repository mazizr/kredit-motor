@extends('layouts.frontend')

@section('title')
    KreMo - Honda GTR 150
@endsection

@section('content')
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
            <div class="container">
              <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                  <h1 class="mb-0 bread">Honda GTR 150</h1>
                </div>
              </div>
            </div>
          </div>
              
              <section class="ftco-section bg-light">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 mb-5 ftco-animate">
                          <a href="images/menu-2.jpg" class="image-popup"><img src="{{asset('assets/FrontEnd/images/trending/honda-gtr-150.jpg')}}" class="img-fluid" alt="Colorlib Template"></a>
                      </div>
                      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                            <h3>Honda GTR 150</h3>
                            <h5>Spesifikasi Honda GTR</h5>
                            -
                                <div class="row mt-4">
                                   
                                    <p><a href="cart.html" class="btn btn-danger py-3 px-5">Beli Cash</a>&nbsp;<a href="cart.html" class="btn btn-danger py-3 px-5">Ajukan Kredit</a></p>
                                </div>
                  </div>
              </div>
          </section>
@endsection