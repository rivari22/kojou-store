@extends('homepage.index')
@section('header')
<title>Kojou.store - Jual Sepatu import</title>
@endsection
@section ('slide')
    @include('homepage.layout.slider')
@endsection

@section('contents')

<div id="content">
  
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
            <p class=" text-center btn-primary">Produk Terbaru!</p>
              <div class="products-big">
                <div class="row products">
                    @foreach($products as $banyakproduct)
                  <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="image"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><img src="{{$banyakproduct->photo}}" alt="" class="img-fluid image1"></a></div>
                      <div class="text">
                        <h3 class="h5"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><h5 style="color:red;">(Pre-order)</h5>{{$banyakproduct->name}}</a></h3>
                        <p class="price">Rp{{number_format($banyakproduct->price)}}</p>
                      </div>
                    </div>
                  </div>

                    @endforeach
                </div>
              </div>
              <div class="pages">
                <p class="loadMore text-center"><a href="{{url('/product')}}" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i>Muat Lebih Banyak</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection

@section('footer')

@endsection

@show