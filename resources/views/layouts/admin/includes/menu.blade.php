<ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-shopping-bag"></i> Catalog</a>
        <div class="dropdown-menu dropdown-menu-arrow">
            <a href="{{ route('admin.product.index') }}" class="dropdown-item ">Products</a>
            <a href="{{ route('admin.category.index') }}" class="dropdown-item ">Categories</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.attribute.index') }}" class="dropdown-item ">Attributes</a>
            <a href="{{ route('admin.attributegroup.index') }}" class="dropdown-item ">Attribute Groups</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item ">Brand Pages</a>
        </div>
    </li>
</ul>