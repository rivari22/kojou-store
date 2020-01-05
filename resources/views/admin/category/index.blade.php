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
    <div class="col-md-6">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Kategori dan Subkategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('admin/category')}}" method="POST">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category / Subcategory">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control" name="icon" placeholder="Enter Icon font awesome">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Parent Category / New Category</label>
                    <select name="parent_id" class="form-control">
                    <option value=""><p class='merah'> Kategori baru </p></option>
                    @foreach($category as $categoryAnak)
                      <option value="{{$categoryAnak->id}}">{{$categoryAnak->name}}</option>
                    @endforeach
                    </select>
                    <p class="merah">*pilih 'Kategori baru' untuk membuat kategori baru</p>
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div>
    <div class="col-md-6">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th width="">Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach($category as $categoryAnak)
                    <tr>
                        <td width="40px">{{ $no++ }}</td>
                        <td>{{ $categoryAnak->name }}
                        <ul>
                        @foreach($categoryAnak->children as $subCategory)
                        <li>{{$subCategory->name}}</li>
                        @endforeach
                        </ul>
                        </td>
                        <td>
                        <form action="{{route('category.destroy',$categoryAnak->id)}}" method="POST">
                        <a href="{{url('admin/category/'.$categoryAnak->id.'/edit')}}" class="btn btn-primary btn-xs">Ubah</a>
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                        <button type="submit" value="Delete" class="btn btn-danger btn-xs">Hapus</button>
                        </form>
                        <ul>
                        @foreach($categoryAnak->children as $subCategory)
                        <form action="{{route('category.destroy',$subCategory->id)}}" method="POST">
                        <li class="table_list" style="margin-left: -42px">
                        <a href="{{url('admin/category/'.$subCategory->id.'/edit')}}" class="btn btn-primary btn-xs">Ubah</a>
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" value="Delete" class="btn btn-danger btn-xs">Hapus</button></li>
                        @endforeach
                        </ul>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      </div>
    </div>
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