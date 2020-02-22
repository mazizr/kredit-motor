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
                        <th width="5%">No</th>
                        <th width="15%">Kode Motor</th>
                        <th width="10%">Merk</th>
                        <th width="22%">Tipe</th>
                        <th width="10%">Warna</th>
                        <th width="10%">Harga</th>
                        <th width="12%">Gambar</th>
                        <th width="25%">Opsi</th>
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
                    <input type="hidden" name="motor_id" id="motor_id">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Kode Motor</label>
                                    <input type="text" class="form-control allownumericwithoutdecimal" id="motor_kode" name="motor_kode" placeholder="Masukkan Kode Motor" 
                                     maxlength="4" required="">
                                    <p style="color: red;" id="error_motor_kode"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Tipe Motor</label>
                                    <input type="text" required class="form-control" name="motor_type" id="motor_type">
                                    <p style="color: red;" id="error_motor_type"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name" class="control-label">Harga Motor</label>
                                    <input type="text" class="form-control number" id="motor_harga" name="motor_harga" placeholder="Masukkan Harga Motor" 
                                    maxlength="50" required="">
                                    <p style="color: red;" id="error_motor_harga"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="name" class="control-label" style="margin-top: 1px; margin-bottom: 11px;">Brand Motor</label>
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

                                <div class="col-sm-6">
                                    <label for="name" class="control-label" style="margin-left: 10px;">Warna Motor</label>
                                    <div class="input-group margin">
                                        <div class="input-group-btn">
                                            <button id="add-new-event" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Warna 
                                                <span class="fa fa-caret-down"></span>
                                            </button>
                                            <ul class="dropdown-menu col-md-12">
                                                <li>
                                                    <ul class="fc-color-picker" id="color-chooser">
                                                        <li><a style="margin-left: 3px; color: blue;" href="#"><i class="fa fa-square"></i></a></li>
                                                        <li><a style="color: red;" href="#"><i class="fa fa-square"></i></a></li>
                                                        <li><a style="color: black;" href="#"><i class="fa fa-square"></i></a></li>
                                                        <li><a style="color: yellow;" href="#"><i class="fa fa-square"></i></a></li>
                                                        <li><a style="color: green;" href="#"><i class="fa fa-square"></i></a></li>
                                                      </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" value="" name="motor_warna_pilihan" id="motor_warna_pilihan" class="form-control">
                                    </div>
                                    {{-- <select type="text" class="form-control select2" id="motor_warna_pilihan" style="width: 100%;" name="motor_warna_pilihan" placeholder="" value="" maxlength="50" required="">
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
                                    </select> --}}
                                    <p style="color: red;" id="error_motor_warna_pilihan"></p>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="name" class="control-label">Gambar Motor</label>
                                    <input type="file" class="form-control" name="motor_gambar" id="motor_gambar" />
                                    <div class="gambar">
                                    </div>
                                        <span id="store_image"></span>
                                        <p style="color: red;" id="error_motor_gambar"></p>
                                </div>

                                <div class="col-sm-3">
                                    <img id="blah" style="width: 800px; height: 120px;" class="img-thumbnail" src="#" alt="your image" />
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
        $('#motor_warna_pilihan').prop('disabled', true);
        $('#blah').hide();
        function readURL(input) {
            if (input.files && input.files[0]) {
                $('#blah').show();
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#motor_gambar").change(function(){
            readURL(this);
        });
    </script>
    <script>
        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        $('#motor_warna_pilihan').prop('disabled', false);
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        console.log(currColor);
        $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
        if (currColor == 'rgb(0, 0, 0)'){
            var warna = 'Hitam';
            console.log(warna);
            $('#motor_warna_pilihan').val(warna);
        } if (currColor == 'rgb(255, 0, 0)'){
            var warna = 'Merah';
            console.log(warna);
            $('#motor_warna_pilihan').val(warna);
        } if (currColor == 'rgb(0, 0, 255)'){
            var warna = 'Biru';
            console.log(warna);
            $('#motor_warna_pilihan').val(warna);
        } if (currColor == 'rgb(255, 255, 0)'){
            var warna = 'Kuning';
            console.log(warna);
            $('#motor_warna_pilihan').val(warna);
        } if (currColor == 'rgb(0, 128, 0)'){
            var warna = 'Hijau';
            console.log(warna);
            $('#motor_warna_pilihan').val(warna);
        } 
        
        })
        
    </script>
    <script>
        $('[data-dismiss="modal"]').click(function(){
            //ERRORRRRRRRRR
            $('#error_motor_kode').empty();
            $('#error_motor_harga').empty();
            $('#error_motor_merk').empty();
            $('#error_motor_type').empty();
            $('#error_motor_warna_pilihan').empty();
            $('#error_motor_gambar').empty();
            $('#dataForm').trigger("reset");
            $('#blah').hide();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            //INDEX TABEL
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/motor') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'motor_kode', name: 'motor_kode'},
                    {data: 'motor_merk', name: 'motor_merk'},
                    {data: 'motor_type', name: 'motor_type'},
                    {data: 'motor_warna_pilihan', name: 'motor_warna_pilihan'},
                    {data: 'motor_harga', name: 'motor_harga'},
                    {
                        data: 'motor_gambar',
                        name: 'motor_gambar',
                        render: function(data, type, full, meta){
                        return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
                        },
                        orderable: false
                    },
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
                $('#motor_kode').prop('disabled', true);
                $('#motor_warna_pilihan').prop('disabled', true);
                var currColor = '#3c8dbc' //Red by default
                //Save color
                currColor = $(this).css('color')
                $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor });
                $('#blah').attr('src', '#');
                $('#motor_merk').val('').trigger('change');
                $('#motor_warna_pilihan').val('').trigger('change');
                $('.gambar').html('');
                //ERRORRRRRRRRR
                $('#error_motor_kode').html();
                $('#error_motor_harga').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#motor_kode').keypress(function(){
                    $('#error_motor_kode').css('display','none');
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

                $('#motor_merk').on('change', function(){
                    var motor_merk = $(this).val();
                    $.ajax({
                        url: "{{ url('/admin/motor-isi') }}"+'/'+motor_merk,
                        method: "GET",
                        dataType: "json",
                        success: function (berhasil) {
                            $('#motor_kode').prop('disabled', false);
                            console.log(berhasil);
                            $('#motor_kode').val(berhasil);
                        }
                    });
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
                $('#motor_kode').prop('disabled', false); 
                $('#motor_warna_pilihan').prop('disabled', true); 
                $('#backnya').css('background-color', data.datamotor.motor_warna_pilihan);
                console.log(data.datamotor.motor_warna_pilihan);
                $('#motor_warna_pilihan').val(data.datamotor.motor_warna_pilihan);
                $('#motor_id').val(data.datamotor.id);                
                $('#motor_kode').val(data.datamotor.motor_kode);
                $('#motor_harga').val(data.datamotor.motor_harga);
                $('#motor_merk').val(data.datamotor.motor_merk);
                $('#motor_merk').trigger('change');
                $('#motor_type').val(data.datamotor.motor_type);
                $('#motor_type').trigger('change');
                $('#blah').show();
                $('#blah').attr('src', '{{ URL::to("/") }}/images/' + data.datamotor.motor_gambar);
                $('.gambar').html('');
                $('.gambar').append("<input type='hidden' name='nama_gambar' id='nama_gambar' value='"+data.datamotor.motor_gambar+"' /><input type='hidden' name='warnanya' id='nama_warna' value='"+data.datamotor.motor_warna_pilihan+"' />");
                //ERRORRRRRRRRR
                $('#error_motor_kode').html();
                $('#error_motor_harga').html();
                $('#error_motor_merk').html();
                $('#error_motor_type').html();
                $('#error_motor_warna_pilihan').html();
                $('#error_motor_gambar').html();

                $('#motor_kode').keypress(function(){
                    $('#error_motor_kode').css('display','none');
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
                        $('#error_motor_kode').html('');
                        $('#error_motor_kode').show();
                        $('#error_motor_kode').append('<p>'+data.errors+'</p>');
                    } else {
                        $('#blah').hide();
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
                    $('#error_motor_kode').empty().show();
                    $('#error_motor_harga').empty().show();
                    $('#error_motor_merk').empty().show();
                    $('#error_motor_type').empty().show();
                    $('#error_motor_warna_pilihan').empty().show();
                    $('#error_motor_gambar').empty().show();
                    json = $.parseJSON(request.responseText);
                    console.log(json.errors);
                    $('#error_motor_kode').html(json.errors.motor_kode);
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

