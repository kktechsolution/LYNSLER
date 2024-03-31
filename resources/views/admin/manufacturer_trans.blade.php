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
                            Transaction List
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->

                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Transactions List </li>
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

                                <!--end::Search-->
                            </div>
                            <!--end::Card title-->

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-122-3o0w">
                                <div class="w-100 mw-150px">
                                    <!--begin::Select2-->

                                    <!--end::Select2-->
                                </div>

                                <!--begin::Add product-->

                                <!--end::Add product-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Table-->
                            <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 129.5px;">Transaction Id</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 116.762px;">Order Id</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 116.762px;">Amount</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 116.762px;">User Name</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 116.762px;">User Type</th>
                                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 129.5px;"> Payment Status</th>
                                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 129.5px;"> Payment Mode</th>
                                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 129.5px;"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">


                                            @foreach($transactions as $transaction)
                                            <tr class="odd">


                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->user_id}}</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->order_id}}</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->amount}}</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->user->name}}</span>
                                                </td>


                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->user->type}}</span>
                                                </td>


                                                <td class="text-end pe-0" data-order="Scheduled">
                                                    <!--begin::Badges-->
                                                    <div class="badge badge-light-primary">@if($transaction->payment_status == 'pending')
                                                        Pending
                                                        @else
                                                        Paid
                                                        @endif</div>
                                                    <!--end::Badges-->
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="fw-bold">{{$transaction->payment_mode}}</span>

                                                </td>
                                                <td class="text-end">
                                                    <a href="#"
                                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        Actions
                                                        <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <form method="post" action="{{route('transactions.update',$transaction->id)}}">
                                                                @csrf
                                                                @method('patch')
                                                            <input class="input px-3" style="width: 100%" type="text" name="payment_mode" value="{{$transaction->payment_mode}}">
                                                            <button class="btn btn-primary mt-3" style="padding: 5px 7px 5px 7px !important;align-item:center;margin-left:23px;display:flex" onclick="submit()">submit</button>
                                                            </form>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->

                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->


                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->

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
                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">

                                </div>
                                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    {{ $transactions->links('admin.custom_pagination') }}
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
