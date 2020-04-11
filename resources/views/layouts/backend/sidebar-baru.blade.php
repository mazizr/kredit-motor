<div class="nk-sidebar">           
    <hr class="my-2">
    <div class="nk-nav-scroll">
        <ul class="metismenu">
            <li class="nav-label">Data Master</li>
            <li>
                <a href="{{ url('admin/merk')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Brand</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/motor')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Motor</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/pembeli')}}" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Pembeli</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/kriditpaket')}}" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Kredit Paket</span>
                </a>
            </li>
        </ul>

        <ul class="metismenu" id="menu">
            <li class="nav-label">Transaksi</li>
            <li>
                <a href="{{ url('admin/belicash')}}" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text">Beli Cash</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Beli Kredit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/belikridit')}}">Data Kredit</a></li>
                    <li><a href="{{ url('admin/belicicilan')}}">Data Cicilan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>