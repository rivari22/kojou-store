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
              <h1 class="h2">Formulir Pemesanan</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item active">Formulir</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-lg-12">
              
            </div>
            <form action="{{ url('cart/transaction') }}" method="POST">
              {{ csrf_field() }}
            <div id="basket" class="col-lg-12">
              <div class="box mt-0 pb-0 no-horizontal-padding">
                <div class="content">
                <!-- <div class="col-lg-12">
              <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <br>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
             </div> -->
                   <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="company">Nama(Member)</label>
                               <input id="street" type="text" class="form-control" name="" value="{{ Auth::user()->name }}" readonly="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="street">Email(Member)</label>
                          <input id="street" type="text" class="form-control" name="" value="{{ Auth::user()->email }}" readonly="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="firstname">Nama Penerima</label>
                          <input id="firstname" type="text" name="name" class="form-control" placeholder="Masukan Nama Penerima">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="firstname">Kota</label>
                         <select class="form-control" onchange="check()" id="city" name="city">
                              @php
                                  $city = city();
                                  $city = json_decode($city,true);
                              @endphp
                              @foreach($city['rajaongkir']['results'] as $citys)
                                <option value="{{ $citys['city_id'] }}">{{ $citys['city_name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="company">Provinsi</label>
                           <input type="text" value="" class="form-control" id="provinsi" readonly="">
                        </div>
                      </div>
                      <!-- <div class="col-sm-6">
                        <div class="row"> -->
                          <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                              <label for="zip">Kode POS</label>
                              <input placeholder="masukan kode pos" type="text" class="form-control" name="portal_code" id="portal_code">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="city" >Ekspedisi</label>
                          <select class="form-control" name="eks">
                            <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                            <option value="pos">POS Indonesia (POS)</option>
                            <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                          </select>
                        </div>
                      </div>
                        </div>
                      <!-- </div>
                    </div> -->
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="company">Alamat Lengkap</label>
                               <input id="alamat" type="text" class="form-control" name="alamat" value="" placeholder="masukan alamat lengkap penerima" >
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-2">
                        <div class="form-group">
                        <label for="company">Ukuran sepatu</label>
                        <br>
                          <select class="select" name="size">
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      @if(Cart::count() >= 2)
                      <div class="col-sm-2">
                        <div class="form-group">
                        <label for="company">Ukuran sepatu kedua</label>
                        <br>
                          <select class="select" name="size2">
                          <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      @else

                      @endif
                      @if(Cart::count() >= 3)
                      <div class="col-sm-2">
                        <div class="form-group">
                        <label for="company">Ukuran sepatu ketiga</label>
                        <br>
                          <select class="select" name="size3">
                          <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      
                      @else

                      @endif
                      @if(Cart::count() >= 4)
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                        <label for="company">Ukuran sepatu keempat</label>
                        <br>
                          <select class="select" name="size4">
                          <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      @else

                      @endif
                      @if(Cart::count() >= 5)
                      <div class="col-sm-2">
                        <div class="form-group">
                        <label for="company">Ukuran sepatu kelima</label>
                        <br>
                          <select class="select" name="size5">
                          <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      @else

                      @endif
                      </div>
                      <div class="row">
                      <p style="color: red;"> *Harap mengisi semua kolom yang ada</p></div>
                      
                    <div class="row">
                      <div class="col-sm-3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                    </div>
                  </form>
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
                    <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link "><i class="fa fa-list"></i>Pesanan Saya</a></li>

                    <!-- <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div> 
@endsection

@section('footer')
  <script type="text/javascript">
    function check (){
      var id = $("#city").val();
      $.ajax({
        type: "GET",
        url : "{{ url('citybyid/') }}/"+id,
        dataType : "JSON",
        success:function(data){
          $("#provinsi").val(data.rajaongkir.results.province)
          $("#portal_code").val(data.rajaongkir.results.postal_code)
        }
      });
    }
  </script>
@endsection
@show