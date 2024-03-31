@extends('layouts.theme')
@section('content')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Extra
                </h1>
                <!--end::Title-->













                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../../index.html" class="text-muted text-hover-primary">
                            Extra </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        Extras List </li>
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
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->

                <!--end::Filter menu-->


                <!--begin::Secondary button-->
                <!--end::Secondary button-->

                <!--begin::Primary button-->

                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>

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
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">


                    <!--begin::Add product-->
                    <a href={{ route('extras.create') }} class="btn btn-primary">
                        Create
                    </a>
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
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">


                                    <th class="min-w-200px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1"
                                        aria-label="Product: activate to sort column ascending" style="width: 256.375px;">
                                        Extra</th>
                                    <th class="text-end min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1"
                                        aria-label="SKU: activate to sort column ascending" style="width: 129.5px;">Name
                                    </th>

                                    <th class="text-end min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1"
                                        aria-label="Price: activate to sort column ascending" style="width: 129.5px;">Price
                                    </th>
                                    <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 131.913px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                                @foreach ($extras as $extra)
                                    <tr class="odd">

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Thumbnail-->
                                                <a href="edit-product.html" class="symbol symbol-50px">
                                                    <img src="{{ $extra->image }}" alt="Emma Smith" class="w-100" />
                                                </a>
                                                <!--end::Thumbnail-->


                                            </div>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $extra->name }}</span>
                                        </td>

                                        <td class="text-end pe-0">{{ $extra->price }}</td>

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
                                                    <a href="{{ route('extras.edit', $extra->id) }}"
                                                        class="menu-link px-3">
                                                        Edit
                                                    </a>
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
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">

                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                {{ $extras->links('admin.custom_pagination') }}
                                </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products--> </div>
</div>
@endsection
