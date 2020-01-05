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
              <h3 class="card-title">Products</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>foto</th>
                  <th width="">Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th>Menu</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($user as $users)
                        <tr>
                            <td>{{$no++}}</td>
                            <td><img src="{{url($users->photo)}}" alt="" width="100px"></td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->username }}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->address}}</td>
                            <td>{{$users->gender}}</td>
                            <td> @if($users->status == 0)
                                    <a href="{{url('admin/user/status/'.$users->id)}}" class="text-danger"> Non Aktif</a>
                                 @else
                                 <a href="{{url('admin/user/status/'.$users->id)}}" class="text-primary"> Aktif</a>
                                 @endif
                            </td>
                            <td>{{$users->role}}</td>
                            <td><a href="{{url('admin/user/edit/'.$users->id)}}">Ubah</a>
                            <a href="{{url('admin/user/delete/'.$users->id)}}">Hapus</a>
                            </td>
                            </td>
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