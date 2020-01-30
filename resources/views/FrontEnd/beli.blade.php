@extends('layouts.frontend')

@push('title')
    Kremo - Pembelian 
@endpush

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
<br/>
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <br>
        <div class="card" width="100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <a href="images/menu-2.jpg" class="image-popup"><img src="{{asset('assets/FrontEnd/images/trending/honda-gtr-150.jpg')}}" class="img-fluid" alt="Colorlib Template"></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3>Honda GTR 150</h3>
                        <form action="#">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" id="">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. Telepon</label>
                                    <input type="text" name="no_telepon" placeholder="Masukkan No Telepon" class="form-control" id="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No. KTP</label>
                                    <input type="text" name="no_KTP" placeholder="Masukkan No KTP" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Harga Cash : Rp. -</label>
                            </div>
                            <div class="form-group">
                                <label>Pilih Warna</label> 
                                <select name="" class="form-control" id="">
                                    <option value="Merah">Merah</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection