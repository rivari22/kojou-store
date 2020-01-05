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
              <h1 class="h2">Tentang kami</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Tentang kami</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <section class="bar mb-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <h2>Apa itu situs kojou.store?</h2>
                </div>
                <p class="lead">Kojou.store adalah sebuah situs penjualan sepatu yang dikhususkan penjualan sepatu luar negeri.
                <br>Kami menyediakan produk yang tidak masuk ke Indonesia, tentunya dengan harga yang lebih murah dibanding membeli secara mandiri dengan cara di kirim dari negara asalnya. <br>
                Dibawah ini beberapa supplier yang menyediakan produk tersebut:</p>
                <div class="row text-center">
                    @foreach($user as $banyakuser)
                  <div class="col-md-2 col-sm-3">
                    <div data-animate="fadeInUp" class="team-member">
                      <div class="image"><a href="{{url('/penjual/'.$banyakuser->id)}}"><img src="{{url($banyakuser->photo)}}" alt="" class="img-fluid rounded-circle"></a></div>
                      <h3><a href="{{url('/penjual/'.$banyakuser->id)}}">{{$banyakuser->name}}</a></h3>
                      <p class="role">{{date('d/m/y',strtotime($banyakuser->created_at))}}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                
              </div>
            </div>
          </section>
        </div>
      </div>


@endsection

@section('footer')

@endsection

@show