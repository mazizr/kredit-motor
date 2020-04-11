@extends('layouts.backend')

@section('title')
    Motor
@endsection

@section('content')
    <!-- Main content -->
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <br/>
                <a class="btn btn-primary btn-flat btn-sm kepala teks-putih" data-original-title="Tambah Data" href="javascript:void(0)" id="buatbaru">
                    Tambah Data
                </a>
                <br/>
                <br/>
            </div>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered data-table" width="100%">
                <thead class="thead-dark kepala teks-putih">
                    <tr>
                        <th>No</th>
                        <th width="15%">Tenor</th>
                        <th>Paket Uang Muka</th>
                        <th>Paket Jumlah Cicilan</th>
                        <th>Paket Bunga</th>
                        <th>Paket Nilai Cicilan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>  
                <tbody>
                        
                </tbody>            
            </table>
        </div>
    </div>
    
    <!-- bagian modal-->
    <div class="modal" id="ajaxModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Bagian header modal-->
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal"><ion-icon name="close-circle">
                        </ion-icon>
                    </button>
                </div>
                <!-- Akhir Bagian header modal-->
                <!-- Bagian Body Modal-->
                <div class="modal-body">
                    <div id="result"></div>
                    <!-- Alert untuk validasi data-->
                    <div class="alert alert-danger" style="display:none">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Akhir Alert validasi data-->
                    <!-- Form-->
                    <form id="dataForm" name="dataForm" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="kreditpaket_id" id="kreditpaket_id" value="">
                        <input type="hidden" name="id_motor" value="{{$id}}" id="id_motor">
                        <div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label class="control-label">Tenor</label>
                                    <select class="form-control" name="tenor[]" id="tenor">
                                        <option disabled selected>--Pilih Tenor--</option>
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                    <p style="color: red;" id="error_tenor"></p>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Paket Uang Muka</label>
                                    <input type="text" disabled class="form-control number" id="paket_uang_muka_isi" name="paket_uang_muka_isi" placeholder="Masukkan Nama Motor" 
                                    maxlength="50" required="">
                                    <input type="hidden" name="paket_uang_muka[]" id="paket_uang_muka">
                                    <p style="color: red;" id="error_paket_uang_muka"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Paket Bunga</label>
                                    <input type="text" disabled class="form-control number" 
                                    id="paket_bunga_isi" name="paket_bunga_isi" placeholder="Masukkan Kode Motor" 
                                     maxlength="4" required="">
                                     <input type="hidden" name="paket_bunga[]" id="paket_bunga">
                                    <p style="color: red;" id="error_paket_bunga"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">Paket Nilai Cicilan</label>
                                    <input type="text" disabled class="form-control number" 
                                    id="paket_nilai_cicilan_isi" name="paket_nilai_cicilan_isi" placeholder="Masukkan Kode Motor" 
                                     maxlength="4" required="">
                                     <input type="hidden" name="paket_nilai_cicilan[]" id="paket_nilai_cicilan">
                                    <p style="color: red;" id="error_paket_nilai_cicilan"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Paket Jumlah Cicilan</label>
                                    <input type="text" disabled class="form-control number" id="paket_jumlah_cicilan_isi" name="paket_jumlah_cicilan_isi" placeholder="Masukkan Harga Motor" 
                                    maxlength="50" required="">
                                    <input type="hidden" name="paket_jumlah_cicilan[]" id="paket_jumlah_cicilan">
                                    <p style="color: red;" id="error_paket_jumlah_cicilan"></p>
                                </div>

                            </div>

                            <div id="tambah">

                            </div>
                            <div align="right">
                                <button type="button" class="btn btn-primary" id="add">Tambah Kredit Paket</button>
                                {{--  <p style="color: red;" id="error_tambah"></p>  --}}
                            </div>
                        </div>
                        
                    </form>
                    <!-- Akhir Form-->
                </div>
                <!-- modal footer-->
                <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-default btn-flat pull-left" 
                        id="reset">Batal</button>

                        <button align="right" type="submit" class="btn kepala btn-flat teks-putih" id="saveBtn" 
                        value="create">Simpan</button>
                </div>
                <!-- Akhir modal footer-->
            </div>
        </div>
    </div>
