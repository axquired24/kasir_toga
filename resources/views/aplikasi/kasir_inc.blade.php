<script>
    // numeral js
    $('#bayarInput').keyup(function() {
      var inputAwal = $('#bayarInput').val();
      var decodeInput = numeral(inputAwal).format('0,0');
      $('#bayarInput').val(decodeInput);
    })
    // end numeral js

    $('#nameOrKode').focus();
    getCartTotal();

    <?php
        $rute = \Route::getCurrentRoute()->getPath();
    ?>

    // function refreshTable () {
    //     $('#tablecontent').load(' {{ env("APP_URL") . $rute }} #tablecontent ');
    // }

    // Datatable View
    var datatable =
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("app/cart/list/x") }}',
        columns: [
            // { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'qty', name: 'qty' },
            { data: 'subtotal', name: 'subtotal' },
            { data: 'action', name: 'action' },
        ],
        order: [ [0, 'asc'] ]
    });

    function deleteCart (rowId, title) {
        var check = confirm('Hapus belanjaan: '+title+ ' ?');
        if(check == false) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/delete") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                rowId: rowId,
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    // Tambah ke keranjang
    function addCart(kode){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/add") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                kode: kode,
             },
            success:function(data){
                // alert(data);
                console.log(data);
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    };

    function addCartFromMulti (kode) {
        $('#cartModal').modal('hide');
        addCart(kode);
    }

    // Tambah ke keranjang
    function getCartTotal(){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/total") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            // dataType: 'json',
            data: {
                // kode: kode,
             },
            success:function(data){
                $('#totalbayar').html(data);
            },error:function(data){
            }
        });
    };

    function updateCartQty (rowId, name, qty) {
        valqty  = prompt('Jumlah '+name+' :', qty);
        if(valqty == '' || valqty === null) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/update_qty") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                rowId: rowId,
                qty: valqty,
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    function clearCart () {
        var check = confirm('Hapus semua belanjaan ?');
        if(check == false) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/clear_cart") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    // Selector textbox
    $("#kasirform").submit(function(e) {
        e.preventDefault();
        var name    = $('#nameOrKode').val();

        if(name == '' || name === null) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/getProduct/x") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                name: name,
             },
            success:function(data){
                // alert(data);
                var tipe    = data.tipe;
                var product = data.product;
                if(tipe == 'single') {
                    addCart(name);
                    datatable.ajax.reload();
                    getCartTotal();
                }
                else if(tipe == 'multi') {
                    var produk  = '';
                    $('#cartModalLabel').html('Loading');
                    $('#cartModalContent').html('Loading');
                    $('#cartModal').modal('show');
                    var htmlcart    = '<div class="list-group">'; // Set variable kosong untuk pencarian product baru
                    for(pro in product) {
                        var productname     = product[pro].name;
                        var productkode     = product[pro].kode;
                        var productlink     = '<a class="list-group-item" href="javascript:addCartFromMulti(\''+productkode+'\')"><i class="fa fa-cube"></i>&nbsp; '+productname+' [kode:'+productkode+']</a> <br />';
                        htmlcart += productlink; // Set list link untuk tambah product
                        // console.log(product[pro].name);
                    }
                    htmlcart += '</div>';
                    var htmltitlecart    = 'Pencarian produk untuk ('+name+'): '; // Judul untuk 'modal'
                    // Set isi modal dan tampilkan
                    $('#cartModalLabel').html(htmltitlecart);
                    $('#cartModalContent').html(htmlcart);
                }
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    }); // function - ajax kasir form

    $("#memberForm").submit(function(e) {
        e.preventDefault();
        var kodeMember = $('#kodeMember').val();
        // If no member
        if(kodeMember == '' || kodeMember === null) {
            // var check = confirm('Lanjutkan tanpa kode member ?');
            // if(check == false) {
                return
            // }
            // document.location = '{{ url("app/checkout/pay") }}';
            // return
        }

        // Else, if member was set
        $.ajax({
            method: 'POST',
            url: '{{ url("app/checkout/membercheck_x") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                kodeMember: kodeMember,
             },
            success:function(data){
                // alert(data.name);
                $('#namaMember').html('<h3><span class="text-success">Member: </span>'+data.name+'</h3>');
                $('#userID').val(data.id);
                // console.log(data);
                // var tipe    = data.tipe;
                // var product = data.product;
                // if(tipe == 'single') {
                //     addCart(name);
                //     datatable.ajax.reload();
                //     getCartTotal();
                // }
                // else if(tipe == 'multi') {
                //     var produk  = '';
                //     $('#cartModalLabel').html('Loading');
                //     $('#cartModalContent').html('Loading');
                //     $('#cartModal').modal('show');
                //     var htmlcart    = '<div class="list-group">'; // Set variable kosong untuk pencarian product baru
                //     for(pro in product) {
                //         var productname     = product[pro].name;
                //         var productkode     = product[pro].kode;
                //         var productlink     = '<a class="list-group-item" href="javascript:addCartFromMulti(\''+productkode+'\')"><i class="fa fa-cube"></i>&nbsp; '+productname+' [kode:'+productkode+']</a> <br />';
                //         htmlcart += productlink; // Set list link untuk tambah product
                //         // console.log(product[pro].name);
                //     }
                //     htmlcart += '</div>';
                //     var htmltitlecart    = 'Pencarian produk untuk ('+name+'): '; // Judul untuk 'modal'
                //     // Set isi modal dan tampilkan
                //     $('#cartModalLabel').html(htmltitlecart);
                //     $('#cartModalContent').html(htmlcart);
                // }
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    }); // function member form
</script>