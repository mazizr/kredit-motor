@extends('layouts.backend-baru')

@section('title')
    Pembeli
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data Pembeli</h4>
                        </div>
                        <div>
                            <ul>
                                <li class="d-inline-block mr-3">
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <table class="table table-bordered data-table" width="100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Pembeli No KTP</th>
                                        <th>Pembeli Nama</th>
                                        <th>Pembeli Alamat</th>
                                        <th>Pembeli Telepon</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                        
                                </tbody>            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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