<!-- modal berakhir -->
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var id = $('#id_motor').val();
            //INDEX TABEL
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/table/kriditpaket/"+id,
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tenor', name: 'tenor'},
                    {data: 'paket_uang_muka', name: 'paket_uang_muka'},
                    {data: 'paket_jumlah_cicilan', name: 'paket_jumlah_cicilan'},
                    {data: 'paket_bunga', name: 'paket_bunga'},
                    {data: 'paket_nilai_cicilan', name: 'paket_nilai_cicilan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('.number').number(true, 0,'','.');

            //KETIKA BUTTON TAMBAH DI KLIK
            $('#buatbaru').click(function () {
                $('#saveBtn').show();
                $('#saveBtn').val("create-product");
                $('#saveBtn').html("Simpan Data");
                $('#dataForm').trigger("reset");
                $('#modelHeading').html("Tambah Data");
                $('#ajaxModal').modal({backdrop: 'static', keyboard: false});
                $('#ajaxModal').modal('show');
                $('#add').show();

                $('#tenor').on('change', function(){
                    var tenor = $(this).val();
                    var id = $('#id_motor').val(); 
                    var nyatu = id+'|'+tenor;
                    $.ajax({
                        url: "{{ url('/admin/kriditpaket-isi') }}"+'/'+nyatu,
                        method: "GET",
                        dataType: "json",
                        success: function (berhasil) {
                            console.log(berhasil); 
                            $('#paket_bunga').val(berhasil.paket_bunga);
                            $('#paket_jumlah_cicilan').val(berhasil.paket_jumlah_cicilan);
                            $('#paket_nilai_cicilan').val(berhasil.paket_nilai_cicilan);
                            $('#paket_uang_muka').val(berhasil.paket_uang_muka);

                            $('#paket_bunga_isi').val(berhasil.paket_bunga);
                            $('#paket_jumlah_cicilan_isi').val(berhasil.paket_jumlah_cicilan);
                            $('#paket_nilai_cicilan_isi').val(berhasil.paket_nilai_cicilan);
                            $('#paket_uang_muka_isi').val(berhasil.paket_uang_muka);
                        }
                    });
                });

                //ERRORRRRRRRRR
                $('#error_paket_kode').html();
                $('#error_paket_uang_muka').html();
                $('#error_paket_jumlah_cicilan').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#paket_kode').keypress(function(){
                    $('#error_paket_kode').css('display','none');
                });
                $('#paket_uang_muka').keypress(function(){
                    $('#error_paket_uang_muka').css('display','none');
                });
                $('#motor_type').change(function(){
                    $('#error_motor_type').css('display','none');
                });
                $('#motor_merk').change(function(){
                    $('#error_motor_merk').css('display','none');
                });
                $('#paket_jumlah_cicilan').keypress(function(){
                    $('#error_paket_jumlah_cicilan').css('display','none');
                });
                $('#motor_warna_pilihan').change(function(){
                    $('#error_motor_warna_pilihan').css('display','none');
                });
                $('#motor_gambar').change(function(){
                    $('#error_motor_gambar').css('display','none');
                });
            });
            
            var no = 1;
            $('[data-dismiss="modal"]').click(function(){
                $('[data-repeater-list]').empty();
                $('#tambah').empty();
                no = 1;
            });
            $('#add').click(function(){
        
                $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{ url('/admin/tambah_kredit') }}",
                    method: "POST",
                    dataType: "json",
                    success: function(data){
                        no += 1;
                        $('#tambah').append(
                            `
                            <div class="tambahan">
                                <div>
                                    <div class="form-group">

                                        <div class="col-sm-6">
                                            <label class="control-label">Tenor</label>
                                            <select class="form-control" name="tenor[]" id="tenor`+no+`">
                                                <option disabled selected>--Pilih Tenor--</option>
                                                <option value="12">12</option>
                                                <option value="24">24</option>
                                                <option value="36">36</option>
                                            </select>
                                            <p style="color: red;" id="error_tenor`+no+`"></p>
                                        </div>
        
                                        <div class="col-sm-6">
                                            <label class="control-label">Paket Uang Muka</label>
                                            <input disabled type="text" class="form-control number" id="paket_uang_muka_isi`+no+`" 
                                            name="paket_uang_muka_isi" placeholder="Masukkan Nama Motor" 
                                            maxlength="50" required="">
                                            <input type="hidden" name="paket_uang_muka[]" id="paket_uang_muka`+no+`">
                                            <p style="color: red;" id="error_paket_uang_muka`+no+`"></p>
                                        </div>
        
                                    </div>
        
                                    <div class="form-group">
                                        
                                        <div class="col-sm-4">
                                            <label for="name" class="control-label">Paket Bunga</label>
                                            <input disabled type="text" class="form-control number" 
                                            id="paket_bunga_isi`+no+`" name="paket_bunga_isi" placeholder="Masukkan Kode Motor" 
                                             maxlength="4" required="">
                                             <input type="hidden" name="paket_bunga[]" id="paket_bunga`+no+`">
                                            <p style="color: red;" id="error_paket_bunga`+no+`"></p>
                                        </div>
        
                                        <div class="col-sm-4">
                                            <label class="control-label">Paket Nilai Cicilan</label>
                                            <input disabled type="text" class="form-control number" id="paket_nilai_cicilan_isi`+no+`" 
                                            name="paket_nilai_cicilan_isi" placeholder="Masukkan Nama Motor" 
                                            maxlength="50" required="">
                                            <input type="hidden" name="paket_nilai_cicilan[]" id="paket_nilai_cicilan`+no+`">
                                            <p style="color: red;" id="error_paket_nilai_cicilan`+no+`"></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="name" class="control-label">Paket Jumlah Cicilan</label>
                                            <input disabled type="text" class="form-control number" id="paket_jumlah_cicilan_isi`+no+`" 
                                            name="paket_jumlah_cicilan_isi" placeholder="Masukkan Harga Motor" 
                                            maxlength="50" required="">
                                            <input type="hidden" name="paket_jumlah_cicilan[]" id="paket_jumlah_cicilan`+no+`">
                                            <p style="color: red;" id="error_paket_jumlah_cicilan`+no+`"></p>
                                        </div>
        
                                    </div>
                                <div class="form-group">
                                    <div class="col-md-2" style="margin-top:14px;" align="center">
                                        <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.tambahan').remove()">Hapus</button>
                                    </div>
                                </div>
                            </div>
                            `
                        ).add(function(){
                            $('#tenor'+no+'').on('change', function(){
                                var tenor = $(this).val();
                                var id = $('#id_motor').val(); 
                                var nyatu = id+'|'+tenor;
                                $.ajax({
                                    url: "{{ url('/admin/kriditpaket-isi') }}"+'/'+nyatu,
                                    method: "GET",
                                    dataType: "json",
                                    success: function (berhasil) {
                                        console.log(berhasil); 
                                        $('#paket_bunga'+no+'').val(berhasil.paket_bunga);
                                        $('#paket_jumlah_cicilan'+no+'').val(berhasil.paket_jumlah_cicilan);
                                        $('#paket_nilai_cicilan'+no+'').val(berhasil.paket_nilai_cicilan);
                                        $('#paket_uang_muka'+no+'').val(berhasil.paket_uang_muka);

                                        $('#paket_bunga_isi'+no+'').val(berhasil.paket_bunga);
                                        $('#paket_jumlah_cicilan_isi'+no+'').val(berhasil.paket_jumlah_cicilan);
                                        $('#paket_nilai_cicilan_isi'+no+'').val(berhasil.paket_nilai_cicilan);
                                        $('#paket_uang_muka_isi'+no+'').val(berhasil.paket_uang_muka);
                                    }
                                });
                            });
                            $('.number').number(true, 0,'','.');
                            $('#error_tambah').html('');
                            $('#error_tambah').hide();
                            $('#error_id_bahan'+no+'').html('');
                            $('#error_qty'+no+'').html('');
                            $('#error_harga'+no+'').html('');
                            $('#error_expired'+no+'').html('');
                            $('#error_id_bahan'+no+'').hide();
                            $('#error_qty'+no+'').hide();
                            $('#error_harga'+no+'').hide();
                            $('#error_expired'+no+'').hide();
                            $('#qty'+no+'').keypress(function(){
                                $('#error_qty'+no+'').css('display','none');
                            });
                            $('#id_bahan'+no+'').on('change', function(){
                                $('#error_harga'+no+'').css('display','none');
                                $('#error_id_bahan'+no+'').css('display','none');
                            });
                            $('#harga'+no+'').keypress(function(){
                                $('#error_harga'+no+'').css('display','none');
                            });
                            $('#expired'+no+'').change(function(){
                                $('#error_expired'+no+'').css('display','none');
                            });
                            $("input").keypress(function(){
                                $('#error_tambah').css('display','none');
                            });
                            $("input").change(function(){
                                $('#error_tambah').css('display','none');
                            });
                            $("select").change(function(){
                                $('#error_tambah').css('display','none');
                            });
        
                        });
                    },
                    error: function(data){
                        $('#error_tambah').html('');
                        $('#error_tambah').show();
                         $('#error_tambah').append('Silakan isi terlebih dahulu data di atas');
                    }
                });
            });

            //KETIKA BUTTON EDIT DI KLIK
        $('body').on('click', '.editData', function () {
            var kreditpaket_id = $(this).data('id');
            $.get("{{ url('admin/kriditpaket') }}" +'/' + kreditpaket_id +'/edit', function (data) {
                $('#saveBtn').show();
                $('#modelHeading').html("Edit Motor");
                $('#saveBtn').val("edit-user");
                $('#saveBtn').html("Edit Data");
                $('#ajaxModal').modal({backdrop: 'static', keyboard: false});
                $('#ajaxModal').modal('show');     
                console.log(data);

                $('#kreditpaket_id').val(data.id);
                //$('#id_motor').val(data.id_motor);
                $('#paket_kode').val(data.paket_kode);
                $('#tenor').val(data.tenor);
                $('#tenor').trigger('change');
                $('#paket_bunga').val(data.paket_bunga);
                $('#paket_jumlah_cicilan').val(data.paket_jumlah_cicilan);
                $('#paket_nilai_cicilan').val(data.paket_nilai_cicilan);
                $('#paket_uang_muka').val(data.paket_uang_muka);

                $('#paket_bunga_isi').val(data.paket_bunga);
                $('#paket_jumlah_cicilan_isi').val(data.paket_jumlah_cicilan);
                $('#paket_nilai_cicilan_isi').val(data.paket_nilai_cicilan);
                $('#paket_uang_muka_isi').val(data.paket_uang_muka);

                $('#add').hide();
                //ERRORRRRRRRRR
                $('#error_paket_kode').html();
                $('#error_paket_uang_muka').html();
                $('#error_paket_jumlah_cicilan').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#paket_kode').keypress(function(){
                    $('#error_paket_kode').css('display','none');
                });
                $('#paket_uang_muka').keypress(function(){
                    $('#error_paket_uang_muka').css('display','none');
                });
                $('#motor_type').change(function(){
                    $('#error_motor_type').css('display','none');
                });
                $('#motor_merk').change(function(){
                    $('#error_motor_merk').css('display','none');
                });
                $('#paket_jumlah_cicilan').keypress(function(){
                    $('#error_paket_jumlah_cicilan').css('display','none');
                });
                $('#motor_warna_pilihan').change(function(){
                    $('#error_motor_warna_pilihan').css('display','none');
                });
                $('#motor_gambar').change(function(){
                    $('#error_motor_gambar').css('display','none');
                });
            })
        });

            //KETIKA BUTTON SAVE DI KLIK
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var formData = new FormData($('#dataForm')[0]);
                $.ajax({
                data: formData,
                url: "{{ url('admin/kriditpaket-store') }}",
                type: "POST",
                dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data[0] == 500) {
                        $('#saveBtn').show();
                        $('#error_paket_kode').html('');
                        $('#error_paket_kode').show();
                        $('#error_paket_kode').append('<p>'+data.errors+'</p>');
                    } else {
                    $('#dataForm').trigger("reset");
                    $('[data-repeater-list]').empty();
                    $('#tes').empty();
                    $('#tambah').empty();
                    $('#ajaxModal').modal('hide');
                    table.draw();
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        animation: false,
                        title: 'Data Telah Tersimpan',
                        showConfirmButton: false,
                        timer: 1000,
                        customClass: {
                            popup: 'animated bounceOut'
                            }
                        })
                    }
                }, 

                error: function (request, status, error) {
                    $('#saveBtn').show();
                    $('#error_paket_kode').empty().show();
                    $('#error_paket_uang_muka').empty().show();
                    $('#error_paket_jumlah_cicilan').empty().show();
                    $('#error_motor_merk').empty().show();
                    $('#error_motor_type').empty().show();
                    $('#error_motor_warna_pilihan').empty().show();
                    $('#error_motor_gambar').empty().show();
                    json = $.parseJSON(request.responseText);
                    console.log(json.errors);
                    $('#error_paket_kode').html(json.errors.paket_kode);
                    $('#error_paket_uang_muka').html(json.errors.paket_uang_muka);
                    $('#error_paket_jumlah_cicilan').html(json.errors.paket_jumlah_cicilan);
                    $('#error_motor_merk').html(json.errors.motor_merk);
                    $('#error_motor_type').html(json.errors.motor_type);
                    $('#error_motor_gambar').html(json.errors.motor_gambar);
                    $('#error_motor_warna_pilihan').html(json.errors.motor_warna_pilihan);
                    $("#result").html('');
                    $('#saveBtn').html('Simpan Data');
            }
            });
            });

            //KETIKA BUTTON DELETE DI KLIK
        $('body').on('click', '.deleteData', function () {
            var kriditpaket = $(this).data("id");
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Kamu akan menghapus ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak!',
                confirmButtonText: 'Ya, Hapus ini!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin/kriditpaket-destroy') }}"+'/'+kriditpaket,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        });

    });
    </script>
@endsection

