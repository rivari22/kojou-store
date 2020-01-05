@extends('admin.layout.master')
    @section('header')

    @endsection

    @section('body')
    <!-- Default box -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($product)}}</h3>

                <p>Produk
                  </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer">Informasi tambahan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{count($category)}}</h3>

                <p>Kategori dan Subkategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('category.index')}}" class="small-box-footer">Informasi tambahan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($transaction)}}<sup style="font-size: 20px"></sup></h3>

                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('transaction.index')}}" class="small-box-footer">Informasi tambahan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($user)}}</h3>

                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.user')}}" class="small-box-footer">Informasi tambahan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>

  <!--  <div class="card">
        <div class="card-header">
          <h3 class="card-title">Dashboard</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          Selamat datang rivari22
        </div>
         /.card-body 
        <div class="card-footer">
          Footer
        </div>
         /.card-footer
      </div>
       /.card -->
    @endsection

    @section('footer')

    @endsection
@show