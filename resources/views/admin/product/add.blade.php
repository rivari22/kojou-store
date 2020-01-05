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
                <h3 class="card-title">Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name Product">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea id="my-editor" name="description" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                    <!-- <textarea name="description" id="" cols="" rows="" class="form-control"></textarea> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" class="form-control" name="stock" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input type="number" class="form-control" name="weight" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori / Subkategori</label>
                    <select name="category_id" class="form-control">
                    @foreach($category as $categoryAnak)
                      <option value="{{$categoryAnak->id}}">{{$categoryAnak->name}}</option>
                      @foreach($categoryAnak->children as $subCategory)
                      <option value="{{$subCategory->id}}"> - {{$subCategory->name}}</option>
                      @endforeach
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="file" class="form-control" name="photo" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto 2</label>
                    <input type="file" class="form-control" name="photo2" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto 3</label>
                    <input type="file" class="form-control" name="photo3" placeholder="">
                  </div>
                  <button name="submit">Tambah</button>
                  </form>
                </div>
                <!-- /.card-body -->
    </div>
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>

  <!-- CKEditor init -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
    $('textarea[name=description]').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>

 

  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
  </script>

    @endsection
@show