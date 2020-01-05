@extends('homepage.index')
@section('header')
<title>Kojou.store - {{$name}}</title>
@endsection
@section ('slide')
    
@endsection

@section('contents')

<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{$name}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Produk</li>
                <li class="breadcrumb-item active">{{$name}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <!-- <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p> -->
              <div class="row products products-big">
              @if(count($products)>0)
              @foreach($products as $banyakproduct)
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="image"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><img src="{{url($banyakproduct->photo)}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="{{url('product/detail/'.$banyakproduct->slug)}}"><h5 style="color:red;">(Pre-order)</h5>{{$banyakproduct->name}}</a></h3>
                      <p class="price">Rp{{number_format($banyakproduct->price)}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <h4>Produk tidak tersedia</h4>
                @endif
              </div>
              
              <div class="row">
                <div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div>
              <!-- <div class="pages">
                <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div> -->
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
              
              </div>

          </div>
        </div>
      </div>

      @endsection

@section('footer')

@endsection
@show