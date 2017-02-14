<div class="sidebar" data-color="blue" data-image="{{ URL::asset('assets/img/sidebar-4.jpg') }}">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                TOKO KELUARGA
            </a>
        </div>

        <ul class="nav">
            <li id="menukasir">
                <a href="{{ url('/') }}">
                    <i class="pe-7s-cart"></i>
                    <p>Kasir</p>
                </a>
            </li>
            <li id="menuproduk">
                <a data-toggle="collapse" href="#produkMenu" class="" aria-expanded="true">
                    <i class="pe-7s-plugin"></i>
                    <p>Produk
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="produkMenu" aria-expanded="true">
                    <ul class="nav">
                        <li id="menusemuaproduk"><a href="{{ url('app/product/list') }}">Semua Produk</a></li>
                        <li id="menuprodukcat"><a href="{{ url('app/product_category/list') }}">Kategori Produk</a></li>
                        <li id="menuprodukadd"><a href="{{ url('app/product/add') }}">Produk Baru</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#memberMenu" class="" aria-expanded="true">
                    <i class="pe-7s-users"></i>
                    <p>Member
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="memberMenu" aria-expanded="true">
                    <ul class="nav">
                        <li><a href="#">Semua Member</a></li>
                        <li><a href="#">Ambil Tabungan</a></li>
                        <li><a href="#">Member Baru</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#laporanMenu" class="" aria-expanded="true">
                    <i class="pe-7s-note2"></i>
                    <p>Laporan
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laporanMenu" aria-expanded="true">
                    <ul class="nav">
                        <li><a href="#">Statistik</a></li>
                        <li><a href="#">Transaksi Penjualan</a></li>
                        <li><a href="#">Tabungan</a></li>                            
                    </ul>
                </div>
            </li>

            <li>
                <a href="#">
                    <i class="pe-7s-config"></i>
                    <p>Pengaturan Toko</p>
                </a>
            </li>

{{-- 			<li class="active-pro">
                <a href="#">
                    <i class="pe-7s-call"></i>
                    <p>Kontak Pengembang</p>
                </a>
            </li> --}}
        </ul>
	</div>
</div>