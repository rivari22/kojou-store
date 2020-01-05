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
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('category.update',$category->id)}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category / Subcategory" value="{{$category->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Enter Slug" value="{{$category->slug}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control" name="icon" placeholder="Enter Icon font awesome" value="{{$category->icon}}">
                  </div>
                  <div class="form-group">
                    
                        @if($category->parent_id == null)
                        <input type="hidden" name="parent_id" value="">
                        @else
                        <label for="exampleInputEmail1">Parent Category</label>
                        <select name="parent_id" id="" class="form-control">
                        @foreach($categorys as $aw)
                        <option value="{{$aw->id}}"
                            @if ($aw->id == $category->parent_id)
                            selected="selected";
                            @endif
                        >{{$aw->name}}</option>
                            @endforeach
                        </select>
                        @endif

                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div>
   
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