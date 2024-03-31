@extends('layouts.theme')
@section('content')
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
                            Order Section
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href={{ route('designers.index') }} class="text-muted text-hover-primary">
                                    Ecommerce Order </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Edit Order </li>
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
                        <div class="m-0">
                            <!--begin::Menu toggle-->

                            <!--end::Menu toggle-->



                            <!--begin::Menu 1-->

                            <!--end::Menu 1-->
                        </div>
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
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
                        action="{{ route('ecom_orders.update',$ecom_orders->id) }}" method="POST" enctype="multipart/form-data">
                        <!--begin::Aside column-->
                        @csrf
                        @method('patch')
                        {{-- <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Avatar Photo</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body text-center pt-0">
        <!--begin::Image input-->
                    <!--begin::Image input placeholder-->
            <style>
                .image-input-placeholder {
                    background-image: url('../../../assets/media/svg/files/blank-image.svg');
                }

                [data-bs-theme="dark"] .image-input-placeholder {
                    background-image: url('../../../assets/media/svg/files/blank-image-dark.svg');
                }
            </style>
            <!--end::Image input placeholder-->

        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-150px h-150px"></div>
                        <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Photo">
                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                <!--begin::Inputs-->
                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required />
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
            </label>
            <!--end::Label-->

            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->

        <!--begin::Description-->
        <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
        <!--end::Description-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Thumbnail settings-->
        <!--begin::Status-->

<!--end::Status-->

<!--begin::Category & tags-->

<!--end::Category & tags-->
        <!--begin::Weekly sales-->

<!--end::Weekly sales-->
        <!--begin::Template settings-->

<!--end::Template settings-->    </div> --}}
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul
                                class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                <!--begin:::Tab item-->

                                <!--end:::Tab item-->

                                <!--begin:::Tab item-->

                                <!--end:::Tab item-->

                            </ul>
                            <!--end:::Tabs-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                    role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">

                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Order</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="row">

                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Name :</label>
                                                        <!--end::Label-->



                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$ecom_orders->user->name}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Email:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$ecom_orders->user->email}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Phone Number</label>
                                                        <!--end::Label-->


                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp; &nbsp;
                                                            {{$ecom_orders->user->phone}}</div>
                                                        <!--end::Description-->
                                                    </div>

                                                </div>

                                                <!--end::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container d-flex">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Address</label>
                                                    <!--end::Label-->



                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7" style="width: 600px">
                                                        &nbsp;&nbsp;{{$ecom_orders->user_address->address_line_1}}, {{$ecom_orders->user_address->address_line_2}}, {{$ecom_orders->user_address->address_line_3}}, {{$ecom_orders->user_address->pincode}}
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Amount :</label>
                                                        <!--end::Label-->



                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$ecom_orders->amount}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Payment Type:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$ecom_orders->payment_type}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Payment Status</label>
                                                        <!--end::Label-->


                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp; &nbsp;
                                                            {{$ecom_orders->payment_status}}</div>
                                                        <!--end::Description-->
                                                    </div>

                                                </div>

                                                <!--end::Input group-->
                                                <div
                                                    class="mb-10 fv-row fv-plugins-icon-container d-flex  align-items-center">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Order Status:</label>
                                                    <!--end::Label-->




                                                    <select class="form-select" aria-label="Default select example"
                                                        style="width:200px;margin-left:10px" name="order_status">
                                                        <option value="pending" {{ $ecom_orders->order_status == "pending" ? 'selected' : '' }} > pending</option>
                                                        <option value="on_the_way"  {{ $ecom_orders->order_status == "on_the_way" ? 'selected' : '' }}>on the way</option>
                                                        <option value="delivered" {{ $ecom_orders->order_status == "delivered" ? 'selected' : '' }}>delivered</option>
                                                        <option value="canceled" {{ $ecom_orders->order_status == "canceled" ? 'selected' : '' }}>canceled</option>
                                                        <option value="in_return" {{ $ecom_orders->order_status == "in_return" ? 'selected' : '' }}>in return</option>
                                                        <option value="returned" {{ $ecom_orders->order_status == "returned" ? 'selected' : '' }}>returned</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!--end::Card header-->

                                        <div class="d-flex justify-content-start ">


                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_add_product_submit"
                                                class="btn btn-primary " style="margin-left:30px" onclick="submit()">
                                                <span class="indicator-label">
                                                    Save Changes
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        </div>
                                        <!--end::General options-->


                                        {{-- edit here fazil bhai --}}
                                         <!--begin::General options-->
                                         @foreach ($ecom_orders->order_details as $details )
                                         <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Order Details</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="row">


                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Product Name:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$details->products->name}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Quantity</label>
                                                        <!--end::Label-->


                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp; &nbsp;
                                                            {{$details->products->quantity}}</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Color :</label>
                                                        <!--end::Label-->



                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$details->color}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>

                                                </div>


                                                <div class="row">


                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Size:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp;&nbsp;{{$details->size}}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-4 mb-10 fv-row fv-plugins-icon-container d-flex">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Amount</label>
                                                        <!--end::Label-->


                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7" style="width: 200px">&nbsp; &nbsp;
                                                            {{$details->amount}}</div>
                                                        <!--end::Description-->
                                                    </div>

                                                </div>

                                            </div>
                                            <!--end::Card header-->
                                        </div>

                                         @endforeach
                                        <!--end::General options-->

                                    </div>
                                    <!--end::Main column-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->


        <!--begin::Footer-->
    </div>
    <!--end:::Main-->


    </div>
    <!--end::Wrapper-->
@endsection
