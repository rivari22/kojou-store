@extends('admin.layout.master')
    @section('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <style>
    .table_list {
      List-style: none;
      padding: 3px;
      margin-left: -30px;
    }
    .merah {
      color: red;
    }
  </style>

    @endsection

    @section('body')
    <div class="row">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>Kode</th>
                  <th width="">Pengguna</th>
                  <th>Ekspedisi</th>
                  <th>Status</th>
                  <th>Menu</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($transaction as $transactions)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$transactions->code}}</td>
                        <td>{{$transactions->user['name']}}</td>
                        <td>{{$transactions->ekspedisi['name']}}</td>
                        <td>
                            @if($transactions->status==0)
                                <a href="{{url('admin/transaction/'.$transactions->code.'/'.$transactions->status)}}" class="btn btn-outline-primary">Belum Dibayar</a>
                            @else
                                <a href="{{url('admin/transaction/'.$transactions->code.'/'.$transactions->status)}}" class="btn btn-outline-danger">Sudah Dibayar</a>
                            @endif
                        </td>
                        <td><a href="{{url('admin/transaction/'.$transactions->code.'/detail/data')}}" class="btn btn-sm btn-success"></a>Rincian</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            </div>

            </div>
            </div>
            </div>
            </div>
            </div>

            <!-- /.card-body -->
        <!-- /.col -->
    <!-- Default box -->
   
    @endsection

    @section('footer')
    <!-- DataTables -->
<script src="{{asset('static/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
    @endsection
@show