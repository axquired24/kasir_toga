@extends('layouts.apphome')
@section('title' ,'Histori Belanja')
@section('content')
{{-- {{ dd(\Cart::content()) }} --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    <h4 class="box-title">Ringkasan Belanja &nbsp; </h4>
                    <div class="pull-right"><a href="{{ url('/') }}" class="btn btn-default"><i class="fa fa-shopping-cart"></i>&nbsp; Kembali ke Kasir</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <div class="well">
                    Total Belanja: <b>Rp {{ number_format($total_belanja, 0,'.', ',') }} <br></b>
                    Dibayar: <b>Rp {{ number_format($dibayar, 0,'.', ',') }}</b> <br>
                    <h3><small>Kembalian:</small> Rp {{ number_format($dibayar - $total_belanja, 0,'.', ',') }}</h3>
                    </div>
                    {{-- <br><br> --}}
                    <div id="tablecontent">
                    <table class="table table-responsive table-striped table-hover" id="datatable">
                        <thead>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($trn as $cart)
                            <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $cart->product_name }}</td>
                                    <td>{{ $cart->qty }}</td>
                                    <td>{{ $cart->subtotal }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td>Cashback Tabungan: Rp {{ number_format($profit_member, 0,'.', ',') }}</td>
                                <td><b>Total: Rp {{ number_format($total_belanja, 0,'.', ',') }}</b></td></tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @if(is_object($user))
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="title">Hei, <b>{{ $user->name }}</b> Tabung Kembalian?</h4>
                </div>
                <div class="content">
                    <div id="suksesNabung">
                        <div class="alert alert-success">
                        Sukses, Tabungan telah ditambahkan sebesar <br><span class="text-bold" id="notifNabung">Rp </span><br>
                        Saldo sekarang: <span class="text-bold" id="notifSaldo">Rp </span><br>
                        </div>                        
                    </div>
                    <form method="post" action="" id="nabungForm">
                    <div class="form-group">
                            <label>Masukkan ke Tabungan</label>
                            <input type="hidden" id="userId" value="{{ $user->id }}">
                            <input type="hidden" id="userName" value="{{ $user->name }}">
                            <input type="text" id="nabung" class="form-control input-lg" placeholder="Nominal Tabungan" name="nabung" value="{{ number_format($dibayar - $total_belanja, 0,'.', ',') }}" required>
                            <span class="help-block text-muted">Sisa kembalian dapat ditabung melalui form ini. Saldo total untuk {{ $user->name }} saat ini adalah, <br> <b>Rp {{ number_format($user->saldo, 0,'.', ',') }}</b></span>
                    </div> {{-- form-group --}}
                    <div align="center">
                        <button type="submit" class="btn btn-lg btn-fill btn-primary">Simpan Ke Tabungan</button>
                    </div>
                    </form>
                </div>
            </div>
            @endif
        </div> {{-- col-md --}}
    </div> {{-- .row --}}
</div>{{--  container-fluid --}}

@push('jscode')
<script src="{{ url('assets/numeraljs/numeral.min.js') }}"></script>
<script>
    $('#suksesNabung').hide();

    // numeral js
    $('#nabung').keyup(function() {
      var inputAwal = $('#nabung').val();
      var decodeInput = numeral(inputAwal).format('0,0');
      $('#nabung').val(decodeInput);
    })

    // function add saldo
    $("#nabungForm").submit(function(e) {
        e.preventDefault();
        var userId = $('#userId').val();
        var userName = $('#userName').val();
        var nabung = $('#nabung').val();
        // If no member
        if(nabung == '') {
                return
        }

        // Else, if member was set
        $.ajax({
            method: 'POST',
            url: '{{ url("app/member/tambahSaldo") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                userId: userId,
                userName: userName,
                nabung: nabung,
             },
            success:function(data){
                console.log(data);
                $('#notifNabung').html('Rp '+nabung);
                $('#notifSaldo').html('Rp '+data.saldoSekarang);
                $('#suksesNabung').show();
                $('#nabungForm').hide();
            },error:function(data){
                alert('terjadi kesalahan');
                console.log(data);
                // console.log(data.responseText[0]);
                // var respon  = $.parseJSON(data.responseText);
                // alert(respon.message);
            }
        });
    }); // function member form

</script>
@endpush

@endsection