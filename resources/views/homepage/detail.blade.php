@extends('homepage.index')
@section('header')
<title>Kojou.store </title>
@endsection
@section ('slide')
    
@endsection

@section('contents')

<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{$products->name}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="shop-category.html">Produk</a></li>
                <li class="breadcrumb-item"><a href="shop-category.html">Detail</a></li>
                <li class="breadcrumb-item active">{{$products->name}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
            <p class="lead">Produk bisa didapat dengan cara Pre-Order, karena barang tersebut tidak tersedia di Indonesia. Estimasi sampai 2-4 minggu dengan cara handcarry. Jika sudah sampai di Indonesia, barang akan dikirim melalui ekspedisi yang telah anda pilih.</p>
              <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Klik disini untuk menuju ke rincian produk</a></p>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div> <img src="{{url($products->photo)}}" alt="" class="img-fluid"></div>
                    <div> <img src="{{url($products->photo2)}}" alt="" class="img-fluid"></div>
                    <div> <img src="{{url($products->photo3)}}" alt="" class="img-fluid"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="box">
                    <form action="{{url('/cart')}}" method="POST">
                    {{csrf_field()}}
                      <p class="price">Rp{{number_format($products->price)}}</p>
                      <div class="sizes">
                        <h6>stock:{{$products->stock}}</h6>
                          <select class="select" name="qty">
                            <?php for($i=1; $i<$products->stock; $i++){
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            }?>
                          </select>
                          <br>
                          <br>
                      </div>

                      <input type="hidden" name="id" value="{{$products->id}}">
                      <div class="sizes">
                        <h4>Pre-order estimasi 30 hari</h4>
                        <!-- <select class="bs-select">
                          <option value="small">JNE</option>

                           <option value="medium">TIKI</option>
                          <option value="large">POS</option>
                        </select> -->
                      </div>
                      <br>
                      <p class="text-center">
                      @if(Auth::user())
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Tambahkan ke keranjang</button>
                      @else
                        <!-- <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button> -->
                        <small>Masuk terlebih dahulu untuk melakukan transaksi</small>
                      @endif
                      </p>
                    </form>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">
                    <button class="owl-thumb-item"><img src="{{url($products->photo)}}" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="{{url($products->photo2)}}" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="{{url($products->photo3)}}" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="details" class="box mb-4 mt-4">
                <p></p>
                <h4>Keterangan produk</h4>
                <p>{!!$products->description!!}</h4>
                <!-- <h4>Size & Fit</h4>
                <ul>
                  <li>Regular fit</li>
                  <li>The model (height 5'8 "and chest 33") is wearing a size S</li>
                </ul> -->
                <blockquote class="blockquote">
                  <p class="mb-0"><em>Tuliskan ukuran sepatu diformulir pemesanan ditahap selanjutnya</em></p>
                </blockquote>
              </div>
              <div id="product-social" class="box social text-center mb-5 mt-5">
                <h4 class="heading-light">Show it to your friends</h4>
                <ul class="social list-inline">
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="box text-uppercase mt-0 mb-small">
                    <h3>You may also like these products</h3>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="image"><a href="#"><img src="img/product2.jpg" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="shop-detail.html">Fur coat</a></h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="image"><a href="#"><img src="img/product3.jpg" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="shop-detail.html">Fur coat</a></h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="image"><a href="#"><img src="img/product1.jpg" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="shop-detail.html">Fur coat</a></h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div>

            </div>
            <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Kategori</h3>
                </div>
                <div class="panel-body">
                @foreach($category as $banyakcategory )
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between"><span>{{$banyakcategory->name}}</span><span class="badge badge-secondary">.</span></a>
                    @foreach($banyakcategory->children as $subcategory)
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="{{url('/category/'.$subcategory->slug)}}" class="nav-link">{{$subcategory->name}}</a></li>
                      </ul>
                      @endforeach
                    </li>
                  </ul>
                     
                        @endforeach
                </div>
              </div>
              <div class="panel panel-default sidebar-menu">
                <!-- <div class="panel-heading d-flex align-items-center justify-content-between">
                  <h3 class="h4 panel-title">Brands</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
                </div>
                <div class="panel-body">
                  <form action="" method="GET">
                  @foreach($category as $banyakcategory )
                  @foreach($banyakcategory->children as $subcategory)
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="brand"> {{$subcategory->name}}
                        </label>
                      </div>
                    </div>
                    @endforeach
                  @endforeach
                    <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
                  </form>
                </div> -->
              </div>

          </div>
        </div>
      </div>

      @endsection

@section('footer')

@endsection
@show