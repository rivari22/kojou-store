@extends('homepage.index')
@section('header')
<title>Kojou.store</title>

@endsection

@section ('slide')
    
@endsection

@section('contents')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Keranjang Belanja</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Keranjang Belanja</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-lg-12">
              <p class="text-muted lead">Anda mempunyai {{Cart::count()}} barang di keranjang.</p>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box mt-0 pb-0 no-horizontal-padding">

              <form action="{{url('/cart/update')}}" method="post">
              {{csrf_field()}}
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Jumlah</th>
                          <th>Harga Barang</th>
                          <th colspan="">Subtotal</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach(Cart::content() as $row) :?>
                        <tr>
                          <!-- <td><a href="#"><img src="#" alt="White Blouse Armani" class="img-fluid"></a></td> -->
                          <td colspan="2"><a href="#">{{$row->name}}</a></td>
                          <td>
                            <input type="hidden" name="rowid" value="{{$row->rowId}}">
                            <input type="number" value="{{$row->qty}}" class="form-control" name="qty">
                          </td>
                          <td>Rp{{$row->price}}</td>
                          <td>Rp<?php echo $row->total; ?></td>

                          <td>
                          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-refresh">Perbarui</i></button>
                          <a href="{{url('/cart/delete/'.$row->rowId)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o">Hapus</i></a>
                          </form>
                          </td>


                        </tr>
                        <?php endforeach;?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Total</th>
                          <th colspan="2">Rp<?php echo Cart::total(); ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="box-footer d-flex justify-content-between align-items-center">
                    <div class="left-col"><a href="{{url('/product')}}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Lanjutkan Belanja</a></div>
                    <div class="right-col">
                      <!-- <button class="btn btn-secondary"><i class="fa fa-refresh"></i> Update cart</button> -->
                      <a href="{{url('/cart/formulir')}}" class="btn btn-template-outlined">Lanjutkan untuk checkout <i class="fa fa-chevron-right"></i></a>
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>Rincian Belanja</h3>
                </div>
                <p class="text-muted">Pengiriman dan biaya tambahan dihitung berdasarkan nilai yang telah Anda masukkan.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Subtotal Pesanan</td>
                        <th>Rp{{Cart::total()}}</th>
                      </tr>
                      <tr>
                        <td>Pengiriman</td>
                        <th>Akan dihitung ditahap selanjutnya</th>
                      </tr>
                      <tr>
                        <td>Pajak</td>
                        <th>Harga barang sudah termasuk pajak</th>
                      </tr>
                      <tr class="total">
                        <td>Total Sementara</td>
                        <th>Rp{{Cart::total()}}</th>
                      </tr>
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

@section('footer')

@endsection

@show