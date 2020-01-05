@extends('admin.layout.master')
    @section('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <style>
    .table_list {
      List-style: none;
      padding: 3px;
      margin-left: -30px;
    }
    .merah {
      color: red;
    }
  </style>

    @endsection

    @section('body')
    <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
              <div class="col-md-12">
                <div class="">
                  <h4>
                    <i class="fas fa-globe"></i> Rincian Transaksi
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
                      <th>Jumlah</th>
                      <th>Produk</th>
                      <th>Ukuran(US)</th>
                      <th>Harga</th>
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
                      <td>{{$td->size}}</td>
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
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>

                  <a href="{{url('admin/transaction/'.$transaction->code.'/detail/data/cetak')}}" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generate PDF</a>
                 
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>


            <!-- /.card-body -->
        <!-- /.col -->
    <!-- Default box -->
   
    @endsection

    @section('footer')
    <!-- DataTables -->
<script src="{{asset('static/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
    @endsection
@show