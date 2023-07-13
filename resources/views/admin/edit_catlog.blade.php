@extends('layouts.theme')
@section('content')



<!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                                            
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 " 
     
         >

            <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            
    

<!--begin::Page title-->
<div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        Catlog Form
            </h1>
    <!--end::Title-->

            
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    <a href="../../../index.html" class="text-muted text-hover-primary">
                               Catlog                          </a>
                                            </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                                        
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                   Add Catlog                                        </li>
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
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_648c1282b30b5">
    <!--begin::Header-->

    <!--end::Header-->

    <!--begin::Menu separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Menu separator-->

    <!--begin::Form-->
   
    <!--end::Form-->
</div>
<!--end::Menu 1-->        </div>
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
<div id="kt_app_content" class="app-content  flex-column-fluid " >
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Form-->
<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="{{route('catlogs.update',$catlog->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->

<!--end::Thumbnail settings-->
        <!--begin::Status-->
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
                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
        
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Select2-->
                <select class="form-select mb-2" name="is_active" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                    <option value=""></option>

                    <option value="1" {{  $catlog->is_active == true ? 'selected' : '' }} >Active</option>
                    <option value="0" {{  $catlog->is_active == false ? 'selected' : '' }}>Inactive</option>
                   
                </select>
                <!--end::Select2-->
        
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the catlog status.</div>
                <!--end::Description-->
        
                <!--begin::Datepicker-->
                <div class="d-none mt-10">
                    <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                    <input class="form-control flatpickr-input" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" type="text" readonly="readonly">
                </div>
                <!--end::Datepicker-->
            </div>
            <!--end::Card body-->
        </div>
<!--end::Status-->
   <!--begin::Status-->
   <div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2> Approval Status</h2>
        </div>
        <!--end::Card title-->
        
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Select2-->
        <select class="form-select mb-2" name="is_approved" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
            <option value=""></option>
            <option value="1"  {{  $catlog->is_approved == true ? 'selected' : '' }} >Approve</option>
            <option value="0"  {{  $catlog->is_approved == false ? 'selected' : '' }}>Disapprove</option>
           
        </select>
        <!--end::Select2-->

        <!--begin::Description-->        <!--end::Description-->

        <!--begin::Datepicker-->
       
        <!--end::Datepicker-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Status-->
<!--begin::Category & tags-->

<!--end::Category & tags-->
        <!--begin::Weekly sales-->

<!--end::Weekly sales-->
        <!--begin::Template settings-->

<!--end::Template settings-->    </div>
    <!--end::Aside column-->

    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2" role="tablist">
    <!--begin:::Tab item-->
   
    <!--end:::Tab item-->

    <!--begin:::Tab item-->
  
    <!--end:::Tab item-->

    </ul>
<!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    
<!--begin::General options-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Catlog</h2>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required form-label">Catlog Name</label>
            <!--end::Label-->

            <!--begin::Input-->
                        <input type="text" name="name" class="form-control mb-2" placeholder="Catlog name" value="{{$catlog -> name }}" >
            <!--end::Input-->

            <!--begin::Description-->
            @error('name')
            <div class="text-muted fs-7">
               {{$message}}</div>
            @enderror
            <!--end::Description-->
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div>
            <!--begin::Label-->
            <label class="form-label">Description</label>
            <!--end::Label-->

            <!--begin::Editor-->
            
            <div class="ql-toolbar ql-snow">
              
                <textarea style="height: 147px;width: 775px; resize: none;" name="description" >{{$catlog -> description}} </textarea>
                    
                   
                    @error('description')
            <div class="text-muted fs-7">
               {{$message}}</div>
            @enderror
               
            
            <!--end::Editor-->

            <!--begin::Description-->
            <div class="text-muted fs-7">Set a description to the catlog for better visibility.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card header-->
</div>
<!--end::General options-->
<label style="
font-size: 13px;
margin-left: 34px;
">Catlog Category </label>
<select class="form-select mb-2" name="catlog_category_id" style="margin-left: 31px;width: 798px;">
    <option value="">---Select---</option>
    @foreach ($catlog_categories as $categories)
    <option value="{{$categories->id}}" {{ $categories->id == $catlog->catlog_category_id ? 'selected' : '' }}>{{$categories->name}}</option>
        
    @endforeach
    
   
</select>
<!--begin::Media-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Front Image</h2>
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
                    <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>                    <!--end::Icon-->
                    <!--begin::Info-->
                    <div class="ms-4">
                        <img src="{{$catlog->img1}}" style="
                        height: 40px;
                    ">
                        <input type="file" name="img1" accept=".png, .jpg, .jpeg" >
                        
                        @error('img1')
                        <div class="text-muted fs-7">
                            {{$message}}</div>
                        @enderror
                    </div>
                    
                    <!--end::Info-->
                </div>
            </div>
            <div class="card-header" style="margin-left: -27px;">
                <div class="card-title">
                    <h2>Side Image</h2>
                </div>
            </div>
            <div class="dropzone dz-clickable" id="kt_ecommerce_add_product_media">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>                    <!--end::Icon-->
                    <!--begin::Info-->
                    <div class="ms-4">
                        <img src="{{$catlog->img2}}" style="
                        height: 40px;
                    ">
                        <input type="file" name="img2" accept=".png, .jpg, .jpeg" >
                        @error('img2')
                        <div class="text-muted fs-7">
                            {{$message}}</div>
                    
                        @enderror
                    </div>
                   
                    <!--end::Info-->
                </div>
               
            </div>
            <div class="card-header" style="margin-left: -27px;">
                <div class="card-title">
                    <h2>Back Image</h2>
                </div>
            </div>
            <div class="dropzone dz-clickable" id="kt_ecommerce_add_product_media">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>                    <!--end::Icon-->
                    <!--begin::Info-->
                    <div class="ms-4">
                        <img src="{{$catlog->img3}}" style="
                        height: 40px;
                    ">
                        <input type="file" name="img3" accept=".png, .jpg, .jpeg" >
                        @error('img3')
                        <div class="text-muted fs-7">
                            {{$message}}</div>
                        @enderror
                    </div>
                    
                    <!--end::Info-->
                </div>
            </div>
            <!--end::Dropzone-->
        </div>
        <!--end::Input group-->

        <!--begin::Description-->
        <div class="text-muted fs-7">Set the catlog media gallery.</div>
        <!--end::Description-->
    </div>
    <!--end::Card header-->
</div>
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

<!--end::Meta options-->                </div>
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
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>
<!--end::Form-->        </div>
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



