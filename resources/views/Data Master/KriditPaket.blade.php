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
                        <th>Paket Kode</th>
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
    <div class="modal fade" id="ajaxModal" aria-hidden="true">
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
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Kode Paket</label>
                                    <input type="text" class="form-control allownumericwithoutdecimal" id="paket_kode" name="paket_kode" placeholder="Masukkan Kode Motor" 
                                     maxlength="4" required="">
                                    <p style="color: red;" id="error_paket_kode"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">Paket Harga Cash</label>
                                    <input type="text" class="form-control" id="paket_harga_cash" name="paket_harga_cash" placeholder="Masukkan Nama Motor" 
                                    maxlength="50" required="">
                                    <p style="color: red;" id="error_paket_harga_cash"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Harga Motor</label>
                                    <input type="text" class="form-control number" id="motor_harga" name="motor_harga" placeholder="Masukkan Harga Motor" 
                                    maxlength="50" required="">
                                    <p style="color: red;" id="error_motor_harga"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Brand Motor</label>
                                    <select type="text" class="form-control select2" id="motor_merk" style="width: 100%;" name="motor_merk" placeholder="" value="" maxlength="50" required="">
                                        <option value="Honda">
                                            Honda
                                        </option>
                                        <option value="Yamaha">
                                            Yamaha
                                        </option>
                                        <option value="Suzuki">
                                            Suzuki
                                        </option>   
                                    </select>
                                    <p style="color: red;" id="error_motor_merk"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Tipe Motor</label>
                                    <select type="text" class="form-control select2" id="motor_type" style="width: 100%;" name="motor_type" placeholder="" value="" maxlength="50" required="">
                                        <option value="Bebek">
                                            Bebek
                                        </option>
                                        <option value="Matic">
                                            Matic
                                        </option>
                                        <option value="Sport">
                                            Sport
                                        </option>   
                                    </select>
                                    <p style="color: red;" id="error_motor_type"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">Warna Motor</label>
                                    <select type="text" class="form-control select2" id="motor_warna_pilihan" style="width: 100%;" name="motor_warna_pilihan" placeholder="" value="" maxlength="50" required="">
                                        <option value="Merah">
                                            Merah
                                        </option>
                                        <option value="Hitam">
                                            Hitam
                                        </option>
                                        <option value="Putih">
                                            Putih
                                        </option> 
                                        <option value="Silver">
                                            Silver
                                        </option>   
                                        <option value="Gold">
                                            Gold
                                        </option> 
                                        <option value="Biru">
                                            Biru
                                        </option> 
                                    </select>
                                    <p style="color: red;" id="error_motor_warna_pilihan"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" style="margin-left: 15px;">Gambar Motor</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="motor_gambar" id="motor_gambar" />
                                    <div class="gambar">
                                    </div>
                                        <span id="store_image"></span>
                                        <p style="color: red;" id="error_motor_gambar"></p>
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
    <script>
        $('[data-dismiss="modal"]').click(function(){
            //ERRORRRRRRRRR
            $('#error_paket_kode').empty();
            $('#error_motor_harga').empty();
            $('#error_motor_merk').empty();
            $('#error_motor_type').empty();
            $('#error_motor_warna_pilihan').empty();
            $('#error_motor_gambar').empty();
            $('#dataForm').trigger("reset");
        });
    </script>
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
                    {data: 'paket_kode', name: 'paket_kode'},
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
                $('#motor_merk').val('').trigger('change');
                $('#motor_type').val('').trigger('change');
                $('#motor_warna_pilihan').val('').trigger('change');
                $('.gambar').html('');
                //ERRORRRRRRRRR
                $('#error_paket_kode').html();
                $('#error_paket_harga_cash').html();
                $('#error_motor_harga').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#paket_kode').keypress(function(){
                    $('#error_paket_kode').css('display','none');
                });
                $('#paket_harga_cash').keypress(function(){
                    $('#error_paket_harga_cash').css('display','none');
                });
                $('#motor_type').change(function(){
                    $('#error_motor_type').css('display','none');
                });
                $('#motor_merk').change(function(){
                    $('#error_motor_merk').css('display','none');
                });
                $('#motor_harga').keypress(function(){
                    $('#error_motor_harga').css('display','none');
                });
                $('#motor_warna_pilihan').change(function(){
                    $('#error_motor_warna_pilihan').css('display','none');
                });
                $('#motor_gambar').change(function(){
                    $('#error_motor_gambar').css('display','none');
                });
            });
            

            //KETIKA BUTTON EDIT DI KLIK
        $('body').on('click', '.editData', function () {
            var motor_id = $(this).data('id');
            $.get("{{ url('admin/motor') }}" +'/' + motor_id +'/edit', function (data) {
                $('#saveBtn').show();
                $('#modelHeading').html("Edit Motor");
                $('#saveBtn').val("edit-user");
                $('#saveBtn').html("Edit Data");
                $('#ajaxModal').modal({backdrop: 'static', keyboard: false});
                $('#ajaxModal').modal('show');     
                $('#motor_warna_pilihan').val(data.warna);
                $('#motor_warna_pilihan').trigger('change');
                $('#motor_id').val(data.datamotor.id);                
                $('#paket_kode').val(data.datamotor.paket_kode);
                $('#paket_harga_cash').val(data.datamotor.paket_harga_cash);
                $('#motor_harga').val(data.datamotor.motor_harga);
                $('#motor_merk').val(data.datamotor.motor_merk);
                $('#motor_merk').trigger('change');
                $('#motor_type').val(data.datamotor.motor_type);
                $('#motor_type').trigger('change');
                $('.gambar').html('');
                $('.gambar').append("<input type='hidden' name='nama_gambar' id='nama_gambar' value='"+data.datamotor.motor_gambar+"' /><br><img src={{ URL::to('/') }}/images/" + data.datamotor.motor_gambar + " id='tampil_gambar' style='margin-top: -15px;' width='70' class='img-thumbnail' />");
                //ERRORRRRRRRRR
                $('#error_paket_kode').html();
                $('#error_paket_harga_cash').html();
                $('#error_motor_harga').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#paket_kode').keypress(function(){
                    $('#error_paket_kode').css('display','none');
                });
                $('#paket_harga_cash').keypress(function(){
                    $('#error_paket_harga_cash').css('display','none');
                });
                $('#motor_type').change(function(){
                    $('#error_motor_type').css('display','none');
                });
                $('#motor_merk').change(function(){
                    $('#error_motor_merk').css('display','none');
                });
                $('#motor_harga').keypress(function(){
                    $('#error_motor_harga').css('display','none');
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
                url: "{{ url('admin/motor-store') }}",
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
                    $('#error_paket_harga_cash').empty().show();
                    $('#error_motor_harga').empty().show();
                    $('#error_motor_merk').empty().show();
                    $('#error_motor_type').empty().show();
                    $('#error_motor_warna_pilihan').empty().show();
                    $('#error_motor_gambar').empty().show();
                    json = $.parseJSON(request.responseText);
                    console.log(json.errors);
                    $('#error_paket_kode').html(json.errors.paket_kode);
                    $('#error_paket_harga_cash').html(json.errors.paket_harga_cash);
                    $('#error_motor_harga').html(json.errors.motor_harga);
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
            var motor_id = $(this).data("id");
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
                        url: "{{ url('admin/motor-destroy') }}"+'/'+motor_id,
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

