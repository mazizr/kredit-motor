@extends('layouts.backend-baru')

@section('title')
    Cicilan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data Beli Cicilan</h4>
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
                                        <th>Kode Cicilan</th>
                                        <th>Kredit Kode</th>
                                        <th>Tanggal Cicilan</th>
                                        <th>Jumlah Cicilan</th>
                                        <th>Cicilan Ke</th>
                                        <th>Sisa Cicilan Ke</th>
                                        <th>Sisa Harga Cicilan</th>
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
          ajax: "{{ url('admin/belicicilan') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'cicilan_kode', nama: 'cicilan_kode'},
              {data: 'id_kridit_kode', name: 'id_kridit_kode'},
              {data: 'cicilan_tanggal', name: 'cicilan_tanggal'},
              {data: 'cicilan_ke', name: 'cicilan_ke'},
              {data: 'cicilan_sisa_ke', name: 'cicilan_sisa_ke'},
              {data: 'cicilan_sisa_harga', name: 'cicilan_sisa_harga'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
});
</script>
@endsection