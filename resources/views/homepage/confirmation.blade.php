@extends('homepage.index')
@section('header')
    <title>Kojou.store</title>

@endsection
@section('slide')
 
@endsection
@section('contents')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Order # {{ $transaction->code}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="customer-orders.html">Rincian Pesanan</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="customer-order" class="col-lg-9">
              <p>Silahkan Melakukan pembayaran melalui Atm Transfer:
               <br><b>BCA 1650301613 atas nama Muchammad Rivari </b> <br>
               <b> Ovo 087880005598 atas nama Muchammad Rivari </b> <br>
                sialhkan kirim bukti pembayaran dengan cara hubungi admin jika sudah melakukan pembayaran</a>
              <a href="https://api.whatsapp.com/send?phone=6287880005598&text=Halo%20admin%2C%20saya%20sudah%20melakukan%20pembayaran" class="btn btn-success" target="_blank">Konfirmasi pembayaran</a>
              <div class="box">
                <div class="table-responsive">

                </div>
                
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
              <div class="panel-heading">
                  <h3 class="h4 panel-title">Menu</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                  <li class="nav-item"><a href="{{ url('myprofil') }}" class="nav-link"><i class="fa fa-user"></i>Akun saya</a></li>
                    <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link "><i class="fa fa-list"></i>Pesanan Saya</a></li>

                    <!-- <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li> -->
                  </ul>
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