@extends('homepage.index')
@section('header')
<title>Kojou.store - Jual Sepatu import</title>
@endsection
@section ('slide')
    
@endsection

@section('contents')

<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Semua Produk</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Produk</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
              <div class="products-big">
                <div class="row products">
                    @foreach($products as $banyakproduct)
                  <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="image"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><img src="{{url($banyakproduct->photo)}}" alt="" class="img-fluid image1"></a></div>
                      <div class="text">
                        <h3 class="h5"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><h5 style="color:red;">(Pre-order)</h5> {{$banyakproduct->name}}</a></h3>
                        <p class="price">Rp{{number_format($banyakproduct->price)}}</p>
                      </div>
                    </div>
                  </div>

                    @endforeach
                </div>
              </div>
              <div class="pages">
              {{$products->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection

@section('footer')

@endsection

@show