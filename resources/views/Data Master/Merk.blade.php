@extends('layouts.backend')

@section('title')
    Brand
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
                        <th width="15%">Kode Brand</th>
                        <th width="30%">Nama Brand</th>
                        <th width="25%">Gambar</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>  
                <tbody>
                        
                </tbody>            
            </table>
        </div>
    </div>
    
    <!-- bagian modal-->
    <div class="modal fade" id="ajaxModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
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
                    <input type="hidden" name="merk_id" id="merk_id">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="name" class="control-label">Kode Brand</label>
                                    <input type="text" class="form-control" id="kode_merk" name="kode_merk" placeholder="Masukkan Kode Merk" 
                                     maxlength="3" required="">
                                    <p style="color: red;" id="error_kode_merk"></p>
                                </div>

                                <div class="col-sm-6">
                                    <label for="name" class="control-label">Nama Brand</label>
                                    <input type="text" required class="form-control" name="nama_merk" id="nama_merk">
                                    <p style="color: red;" id="error_nama_merk"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="name" class="control-label">Gambar Brand</label>
                                    <input type="file" class="form-control" name="gambar_merk" id="gambar_merk" />
                                    <div class="gambar">
                                    </div>
                                        <span id="store_image"></span>
                                        <p style="color: red;" id="error_gambar_merk"></p>
                                </div>

                                <div class="col-sm-4">
                                    <img id="blah" style="width: 800px; height: 100px;" class="img-thumbnail" src="#" alt="your image" />
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <p id="salah" style="color: red"></p>
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
        
        $("#gambar_merk").change(function(){
            readURL(this);
        });
    </script>
    <script>
        $('[data-dismiss="modal"]').click(function(){
            //ERRORRRRRRRRR
            $('#error_kode_merk').empty();
            $('#error_nama_merk').empty();
            $('#error_gambar_merk').empty();
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
                ajax: "{{ url('admin/merk') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'kode_merk', name: 'kode_merk'},
                    {data: 'nama_merk', name: 'nama_merk'},
                    {
                        data: 'gambar_merk',
                        name: 'gambar_merk',
                        render: function(data, type, full, meta){
                        return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
                        },
                        orderable: false
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            //KETIKA BUTTON TAMBAH DI KLIK
            $('#buatbaru').click(function () {
                $('#saveBtn').show();
                $('#saveBtn').val("create-product");
                $('#saveBtn').html("Simpan Data");
                $('#dataForm').trigger("reset");
                $('#modelHeading').html("Tambah Data");
                $('#ajaxModal').modal({backdrop: 'static', keyboard: false});
                $('#ajaxModal').modal('show');
                $('#blah').attr('src', '#');
                $('#merk_id').val('');
                $('#nama_merk').val('');
                $('.gambar').html('');
                //ERRORRRRRRRRR
                //ERRORRRRRRRRR
                $('#error_kode_merk').html();
                $('#salah').html('');
                $('#error_nama_merk').html();
                $('#error_gambar_merk').html();

                $('#kode_merk').keypress(function(){
                    $('#error_kode_merk').css('display','none');
                    $('#salah').css('display','none');
                });
                
                $('#nama_merk').change(function(){
                    $('#error_nama_merk').css('display','none');
                    $('#salah').css('display','none');
                });
                
                
                $('#gambar_merk').change(function(){
                    $('#error_gambar_merk').css('display','none');
                });
            });
            
            

            //KETIKA BUTTON EDIT DI KLIK
        $('body').on('click', '.editData', function () {
            var merk_id = $(this).data('id');
            $.get("{{ url('admin/merk') }}" +'/' + merk_id +'/edit', function (data) {
                $('#saveBtn').show();
                $('#modelHeading').html("Edit Merk");
                $('#saveBtn').val("edit-user");
                $('#saveBtn').html("Edit Data");
                $('#ajaxModal').modal({backdrop: 'static', keyboard: false});
                $('#ajaxModal').modal('show');   
                $('#kode_merk').prop('disabled', false); 
                console.log(data);
                $('#merk_id').val(data.id);                
                $('#kode_merk').val(data.kode_merk);
                $('#nama_merk').val(data.nama_merk);
                $('#blah').show();
                $('#blah').attr('src', '{{ URL::to("/") }}/images/' + data.gambar_merk);
                $('.gambar').html('');
                $('.gambar').append("<input type='hidden' name='nama_gambar' id='nama_gambar' value='"+data.gambar_merk+"' />");
                //ERRORRRRRRRRR
                $('#error_kode_merk').html();
                $('#salah').html('');
                $('#error_nama_merk').html();
                $('#error_gambar_merk').html();

                $('#kode_merk').keypress(function(){
                    $('#error_kode_merk').css('display','none');
                    $('#salah').css('display','none');
                });
                
                $('#nama_merk').change(function(){
                    $('#error_nama_merk').css('display','none');
                    $('#salah').css('display','none');
                });
                
                
                $('#gambar_merk').change(function(){
                    $('#error_gambar_merk').css('display','none');
                });
            })
        });

            //KETIKA BUTTON SAVE DI KLIK
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var formData = new FormData($('#dataForm')[0]);
                $.ajax({
                data: formData,
                url: "{{ url('admin/merk-store') }}",
                type: "POST",
                dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data[0] == 500) {
                        $('#saveBtn').show();
                        $('#salah').html('');
                        $('#salah').show();
                        $('#salah').append('<p>'+data.errors+'</p>');
                    }else {
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
                    $('#error_kode_merk').empty().show();
                    $('#error_nama_merk').empty().show();
                    $('#error_gambar_merk').empty().show();
                    json = $.parseJSON(request.responseText);
                    console.log(json.errors);
                    $('#error_kode_merk').html(json.errors.kode_merk);
                    $('#error_nama_merk').html(json.errors.nama_merk);
                    $('#error_gambar_merk').html(json.errors.gambar_merk);
                    $("#result").html('');
                    $('#saveBtn').html('Simpan Data');
            }
            });
            });

            //KETIKA BUTTON DELETE DI KLIK
        $('body').on('click', '.deleteData', function () {
            var merk_id = $(this).data("id");
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
                        url: "{{ url('admin/merk-destroy') }}"+'/'+merk_id,
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

