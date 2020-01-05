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
              <h3 class="card-title">Produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>foto</th>
                  <th width="">produk</th>
                  <th>stok</th>
                  <th>Berat</th>
                  <th>user</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($product as $item)
                      <tr>
                        <td>{{$no++}}</td>
                        <td><img src="{{url($item->photo)}}" alt="" width="100px"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->stock}}</td>
                        <td>{{$item->weight}}</td>
                        <td>{{$item->user->name}}</td>
                        <td> 
                        <form action="{{route('product.destroy',$item->id)}}" method="POST">
                        <a href="{{url('admin/product/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">Ubah</a>
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" value="delete" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
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