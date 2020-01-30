@extends('layouts.backend-baru')

@section('title')
    Kredit Paket
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data Kredit Paket</h4>
                        </div>
                        <div>
                            <ul>
                                <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <table class="table table-bordered data-table" width="100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Paket Kode</th>
                                        <th>Paket Harga Cash</th>
                                        <th>Paket Uang Muka</th>
                                        <th>Paket Jumlah Cicilan</th>
                                        <th>Paket Nilai Cicilan</th>
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
          ajax: "{{ url('admin/table/kriditpaket') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'paket_kode', name: 'paket_kode'},
              {data: 'paket_harga_cash', name: 'paket_harga_cash'},
              {data: 'paket_uang_muka', name: 'paket_uang_muka'},
              {data: 'paket_jumlah_cicilan', name: 'paket_jumlah_cicilan'},
              {data: 'paket_nilai_cicilan', name: 'paket_nilai_cicilan'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
});
</script>
@endsection