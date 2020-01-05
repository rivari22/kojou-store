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
              <h1 class="h2">Pesanan Saya</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Pesanan Saya</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead"></p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                      <th width="5px">No</th>
                  <th>Code</th>
                  <th width="">member</th>
                  <th>Ekspedisi</th>
                  <th>Status</th>
                  <th colspan="2">Aksi</th>
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
                                <a href="#" class="btn btn-outline-primary">Belum Dibayar</a>
                            @else
                                <a href="#" class="btn btn-outline-danger">Dalam proses pengiriman</a>
                            @endif
                        </td>
                        <td><a href="{{url('/cart/detailtransaksi/'.$transactions->code)}}" class="btn btn-sm btn-success">Detail</a></td>
                        <td>
                        @if($transactions->status==0)
                        <a href="{{url('/cart/confirmation/'.$transactions->code)}}" class="btn btn-success">Konfirmasi pembayaran</a>
                        @else
                        @endif
                        </td>
                        <!-- <td><span class="badge badge-info">Being prepared</span></td>
                        <td><a href="customer-order.html" class="btn btn-template-outlined btn-sm">View</a></td> -->
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
              <div class="panel-heading">
                  <h3 class="h4 panel-title">Menu</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                  <li class="nav-item"><a href="{{ url('myprofil') }}" class="nav-link"><i class="fa fa-user"></i>Akun saya</a></li>
                    <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link active "><i class="fa fa-list"></i>Pesanan Saya</a></li>

                    <!-- <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- GET IT-->
      <div class="get-it">
        <div class="container">
          <div class="row">


        </div>
      </div>
@endsection

@section('footer')

@endsection

@show