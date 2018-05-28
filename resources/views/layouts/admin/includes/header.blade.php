<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="/buymin">
                @include('layouts.admin.includes.logo')
            </a>

            <div class="d-flex order-lg-2 ml-auto">
                @include('layouts.admin.includes.usermenu')
            </div>

            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                    <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg order-lg-first">
                @include('layouts.admin.includes.menu')
            </div>
        </div>
    </div>
</div>
