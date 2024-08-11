@extends('back.app')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-fluid ">
        <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('back/partials/widgets/cards/_widget-20')
                @include('back/partials/widgets/cards/_widget-7')
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('back/partials/widgets/cards/_widget-17')
                @include('back/partials/widgets/lists/_widget-26')
            </div>
            <div class="col-xxl-6">
                @include('back/partials/widgets/engage/_widget-10')
            </div>
        </div>
        <div class="row gx-5 gx-xl-10">
            <div class="col-xxl-6 mb-5 mb-xl-10">
                @include('back/partials/widgets/charts/_widget-8')
            </div>
            <div class="col-xl-6 mb-5 mb-xl-10">
                @include('back/partials/widgets/tables/_widget-16')
            </div>
        </div>
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xxl-6">
                @include('back/partials/widgets/cards/_widget-18')
            </div>
            <div class="col-xl-6">
                @include('back/partials/widgets/charts/_widget-36')
            </div>
        </div>
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-4">
                @include('back/partials/widgets/charts/_widget-35')
            </div>
            <div class="col-xl-8">
                @include('back/partials/widgets/tables/_widget-14')
            </div>
        </div>
        <div class="row gx-5 gx-xl-10">
            <div class="col-xl-4 mb-5 mb-xl-0">
                @include('back/partials/widgets/charts/_widget-31')
            </div>
            <div class="col-xl-8">
                @include('back/partials/widgets/charts/_widget-24')
            </div>
        </div>
    </div>
</div>
@endsection