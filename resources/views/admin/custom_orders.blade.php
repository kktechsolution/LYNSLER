@extends('layouts.theme')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">

                <!--begin::Toolbar-->
                <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                Custom Order List
                            </h1>
                            <!--end::Title-->


                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="../../../index.html" class="text-muted text-hover-primary">
                                        Custom Order </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    Custom Order List </li>
                                <!--end::Item-->
                                <!--begin::Item-->

                                <!--end::Item-->

                                <!--begin::Item-->

                                <!--end::Item-->

                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Actions-->

                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Content-->
                <div id="kt_app_content" class="app-content  flex-column-fluid ">


                    <div id="kt_app_content_container" class="app-container  container-xxl ">
                        <!--begin::Products-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span
                                                class="path1"></span><span class="path2"></span></i> <input type="text"
                                            data-kt-ecommerce-product-filter="search"
                                            class="form-control form-control-solid w-250px ps-12"
                                            placeholder="Search Product">
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->

                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">

                                <!--begin::Table-->
                                <div id="kt_ecommerce_products_table_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                            id="kt_ecommerce_products_table">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                                    <th class="min-w-200px sorting" tabindex="0"
                                                        aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Product: activate to sort column ascending"
                                                        >User Name </th>

                                                        <th class="min-w-200px sorting" tabindex="0"
                                                        aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Product: activate to sort column ascending"
                                                        >Payment Type</th>

                                                        <th class="min-w-200px sorting" tabindex="0"
                                                        aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Product: activate to sort column ascending"
                                                        >Payment Status</th>
                                                    <th class="min-w-200px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                    colspan="1" aria-label="SKU: activate to sort column ascending"
                                                        >Amount</th>
                                                    <th class="min-w-200px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                    colspan="1"
                                                        aria-label="Status: activate to sort column ascending"
                                                        > Order Status</th>

                                                    <th class="min-w-200px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_products_table" rowspan="1"
                                                    colspan="1"aria-label="Actions" >
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">


                                                @foreach ($ecom_orders as $order)
                                                    <tr class="odd">
                                                        {{-- <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1">
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Thumbnail-->

                                                                <!--end::Thumbnail-->

                                                                <div class="ms-5">
                                                                    <!--begin::Title-->
                                                                    <a href="{{ route('ecom_orders.create', $order->id) }}"
                                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                                        data-kt-ecommerce-product-filter="product_name">{{ $order->user->name }}</a>
                                                                    <!--end::Title-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <span class="fw-bold">{{ $order->payment_type }}</span>
                                                        </td>

                                                        <td>
                                                            <span class="fw-bold">{{ $order->payment_status }}</span>
                                                        </td>

                                                        <td >
                                                            <span class="fw-bold">{{ $order->amount }}</span>
                                                        </td>


                                                       <td >
                                                            <span class="fw-bold">{{ $order->order_status }}</span>
                                                        </td>

                                                        <td >
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href={{ route('custom_orders.edit', $order->id) }}
                                                                        class="menu-link px-3">
                                                                        Edit
                                                                    </a>
                                                                </div>
                                                                <!--end::Menu item-->

                                                                <!--begin::Menu item-->

                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->

                                                            <!--begin::Thumbnail-->

                                                            <!--end::Thumbnail-->


                                                            <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">

                                    </div>
                                    <div
                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                        {{ $ecom_orders->links('admin.custom_pagination') }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Products-->
                </div>
                <!--end::Content container-->
            </div>





            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    @endsection
