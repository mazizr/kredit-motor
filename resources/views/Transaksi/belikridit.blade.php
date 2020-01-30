@extends('layouts.backend-baru')

@section('title')
    Kredit
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data Beli Kredit</h4>
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
                                        <th>Kode Kredit</th>
                                        <th>No KTP Pembeli</th>
                                        <th>Paket Kode</th>
                                        <th>Kode Motor</th>
                                        <th>Kredit Tanggal</th>
                                        <th>Fotokopi KTP</th>
                                        <th>Fotokopi KK</th>
                                        <th>Fotokopi Slip Gaji</th>
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
          ajax: "{{ url('admin/belikridit') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'kridit_kode', nama: 'kridit_kode'},
              {data: 'id_pembeli_No_KTP', name: 'id_pembeli_No_KTP'},
              {data: 'id_paket_kode', name: 'id_paket_kode'},
              {data: 'id_motor_kode', name: 'id_motor_kode'},
              {data: 'kridit_tanggal', name: 'kridit_tanggal'},
              {data: 'fotokopi_KTP', name: 'fotokopi_KTP'},
              {data: 'fotokopi_KK', name:'fotokopi_KK'},
              {data: 'fotokopi_slip_gaji', name:'fotokopi_slip_gaji'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
});
</script>
@endsection