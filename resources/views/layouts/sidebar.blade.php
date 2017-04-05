    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Kasir</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
{{--       <form action="{{ url('app/product/list') }}" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="searchDatatable" class="form-control" placeholder="Cari Produk">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php 
        function cur_uri() {
          $currenturi = url()->full();
          $currenturi = str_replace(url('/') . '/', '', $currenturi);
          $cur_uri = explode('/', $currenturi);
          return $cur_uri;
        }
        // is active menu
        function active_product($param) {
          $cur_uri  = cur_uri();
          if(($cur_uri[1] == 'product') && ($cur_uri[2] == $param)) {
            return 'class=active';
          } // close if
        } // close function

        function active_product_cat($param) {
          $cur_uri  = cur_uri();
          if($cur_uri[1] == 'product_category' && $cur_uri[2] == $param) {
            return 'class=active';
          } // close if
        } // close function

        function active_member($param) {
          $cur_uri  = cur_uri();
          if($cur_uri[1] == 'member' && $cur_uri[2] == $param) {
            return 'class=active';
          } // close if
        } // close function

        function active_laporan($param) {
          $cur_uri  = cur_uri();
          if($cur_uri[1] == 'laporan' && $cur_uri[2] == $param) {
            return 'class=active';
          } // close if
        } // close function

        $cur_uri  = cur_uri(); // export variable
        // dd($cur_uri);
      ?>
      <ul class="sidebar-menu">
        <li class="header">NAVIGASI UTAMA</li>
        <li class="@if($cur_uri[1] == '') active @endif">
            <a href="{{ url('/') }}"><i class="fa fa-shopping-cart"></i> <span>Kasir</span></a>
        </li>
        <li class="treeview @if($cur_uri[1] == 'product' || $cur_uri[1] == 'product_category') active @endif">
          <a href="#">
            <i class="fa fa-gift"></i>
            <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li {{ active_product('list') }}><a href="{{ url('app/product/list') }}"><i class="fa fa-circle-o"></i> Semua Produk</a></li>
            <li {{ active_product_cat('list') }}><a href="{{ url('app/product_category/list') }}"><i class="fa fa-circle-o"></i> Kategori Produk</a></li>
            <li {{ active_product('add') }}><a href="{{ url('app/product/add') }}"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
          </ul>
        </li>
        <li class="treeview @if($cur_uri[1] == 'member') active @endif">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Member</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li {{ active_member('list') }}><a href="{{ url('app/member/list') }}"><i class="fa fa-circle-o"></i> Semua Member</a></li>
            <li {{ active_member('tabungan') }}><a href="{{ url('app/member/tabungan') }}"><i class="fa fa-circle-o"></i> Tabungan Member</a></li>
            <li {{ active_member('add') }}><a href="{{ url('app/member/add') }}"><i class="fa fa-circle-o"></i> Tambah Member</a></li>
          </ul>
        </li>
        <li class="treeview @if($cur_uri[1] == 'laporan') active @endif">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Statistik</a></li>
            <li {{ active_product('invoice') }}><a href="{{ url('app/laporan/invoice') }}"><i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>
            <li {{ active_product('transaksi') }}><a href="{{ url('app/laporan/transaksi?paramdua=pilihrange') }}"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
          </ul>
        </li>
        <li class="header">PENGATURAN</li>
        <li class="@if($cur_uri[1] == 'settings') active @endif">
            <a href="{{ url('app/settings') }}"><i class="fa fa-cog"></i> Pengaturan Toko</a>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->