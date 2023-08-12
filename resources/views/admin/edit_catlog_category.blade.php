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
                            Catalog Category Form
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="../../../index.html" class="text-muted text-hover-primary">
                                    Catalog </a>
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
                    <form id="kt_ecommerce_add_product_form"
                        action="{{ route('catlog_categories.update', $catlog_category->id) }}" method="post"
                        enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row"
                        data-kt-redirect="products.html">
                        <!--begin::Aside column-->
                        @method('PUT')
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4" style="height: 420px;">
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
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Input Icon">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="icon" accept=".png, .jpg, .jpeg" required />
                                            @error('icon')
                                                <div class="text-muted fs-7">
                                                    {{ $message }}</div>
                                            @enderror
                                            <input type="hidden" name="avatar_remove" />
                                            <img src="{{ $catlog_category->icon }}"
                                                class="image-input-wrapper w-150px h-150px"
                                                style=" margin-bottom: -467px; margin-left: -157px;">
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Description-->
                                    {{-- <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div> --}}
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
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Category</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Category Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2"
                                            placeholder="Category name" value="{{ $catlog_category->name }}" required />
                                        <!--end::Input-->

                                        <!--begin::Description-->
                                        @error('name')
                                            <div class="text-muted fs-7">
                                                {{ $message }}</div>
                                        @enderror
                                        <!--end::Description-->
                                    </div>

                                    @csrf
                                    <!--end::Input group-->

                                    <!--begin::Input group-->

                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
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
