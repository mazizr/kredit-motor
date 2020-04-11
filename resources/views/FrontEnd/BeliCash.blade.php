@extends('layouts.frontend')



@section('content')
			
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-0 bread">{{ $semua->motor_type }}</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-xs-12 col-sm-5 col-lg-4 order-md-last d-flex">
        <form action="#" class="bg-white p-5 contact-form">
          <div class="form-group">
            <img src={{ URL::to('/') }}/images/{{ $semua->motor_gambar }} class="img-fluid" alt="Colorlib Template">
          </div>
          <div class="form-group">
            <b>Nama Motor</b> : {{ $semua->motor_type }}
          </div>
          <div class="form-group">
            <b>Harga Motor</b> : Rp&nbsp;{{ number_format($semua->motor_harga,0,'','.') }},00
          </div>
          <div class="form-group">
            <b>Warna Motor</b> : {{ $semua->motor_warna_pilihan }}
          </div>
        </form>
      
      </div>

      <div class="col-xs-12 col-sm-7 col-lg-8 order-md-last d-flex">
        <form action="{{url('/belicash-store')}}" method="post" id="dataForm" class="bg-white p-5 contact-form">
          {{csrf_field()}}
          <input type="hidden" name="motor" id="motor" value="{{$semua->id}}">
          <div class="form-group">
            <input type="text" name="pembeli_No_KTP" class="form-control allownumericwithoutdecimal" placeholder="Masukkan Nomer KTP">
            <p style="color: red;" id="error_pembeli_No_KTP"></p>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="pembeli_nama" placeholder="Masukkan Nama Anda">
            <p style="color: red;" id="error_pembeli_nama"></p>
          </div>
          <div class="form-group">
            <input type="text" class="form-control allownumericwithoutdecimal" name="pembeli_telepon" placeholder="Masukkan Nomber Telepon Anda">
            <p style="color: red;" id="error_pembeli_telepon"></p>
          </div>
          <div class="form-group">
            <textarea id="" cols="30" rows="7" name="pembeli_alamat" class="form-control" placeholder="Masukkan Alamat Anda"></textarea>
            <p style="color: red;" id="error_pembeli_alamat"></p>
          </div>
          <div class="form-group">
            <input type="submit" id="kirim" value="Kirim Data" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>

      
  </div>
</section>
              
          
@endsection

@section('js')
    <script>
      $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
      });
      $('#error_pembeli_No_KTP').html();
      $('#error_pembeli_nama').html();
      $('#error_pembeli_telepon').html();
      $('#error_pembeli_alamat').html();

      $('#pembeli_No_KTP').keypress(function(){
        $('#error_pembeli_No_KTP').css('display','none');
      });
      $('#pembeli_nama').keypress(function(){
        $('#error_pembeli_nama').css('display','none');
      });
      $('#pembeli_telepon').keypress(function(){
        $('#error_pembeli_telepon').css('display','none');
      });
      $('#pembeli_alamat').keypress(function(){
        $('#error_pembeli_alamat').css('display','none');
      });
      //console.log(motor);
      //KETIKA BUTTON SAVE DI KLIK
    </script>
  
@endsection