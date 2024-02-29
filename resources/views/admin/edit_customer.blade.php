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
                            Customers Form
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href={{ route('customers.index') }} class="text-muted text-hover-primary">
                                    Customers </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Edit Customer </li>
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
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                id="kt_menu_648c1282b30b5">
                                <!--begin::Header-->

                                <!--end::Header-->

                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->

                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true"
                                                data-placeholder="Select option"
                                                data-dropdown-parent="#kt_menu_648c1282b30b5" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->

                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                                <span class="form-check-label">
                                                    Author
                                                </span>
                                            </label>
                                            <!--end::Options-->

                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    checked="checked" />
                                                <span class="form-check-label">
                                                    Customer
                                                </span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->

                                        <!--begin::Switch-->
                                        <div
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="notifications" checked />
                                            <label class="form-check-label">
                                                Enabled
                                            </label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</button>

                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
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
                        action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        <!--begin::Aside column-->
                        @csrf
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
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

                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Photo">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Cancel-->

                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
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

                            <!--end::Template settings-->
                        </div>
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
                                                    <h2>Edit User</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Name</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" name="product_name" class="form-control mb-2"
                                                        placeholder="Name" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A product name is required and recommended
                                                        to be unique.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Email</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="email" name="product_name" class="form-control mb-2"
                                                        placeholder="Email" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Email.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Phone Number</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="number" name="product_name" class="form-control mb-2"
                                                        placeholder="Phone Number" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Email.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Password</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="password" name="product_name" class="form-control mb-2"
                                                        placeholder="Password" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Password.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::General options-->
                                        <!--begin::Media-->

                                        <!--end::Media-->

                                        <!--begin::Pricing-->

                                        <!--end::Pricing-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">

                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Inventory</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">SKU</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" name="sku" class="form-control mb-2"
                                                        placeholder="SKU Number" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the product SKU.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Barcode</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" name="sku" class="form-control mb-2"
                                                        placeholder="Barcode Number" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the product barcode number.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Quantity</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div class="d-flex gap-3">
                                                        <input type="number" name="shelf" class="form-control mb-2"
                                                            placeholder="On shelf" value="">
                                                        <input type="number" name="warehouse" class="form-control mb-2"
                                                            placeholder="In warehouse">
                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the product quantity.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Allow Backorders</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Allow customers to purchase products that
                                                        are out of stock.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Inventory-->

                                        <!--begin::Variations-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Variations</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Add Product Variations</label>
                                                    <!--end::Label-->

                                                    <!--begin::Repeater-->
                                                    <div id="kt_ecommerce_add_product_options">
                                                        <!--begin::Form group-->
                                                        <div class="form-group">
                                                            <div data-repeater-list="kt_ecommerce_add_product_options"
                                                                class="d-flex flex-column gap-3">
                                                                <div data-repeater-item=""
                                                                    class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                    <!--begin::Select2-->
                                                                    <div class="w-100 w-md-200px">
                                                                        <select
                                                                            class="form-select select2-hidden-accessible"
                                                                            name="kt_ecommerce_add_product_options[0][product_option]"
                                                                            data-placeholder="Select a variation"
                                                                            data-kt-ecommerce-catalog-add-product="product_option"
                                                                            data-select2-id="select2-data-127-1zld"
                                                                            tabindex="-1" aria-hidden="true">
                                                                            <option
                                                                                data-select2-id="select2-data-129-ikl4">
                                                                            </option>
                                                                            <option value="color">Color</option>
                                                                            <option value="size">Size</option>
                                                                            <option value="material">Material</option>
                                                                            <option value="style">Style</option>
                                                                        </select><span
                                                                            class="select2 select2-container select2-container--bootstrap5"
                                                                            dir="ltr"
                                                                            data-select2-id="select2-data-128-d7dq"
                                                                            style="width: 100%;"><span
                                                                                class="selection"><span
                                                                                    class="select2-selection select2-selection--single form-select"
                                                                                    role="combobox" aria-haspopup="true"
                                                                                    aria-expanded="false" tabindex="0"
                                                                                    aria-disabled="false"
                                                                                    aria-labelledby="select2-kt_ecommerce_add_product_options0product_option-ai-container"
                                                                                    aria-controls="select2-kt_ecommerce_add_product_options0product_option-ai-container"><span
                                                                                        class="select2-selection__rendered"
                                                                                        id="select2-kt_ecommerce_add_product_options0product_option-ai-container"
                                                                                        role="textbox"
                                                                                        aria-readonly="true"
                                                                                        title="Select a variation"><span
                                                                                            class="select2-selection__placeholder">Select
                                                                                            a variation</span></span><span
                                                                                        class="select2-selection__arrow"
                                                                                        role="presentation"><b
                                                                                            role="presentation"></b></span></span></span><span
                                                                                class="dropdown-wrapper"
                                                                                aria-hidden="true"></span></span>
                                                                    </div>
                                                                    <!--end::Select2-->

                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control mw-100 w-200px"
                                                                        name="kt_ecommerce_add_product_options[0][product_option_value]"
                                                                        placeholder="Variation">
                                                                    <!--end::Input-->

                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Form group-->

                                                        <!--begin::Form group-->
                                                        <div class="form-group mt-5">
                                                            <button type="button" data-repeater-create=""
                                                                class="btn btn-sm btn-light-primary">
                                                                <i class="ki-duotone ki-plus fs-2"></i> Add another
                                                                variation
                                                            </button>
                                                        </div>
                                                        <!--end::Form group-->
                                                    </div>
                                                    <!--end::Repeater-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Variations-->

                                        <!--begin::Shipping-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Shipping</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="fv-row">
                                                    <!--begin::Input-->
                                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="kt_ecommerce_add_product_shipping_checkbox"
                                                            value="1">
                                                        <label class="form-check-label">
                                                            This is a physical product
                                                        </label>
                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set if the product is a physical or
                                                        digital item. Physical products may require shipping.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Shipping form-->
                                                <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Weight</label>
                                                        <!--end::Label-->

                                                        <!--begin::Editor-->
                                                        <input type="text" name="weight" class="form-control mb-2"
                                                            placeholder="Product weight" value="">
                                                        <!--end::Editor-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set a product weight in kilograms
                                                            (kg).</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Dimension</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                            <input type="number" name="width"
                                                                class="form-control mb-2" placeholder="Width (w)"
                                                                value="">
                                                            <input type="number" name="height"
                                                                class="form-control mb-2" placeholder="Height (h)"
                                                                value="">
                                                            <input type="number" name="length"
                                                                class="form-control mb-2" placeholder="Lengtn (l)"
                                                                value="">
                                                        </div>
                                                        <!--end::Input-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Enter the product dimensions in
                                                            centimeters (cm).</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Shipping form-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Shipping-->
                                        <!--begin::Meta options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Meta Options</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Title</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mb-2" name="meta_title"
                                                        placeholder="Meta tag name">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a meta tag title. Recommended to be
                                                        simple and precise keywords.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Description</label>
                                                    <!--end::Label-->

                                                    <!--begin::Editor-->
                                                    <div class="ql-toolbar ql-snow"><span class="ql-formats"><span
                                                                class="ql-header ql-picker"><span class="ql-picker-label"
                                                                    tabindex="0" role="button" aria-expanded="false"
                                                                    aria-controls="ql-picker-options-1"><svg
                                                                        viewBox="0 0 18 18">
                                                                        <polygon class="ql-stroke"
                                                                            points="7 11 9 13 11 11 7 11"></polygon>
                                                                        <polygon class="ql-stroke"
                                                                            points="7 7 9 5 11 7 7 7"></polygon>
                                                                    </svg></span><span class="ql-picker-options"
                                                                    aria-hidden="true" tabindex="-1"
                                                                    id="ql-picker-options-1"><span tabindex="0"
                                                                        role="button" class="ql-picker-item"
                                                                        data-value="1"></span><span tabindex="0"
                                                                        role="button" class="ql-picker-item"
                                                                        data-value="2"></span><span tabindex="0"
                                                                        role="button"
                                                                        class="ql-picker-item ql-selected"></span></span></span><select
                                                                class="ql-header" style="display: none;">
                                                                <option value="1"></option>
                                                                <option value="2"></option>
                                                                <option selected="selected"></option>
                                                            </select></span><span class="ql-formats"><button
                                                                type="button" class="ql-bold"><svg viewBox="0 0 18 18">
                                                                    <path class="ql-stroke"
                                                                        d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                                                    </path>
                                                                    <path class="ql-stroke"
                                                                        d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                                                    </path>
                                                                </svg></button><button type="button"
                                                                class="ql-italic"><svg viewBox="0 0 18 18">
                                                                    <line class="ql-stroke" x1="7" x2="13"
                                                                        y1="4" y2="4"></line>
                                                                    <line class="ql-stroke" x1="5" x2="11"
                                                                        y1="14" y2="14"></line>
                                                                    <line class="ql-stroke" x1="8" x2="10"
                                                                        y1="14" y2="4"></line>
                                                                </svg></button><button type="button"
                                                                class="ql-underline"><svg viewBox="0 0 18 18">
                                                                    <path class="ql-stroke"
                                                                        d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3">
                                                                    </path>
                                                                    <rect class="ql-fill" height="1" rx="0.5"
                                                                        ry="0.5" width="12" x="3"
                                                                        y="15"></rect>
                                                                </svg></button></span><span class="ql-formats"><button
                                                                type="button" class="ql-image"><svg viewBox="0 0 18 18">
                                                                    <rect class="ql-stroke" height="10" width="12"
                                                                        x="3" y="4"></rect>
                                                                    <circle class="ql-fill" cx="6" cy="7"
                                                                        r="1"></circle>
                                                                    <polyline class="ql-even ql-fill"
                                                                        points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12">
                                                                    </polyline>
                                                                </svg></button><button type="button"
                                                                class="ql-code-block"><svg viewBox="0 0 18 18">
                                                                    <polyline class="ql-even ql-stroke"
                                                                        points="5 7 3 9 5 11"></polyline>
                                                                    <polyline class="ql-even ql-stroke"
                                                                        points="13 7 15 9 13 11"></polyline>
                                                                    <line class="ql-stroke" x1="10" x2="8"
                                                                        y1="5" y2="13"></line>
                                                                </svg></button></span></div>
                                                    <div id="kt_ecommerce_add_product_meta_description"
                                                        name="kt_ecommerce_add_product_meta_description"
                                                        class="min-h-100px mb-2 ql-container ql-snow">
                                                        <div class="ql-editor ql-blank" data-gramm="false"
                                                            contenteditable="true"
                                                            data-placeholder="Type your text here...">
                                                            <p><br></p>
                                                        </div>
                                                        <div class="ql-clipboard" contenteditable="true" tabindex="-1">
                                                        </div>
                                                        <div class="ql-tooltip ql-hidden"><a class="ql-preview"
                                                                rel="noopener noreferrer" target="_blank"
                                                                href="about:blank"></a><input type="text"
                                                                data-formula="e=mc^2" data-link="https://quilljs.com"
                                                                data-video="Embed URL"><a class="ql-action"></a><a
                                                                class="ql-remove"></a></div>
                                                    </div>
                                                    <!--end::Editor-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a meta tag description to the product
                                                        for increased SEO ranking.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Keywords</label>
                                                    <!--end::Label-->

                                                    <!--begin::Editor-->
                                                    <input id="kt_ecommerce_add_product_meta_keywords"
                                                        name="kt_ecommerce_add_product_meta_keywords"
                                                        class="form-control mb-2">
                                                    <!--end::Editor-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a list of keywords that the product is
                                                        related to. Separate the keywords by adding a comma <code>,</code>
                                                        between each keyword.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Meta options-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->


                                <!--end::Tab pane-->

                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">

                                        <!--begin::Inventory-->

                                        <!--end::Inventory-->

                                        <!--begin::Variations-->

                                        <!--end::Variations-->

                                        <!--begin::Shipping-->
                                        <!--end::Shipping-->
                                        <!--begin::Meta options-->
                                        <!--end::Meta options-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                            </div>
                            <!--end::Tab content-->

                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                    Cancel
                                </a>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
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
