@extends('back.layouts.app')

@section('content')
@php
    $data = [(object)[
            'text' => 'Admin',
            'link' => route('back.home'),
            'css_class' => 'text-primary',
        ], (object)[
            'text' => 'Dashboard',
            'link' => '#',
            'css_class' => 'cursor-default',
        ]
    ];
    $content = 'Dashboard';
@endphp
@widget('breadcrumb', compact('data', 'content'))
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-primary">
                        <i class="fe fe-users"></i>
                    </span>
                    <div class="dash-count">
                        <i class="fa fa-arrow-up text-success"></i> 17%
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>168</h3>
                    <h6 class="text-muted">Customers</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <i class="fa fa-arrow-down text-danger"></i> 12%
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>21587</h3>
                    <h6 class="text-muted">Products</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-danger">
                        <i class="fe fe-credit-card"></i>
                    </span>
                    <div class="dash-count">
                        <i class="fa fa-arrow-down text-danger"></i> 12%
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>$56485</h3>
                    <h6 class="text-muted">Sales</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-warning">
                        <i class="fe fe-folder"></i>
                    </span>
                    <div class="dash-count">
                        <i class="fa fa-arrow-up text-success"></i> 17%
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>$62523</h3>
                    <h6 class="text-muted">Revenue</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
