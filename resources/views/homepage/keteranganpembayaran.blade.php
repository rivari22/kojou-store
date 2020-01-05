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
              <h1 class="h2">Order # {{ $transaction->id}}</h1>
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
              <p>Silahkan Lakukan pembaran melalui no Rekening 0232434.Apabila sudah melakukan pembayaran, sialhkan hubungi admin</a>
              <a href="https://api.whatsapp.com/send?phone=6287880005598&text=Halo%20admin%2C%20saya%20sudah%20melakukan%20pembayaran" class="btn btn-success">Hubungi admin</a>
              <form action="{{url('/cart/konfirmasi/'.$transaction->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
                <div class="form-group">
                <label for="foto">upload</label>
                <input type="file" name="foto">
                </div>
                @foreach($transactiondetail as $td)
                <div class="form-group">
                  <input type="hidden" value="{{$td->code}}" name="kode">
                </div>
                <!-- <div class="form-group">
                  <input type="hidden" value="{{$td->user_id}}" name="user_id">
                </div> -->
                <div class="form-group">
                  <input type="hidden" value="{{$td->qty}}" name="qty">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->subtotal}}" name="subtotal">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->name}}" name="name">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->address}}" name="address">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->portal_code}}" name="portal_code">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->ekspedisi}}" name="ekspedisi">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->product_id}}" name="product_id">
                </div>
                <div class="form-group">
                  <input type="hidden" value="{{$td->alamat_lengkap}}" name="alamat_lengkap">
                </div>
                @endforeach
                <div class="form-group">
                <button type="submit" name="submit">Submit</button>
                </div>
              </form>
              <div class="box">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th  colspan="2" class="border-top-0">Product</th>
                        <th class="border-top-0">Qty</th>
                        <th class="border-top-0">Price</th>
                        <th class="border-top-0">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
     
                    @php
                    $gt = 0;
                    @endphp
                    @foreach($transactiondetail as $td)
                    <tr>
                    
                    <td> <img src="{{ url($td->product->photo) }}" alt="Black Blouse Armani" class="img-fluid"> </td>
                    <td> {{ $td->product->name }}</td>
                    <td>{{ $td->qty }}</td>
                    <td> {{ number_format($td->product->price,2,",",".") }}</td>
                    <td>{{ number_format($td->subtotal,2,",",".") }}</td>
                    </tr>
                    <?php $gt = $gt + $td->subtotal;?>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4" class="text-right ">Order subtotal</th>
                        <th>{{ number_format($gt,2,",",".") }}</th>
                      </tr>
                      <tr>
                        <th colspan="4" class="text-right">Ongkir</th>
                        <th>{{ number_format($transaction->ekspedisi['value'],2,",",".") }}</th>
                      </tr>
                      <tr>
                        <th colspan="4" class="text-right">Grand Total</th>
                        <th><?php echo number_format($gt + $transaction->ekspedisi['value'], 2, ",", "."); ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row addresses">
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Pengirim</h3>
                    <p>
                    {{ $transaction->product->user->name }}<br>
                     {{ $transaction->product->user->address }}<br>	
                    {{ $transaction->ekspedisi['name'] }} <br>
                     {{ $transaction->ekspedisi['etd'] }} day <br>				    
                    </p>
                  </div>
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Penerima</h3>
                    <p> {{ $transaction->name }}(<strong>{{ $transaction->user->name}})</strong><br>
                        {{ $transaction->alamat_lengkap }}<br>
                        {{ $transaction->portal_code }}<br>
                        @if($transaction->status == 0)
                        Belum
                        @else
                        Lunas
                        @endif
                    </p>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Customer section</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a></li>
                    <li class="nav-item"><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a></li>
                    <li class="nav-item"><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
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