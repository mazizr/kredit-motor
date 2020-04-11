@extends('layouts.backend')

@section('title')
    Pembeli
@endsection

@section('content')
<!-- Main content -->
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <br/>
                <a class="btn btn-primary btn-flat btn-sm kepala teks-putih" data-original-title="Tambah Data" href="{{ url('/admin/beli_cash') }}">
                    Beli Cash
                </a> &nbsp;
                <a class="btn btn-primary btn-flat btn-sm kepala teks-putih" data-original-title="Tambah Data" href="{{ url('/admin/beli_cicilan') }}">
                    Beli Cicilan
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
                        <th>Pembeli No KTP</th>
                        <th>Pembeli Nama</th>
                        <th>Pembeli Alamat</th>
                        <th>Pembeli Telepon</th>
                        <th>Status</th>
                    </tr>
                </thead>  
                <tbody>
                        
                </tbody>            
            </table>
        </div>
    </div>

@endsection

@section('js')
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
                ajax: "{{ url('admin/pembeli') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'pembeli_No_KTP', name: 'pembeli_No_KTP'},
                    {data: 'pembeli_nama', name: 'pembeli_nama'},
                    {data: 'pembeli_alamat', name: 'pembeli_alamat'},
                    {data: 'pembeli_telepon', name: 'pembeli_telepon'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
    });
    </script>
@endsection