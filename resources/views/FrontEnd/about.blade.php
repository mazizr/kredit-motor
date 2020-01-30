@extends('layouts.frontend')

@push('title')
    Kremo - About 
@endpush

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('assets/FrontEnd/images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">Tentang Kami</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/FrontEnd/images/trending/latarnya.jpg);">
              </div>
              <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                  <div class="heading-section-bold mb-5 mt-md-5">
                      <div class="ml-md-0">
                          <h2 class="mb-4">Kredit Motor <Modist br>Online <br> <span>Terbaik & Terpercaya</span></h2>
                      </div>
                  </div>
                  <div class="pb-md-5">
                      <p>Merupakan Website Kredit Motor yang terpercaya dan memudahkan pencicilan motor.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>


  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(assets/FrontEnd/images/bg_4.jpg);">
      <div class="container">
          <div class="row justify-content-center py-5">
              <div class="col-md-10">
                  <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="10000">0</strong>
                      <span>Pelanggan Senang</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="1000">0</strong>
                      <span>Kerja Sama</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Prestasi</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      </div>
  </section>
@endsection