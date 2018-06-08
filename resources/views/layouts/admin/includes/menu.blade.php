<ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-shopping-bag"></i> Catalog</a>
        <div class="dropdown-menu dropdown-menu-arrow">
            <a href="{{ route('admin.shop.index') }}" class="dropdown-item ">Shops</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.brand.index') }}" class="dropdown-item ">Brand Pages</a>
        </div>
    </li>
</ul>