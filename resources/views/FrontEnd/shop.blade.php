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
            @foreach ($motor as $item)
              <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                    <div class="item">
                        <div class="product">
                            <a href={{ URL::to('/') }}/single/{{ $item->slug }} class="img-prod"><img class="img-fluid" src={{ URL::to('/') }}/images/{{ $item->motor_gambar }} alt="Colorlib Template"></a>
                            <div class="text pt-3 px-3">
                                <h3><a href="#">{{ $item->motor_type }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>Rp&nbsp;&nbsp;{{ number_format($item->motor_harga,0,'','.') }},00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            @endforeach
          </div>
      </div>
  </section>
@endsection

     