<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
              <div class="col-md-12">
                <div class="">
                  <h4>
                    <i class="fas fa-globe"></i> Detail Transaction
                    <small class="float-right"><b>Ekspedisi : {{ $transaction->ekspedisi['code']}}</small><br>
                    <small class="float-right"><b>Estimasi: {{ $transaction->ekspedisi['etd']}}</small><br>
                    <small class="float-right"><b>Status:
                  @if($transaction->status == 0)
                    Belum Dibayar
                  @else
                    Lunas
                  @endif
                  </small>
                  </h4>
                </div>
                </div>
                <!-- /.col -->
                </div>
              <!-- info row -->
              <div class="col-md-12">
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col"> 
                  Penerima :
                  <address>
                    {{$transaction->name}}<strong>({{ $transaction->user->name}})</strong><br>
                    <strong>{{ $transaction->user->address}}</strong><br>
                    <strong>Code: {{ $transaction->code}}</strong><br>
                  </address>
                </div>
                <div class="col-sm-8 invoice-col"> 
                  Pengirim :
                  <address>
                    <strong>{{ $transaction->product->user->name}}</strong><br>
                    <strong>{{ $transaction->product->user->address}}</strong><br>

                  </address>
                </div>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php 
                     $gt = 0;
                    @endphp
                        @foreach($transactionDetail as $td)
                        <?php $la = $td->qty * $td->product['price']; ?>
                    <tr>
                      <td>{{$td->qty}}</td>
                      <td>{{$td->product['name']}}</td>
                      <td>{{$td->product['description']}}</td>
                      <td>{{number_format($td->product['price'],2,",",".")}}</td>
                      <!-- <td>{{number_format($td->subtotal,2,",",".")}}</td> -->
                      <td>{{number_format($la,2,",",".")}}</td>
                    </tr>
                        <?php $gt = $gt + $la; ?>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Rekening Bank:</p>

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Halaman ini merupakan halaman Detail transaksi.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                    <tr>
                        <th>Subtotal:</th>
                        <td>{{ number_format($gt,2,",",".") }}</td>
                      </tr>
                      <tr>
                        <th>Ongkir:</th>
                        <td>{{number_format($transaction->ekspedisi['value'])}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo number_format($gt + $transaction->ekspedisi['value'],2,",",".")?> </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>

</body>
</html>

