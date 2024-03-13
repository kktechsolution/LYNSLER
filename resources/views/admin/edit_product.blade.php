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
                                Edit Product </li>
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
                    <form id="kt_ecommerce_add_product_form" action="{{ route('products.update', $product->id) }}"
                        method="post" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row"
                        data-kt-redirect="products.html">
                        @method('PATCH')
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
                                        <option value="1" {{ $product->is_active == true ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $product->is_active == false ? 'selected' : '' }}>Inactive
                                        </option>


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
                                        <option value="1" {{ $product->in_stock == true ? 'selected' : '' }}>InStock
                                        </option>
                                        <option value="0" {{ $product->in_stock == false ? 'selected' : '' }}>
                                            OutOfStock</option>

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
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Is Featured</h2>
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
                                    <select class="form-select mb-2" name="featured" data-hide-search="true"
                                        data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                        <option value="">---Select---</option>
                                        <option value="1" {{ $product->featured == true ? 'selected' : '' }}>
                                            Featured</option>
                                        <option value="0" {{ $product->featured == false ? 'selected' : '' }}>Normal
                                        </option>

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
                                            <div class="image-input-wrapper w-170px h-170px"><img
                                                    style="height: 115px; width:115px" src="{{ $product->image }}"></img>
                                            </div>
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
                                                <input type="file" name="icon" accept=".png, .jpg, .jpeg"
                                                    >

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

                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10 m-2">
                                <!--begin::Thumbnail settings-->
                                <div class="card card-flush py-4">
                                    <div class="main_container p-3">
                                        @php
                                            $attributes = json_decode($product->attributes, true);
                                        @endphp



                                        @if (is_array($attributes))
                                            @foreach ($attributes as $colorCode => $sizes)
                                                <div class="colur_picker_container" style="margin-top: 10px">
                                                    <div class="colur_picker row">
                                                        <div class="col-12" style="display: flex; align-items: center;">
                                                            <label style="margin-right: 5px; font-weight: 500"
                                                                for="favcolor">Color:</label>
                                                            <input type="color" class="colorPicker" name="favcolor"
                                                                value="#{{ $colorCode }}" onchange="updateColor(this)">


                                                            <b style="margin-left: 5px;width:185px">Color code: <code
                                                                    class="colorCodeValue">{{ $colorCode }}</code></b>
                                                            <button
                                                                style="border: none; background-color: #fff !important;"
                                                                onclick="removeColorPicker(this)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                    height="30" fill="currentColor"
                                                                    class="bi bi-file-minus" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                                                                    <path
                                                                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="col-12"
                                                            style="display: flex; align-items: center; margin-top: 5px;">
                                                            <label for="favcolor"
                                                                style="margin-right: 5px; font-weight: 500">Size:</label>
                                                            <input style="width: 100px;" type="text" class="favsize"
                                                                name="favsize" value="{{ implode(',', $sizes) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Error: Invalid attribute format</p>
                                        @endif
                                    </div>
                                    <div class="add_but mt-5" style="margin-left: 5px">
                                        <button class="btn btn-primary" onclick="addColorPicker(event)">Add</button>
                                    </div>
                                    <!-- Additional hidden input for storing color and size data -->
                                    <input type="hidden" id="colorSizeData" name="attributes" value="">

                                </div>
                            </div>
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
                                        <h2> Edit Product</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">

                                        <label class="required form-label">Product Category </label>
                                        <select class="form-select mb-2" name="product_category_id">
                                            <option value="">---Select---</option>
                                            @foreach ($product_categories as $categories)
                                                <option value="{{ $categories->id }}"
                                                    @if ($product->product_category_id == $categories->id) selected @endif>
                                                    {{ $categories->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Product Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2"
                                            placeholder="Product name" value="{{ $product->name }}" required />
                                        <!--end::Input-->
                                        @error('name')
                                            <div class="text-muted fs-7">
                                                {{ $message }}</div>
                                        @enderror
                                        <!--begin::Description-->

                                        <!--end::Description-->
                                    </div>

                                    @csrf
                                    <!--end::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Quantity</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="number" name="product_name" class="form-control mb-2"
                                            placeholder="Quntatity" value="{{ $product->quantity }}">
                                        <!--end::Input-->

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

                                            <textarea style="height: 147px;width: 775px; resize: none;" name="sort_description" required="">{{ $product->sort_description }} </textarea>




                                            <!--end::Editor-->

                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set a description to the product for better
                                                visibility.</div>
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

                                            <textarea style="height: 147px;width: 775px; resize: none;" name="description" required="">{{ $product->description }} </textarea>




                                            <!--end::Editor-->

                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set a description to the catlog for better
                                                visibility.</div>
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
                                            value="{{$product->price}}">
                                        <!--end::Input-->

                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Price</div>
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
                                                    <input type="file" name="img1" accept=".png, .jpg, .jpeg"
                                                        multiple="multiple">
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                        files</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        {{-- zishan --}}
                                        {{-- {{ $product->attributes }}
                                        <div id="jsonDisplay"></div> --}}

                                        {{-- <div id="jsonDisplay"></div> --}}
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the product media gallery.</div>
                                    <!--end::Description-->

                                    <div class="row">
                                        @foreach ($product->product_images as $image)
                                            <div class="col-3"><img style="height: 170px; width:170px;margin-top:10px"
                                                    src="{{ $image->image }}"></div>
                                        @endforeach

                                    </div>
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
                                <input type="submit" id="" onclick="submitForm()" value=" Save Changes" class="btn btn-primary">
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
    <script>
        function addColorPicker(e){
            e.preventDefault();
            // Clone the existing color picker row
            var clone = document.querySelector('.colur_picker').cloneNode(true);

            // Clear input values in the cloned row
            var inputs = clone.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.value = '';
            });

            // Create a new container for the cloned row
            var newContainer = document.createElement('div');
            newContainer.classList.add('colur_picker_container');
            newContainer.appendChild(clone);
            newContainer.style.marginTop = '10px';

            // Append the new container next to the existing container
            document.querySelector('.main_container').appendChild(newContainer);
        }

        function removeColorPicker(button) {
            // Get the parent container of the button and remove it
            var container = button.closest('.colur_picker_container'); // Assuming the button is inside two divs
            container.parentNode.removeChild(container);
        }

        // function updateColor(input, colorCode) {
        //     // Update the color code display in the same row
        //     input.closest('.colur_picker').querySelector('.colorCodeValue').textContent = colorCode;
        // }
    </script>
    <script>
        function updateColor(colorPicker, colorCode) {
            // Find the parent container of the color picker
            var container = colorPicker.closest('.colur_picker');

            // Find the color code display element within the same row
            var colorCodeDisplay = container.querySelector('.colorCodeValue');

            // Get the color code from the colorPicker value
            var colorCode = colorPicker.value;

            // Update the color code display in the same row
            colorCodeDisplay.textContent = colorCode;
            console.log(colorCode);
            console.log("color update");
        }
    </script>
    <script>
        function submitForm() {
            // Create an object to store color codes and sizes
            var colorSizeObject = {};

            // Get all color pickers and sizes
            var colorPickers = document.querySelectorAll('.colorPicker');
            var sizeInputs = document.querySelectorAll('.favsize');

            // Iterate through each color picker
            colorPickers.forEach(function(colorPicker, index) {
                // Get the color code and sizes for each column
                var colorCode = colorPicker.value.substr(1); // Exclude the '#' from the color code
                var sizes = sizeInputs[index].value.split(',');

                // Store the color code and sizes in the object
                colorSizeObject[colorCode] = sizes;
            });

            // Convert the object to JSON string
            var jsonString = JSON.stringify(colorSizeObject);

            // Add the JSON string to a hidden input in the form
            document.getElementById('colorSizeData').value = jsonString;
            console.log(jsonString);

             // Display the JSON string in the div
    document.getElementById('jsonDisplay').innerText = JSON.stringify(jsonString, null, 2);

            // Submit the form
            // document.getElementById('kt_ecommerce_add_product_form').submit();
        }
    </script>


    <!--end::Wrapper-->
@endsection
