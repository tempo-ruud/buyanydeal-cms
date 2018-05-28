@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
    </div>

    <div class="row row-cards">
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        6%
                        <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">43</div>
                    <div class="text-muted mb-4">Visits Today</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        -3%
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">117</div>
                    <div class="text-muted mb-4">Visits this week</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        -3%
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">117</div>
                    <div class="text-muted mb-4">New Customers</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        -3%
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">117</div>
                    <div class="text-muted mb-4">Conversions</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        -3%
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">117</div>
                    <div class="text-muted mb-4">Followers</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        -3%
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">117</div>
                    <div class="text-muted mb-4">Products</div>
                </div>
            </div>
        </div>
    </div>
@endsection
