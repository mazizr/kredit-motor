@extends('layouts.frontend')

@section('title')
    KreMo - {{ $semua->motor_type }}
@endsection

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
              
              <section class="ftco-section bg-light">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 mb-5 ftco-animate">
                          <a href="images/menu-2.jpg" class="image-popup"><img src={{ URL::to('/') }}/images/{{ $semua->motor_gambar }} class="img-fluid" alt="Colorlib Template"></a>
                      </div>
                      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                            <h3>{{ $semua->motor_type }}</h3>
                            <h5>Spesifikasi {{ $semua->motor_type }}</h5>
                            - Brand Motor : {{ $semua->motor_merk }}<br/>
                            - Harga Cash : Rp&nbsp;&nbsp;{{ number_format($semua->motor_harga,0,'','.') }},00<br/>
                            - Pilihan Warna : {{ $semua->motor_warna_pilihan }}
                            <div class="row mt-4">
                              <table class="table-bordered data-table" width="40%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="7%">&nbsp;&nbsp;&nbsp;Tenor&nbsp;&nbsp;</th>
                                        <th width="40%">&nbsp;&nbsp;&nbsp;Uang Muka</th>
                                        <th width="40%">&nbsp;&nbsp;&nbsp;Nilai Cicilan&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                  @foreach ($data as $item)
                                  <tr>
                                    <td>&nbsp;&nbsp;&nbsp;{{ $item->tenor }}&nbsp;X</td>
                                    <td>&nbsp;&nbsp;&nbsp;Rp&nbsp;{{ number_format($item->paket_uang_muka,0,'','.') }},00&nbsp;</td>
                                    <td>&nbsp;&nbsp;&nbsp;Rp&nbsp;{{ number_format($item->paket_nilai_cicilan,0,'','.') }},00&nbsp;</td>
                                  </tr>
                                  @endforeach
                                </tbody>            
                            </table>
                          </div>
                            
                                <div class="row mt-4">
                                   
                                    <p><a href="/beli-cash/{{ $semua->slug }}" class="btn btn-danger py-3 px-5">Beli Cash</a>&nbsp;
                                      <a href="/beli-cicilan/{{ $semua->slug }}" data-original-title="Tambah Data" class="btn btn-danger py-3 px-5">Ajukan Kredit</a></p>
                                </div>
                  </div>
              </div>
          </section>
@endsection