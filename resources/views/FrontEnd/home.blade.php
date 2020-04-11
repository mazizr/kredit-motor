@extends('layouts.frontend')

@push('title')
    Kremo - Home 
@endpush

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('assets/FrontEnd/images/gambar-header.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-11 ftco-animate text-center">
        <h1>KreMo</h1>
        <h2><span>Pilih Motor Anda</span></h2>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
            </a>
        </div>
    </div>
    </div>
</div>

<div class="goto-here"></div>

<section style="margin-top: -80px;" class="ftco-section ftco-product">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Brand</h1>
        <h2 class="mb-4">Brand</h2>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider owl-carousel ftco-animate">
                    @foreach ($merk as $item)
                    <div class="item" style="margin-left: -80px;">
                        <div class="product">
                            <a href={{ URL::to('/') }}/shop/{{$item->slug }} class="img-prod"><img class="img-fluid" style="width: 200px;" 
                                src={{ URL::to('/') }}/images/{{ $item->gambar_merk }} alt="Colorlib Template"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section style="margin-top: -80px;" class="ftco-section ftco-product">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Trending</h1>
        <h2 class="mb-4">Trending</h2>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider owl-carousel ftco-animate">
                    @foreach ($motor as $item)
                    <div class="item">
                        <div class="product">
                            <a href="{{ URL::to('/') }}/single/{{ $item->slug }}" class="img-prod"><img class="img-fluid" src={{ URL::to('/') }}/images/{{ $item->motor_gambar }} alt="Colorlib Template"></a>
                            <div class="text pt-3 px-3">
                                <h3><a href="{{ URL::to('/') }}/single/{{ $item->slug }}">{{ $item->motor_type }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>Rp&nbsp;&nbsp;{{ number_format($item->motor_harga,0,'','.') }},00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/FrontEnd/images/trending/latarnya.jpg);">
                </div>
                <div class="col-md-6 py-4 wrap-about pb-md-4 ftco-animate">
                    <div class="heading-section-bold mb-5 mt-md-5">
                        <div class="ml-md-1">
                            <h2 class="mb-2">Kredit Motor <Modist br>Online <br> <span>Terbaik & Terpercaya</span></h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>Merupakan Website Kredit Motor yang terpercaya dan memudahkan pencicilan motor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

