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
                            Product Form
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="../../../index.html" class="text-muted text-hover-primary">
                                    Product </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Create </li>
                            <!--end::Item-->
                            <!--begin::Item-->

                            <!--end::Item-->



                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" action="{{ route('products.store') }}" method="post"
                        enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2> Active Status</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select2-->
                                    <select class="form-select mb-2" name="is_active" data-hide-search="true"
                                        data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                        <option value="">---Select---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>

                                    </select>
                                    <!--end::Select2-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the catlog status.</div>
                                    <!--end::Description-->

                                    <!--begin::Datepicker-->
                                    <div class="d-none mt-10">
                                        <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select
                                            publishing date and time</label>
                                        <input class="form-control flatpickr-input"
                                            id="kt_ecommerce_add_product_status_datepicker"
                                            placeholder="Pick date &amp; time" type="text" readonly="readonly">
                                    </div>
                                    <!--end::Datepicker-->
                                </div>

                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2> Stock Status</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select2-->
                                    <select class="form-select mb-2" name="in_stock" data-hide-search="true"
                                        data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                        <option value="">---Select---</option>
                                        <option value="1">InStock</option>
                                        <option value="0">OutOfStock</option>

                                    </select>
                                    <!--end::Select2-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the catlog status.</div>
                                    <!--end::Description-->

                                    <!--begin::Datepicker-->
                                    <div class="d-none mt-10">
                                        <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select
                                            publishing date and time</label>
                                        <input class="form-control flatpickr-input"
                                            id="kt_ecommerce_add_product_status_datepicker"
                                            placeholder="Pick date &amp; time" type="text" readonly="readonly">
                                    </div>

                                    <!--end::Datepicker-->
                                </div>

                                <!--end::Card body-->
                            </div>
                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                                <!--begin::Thumbnail settings-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Icon</h2>
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
                                                aria-label="Input Icon" data-bs-original-title="Input Icon"
                                                data-kt-initialized="1">
                                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                                    required="">

                                                <input type="hidden" name="avatar_remove">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->


                                        </div>
                                        <!--end::Image input-->

                                        <!--begin::Description-->
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Thumbnail settings-->

                                <!--end::Status-->

                                <!--begin::Category & tags-->

                                <!--end::Category & tags-->
                                <!--begin::Weekly sales-->

                                <!--end::Weekly sales-->
                                <!--begin::Template settings-->

                                <!--end::Template settings-->
                            </div>

                            <!--end::Thumbnail settings-->
                            {{-- @error('icon')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror --}}
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
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Product</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->

                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Product Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2"
                                            placeholder="Product name" value="" required />
                                        <!--end::Input-->
                                        @error('name')
                                            <div class="text-muted fs-7">
                                                {{ $message }}</div>
                                        @enderror
                                        <!--begin::Description-->

                                        <!--end::Description-->
                                    </div>
                                    <div class="mb-10 fv-row">

                                        <label class="required form-label">Product Category </label>
                                        <select class="form-select mb-2" name="product_category_id">
                                            <option value="">---Select---</option>
                                            @foreach ($product_categories as $categories)
                                                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    @csrf
                                    <!--end::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Quantity</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="number" name="quantity" class="form-control mb-2"
                                            placeholder="Quntatity" value="">
                                        <!--end::Input-->
                                        @error('quantity')
                                            <div class="text-muted fs-7">
                                                {{ $message }}</div>
                                        @enderror
                                        <!--begin::Description-->

                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label"> Sort Description</label>
                                        <!--end::Label-->

                                        <!--begin::Editor-->

                                        <div class="ql-toolbar ql-snow">

                                            <textarea style="height: 147px;width: 775px; resize: none;" name="sort_description" required=""> </textarea>




                                            <!--end::Editor-->

                                            <!--begin::Description-->
                                           @error('sort_description')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label">Description</label>
                                        <!--end::Label-->

                                        <!--begin::Editor-->

                                        <div class="ql-toolbar ql-snow">

                                            <textarea style="height: 147px;width: 775px; resize: none;" name="description" required=""> </textarea>




                                            <!--end::Editor-->

                                            <!--begin::Description-->
                                             @error('description')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Price</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="number" name="price" class="form-control mb-2" placeholder=""
                                            value="">
                                        <!--end::Input-->

                                        <!--begin::Description-->
                                         @error('price')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--begin::Input group-->

                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Media</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-2">
                                        <!--begin::Dropzone-->
                                        <div class="dropzone dz-clickable" id="kt_ecommerce_add_product_media">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <!--begin::Icon-->
                                                <i class="ki-duotone ki-file-up text-primary fs-3x"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">click to upload.</h3>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                                        required="" multiple="multiple">
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                        files</span>
                                                         @error('image')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Description-->

                                     @error('image')
                                        <div class="text-muted fs-7">
                                            {{ $message }}</div>
                                    @enderror
                                    <!--end::Description-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--begin::Meta options-->

                            <!--end::Meta options-->

                            <!--begin::Automation-->

                            <!--end::Automation-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->

                                <!--end::Button-->

                                <!--begin::Button-->
                                <input type="submit" id="" value=" Save Changes" class="btn btn-primary">
                                <span class="indicator-label">

                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
