@extends('layouts.theme')
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
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
Catlog List
</h1>
<!--end::Title-->


<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                                        <a href="../../../index.html" class="text-muted text-hover-primary">
                    Catlog                            </a>
                                </li>
                    <!--end::Item-->
                        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
                            
                <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                                        Catlog List                                            </li>
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
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_648c12889fa96">
<!--begin::Header-->
<div class="px-7 py-5">
<div class="fs-5 text-dark fw-bold">Filter Options</div>
</div>
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
        <input class="form-check-input" type="checkbox" value="1"/>
        <span class="form-check-label">
            Author
        </span>
    </label>
    <!--end::Options-->    

    <!--begin::Options-->    
    <label class="form-check form-check-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
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
<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
    <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
    <label class="form-check-label">
        Enabled
    </label>
</div>
<!--end::Switch-->
</div>
<!--end::Input group-->

<!--begin::Actions-->
<div class="d-flex justify-content-end">
<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>

<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
</div>
<!--end::Actions-->
</div>
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


    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Products-->
<div class="card card-flush">
<!--begin::Card header-->
<div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <!--begin::Card title-->
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product">
        </div>
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
        <a href={{route('catlogs.create')}} type="button" class="btn btn-primary" >
           
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
<div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
<thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0"><th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="
            
                
            
        " style="width: 29.9px;">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1">
            </div>
        </th><th class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Product: activate to sort column ascending" style="width: 256.375px;">Catlog </th><th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 129.5px;">Description</th><th class="text-end min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 116.762px;">Catlog Categories</th><th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 129.5px;"> Active Status</th><th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 129.5px;"> Approval Status</th><th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 131.913px;">Actions</th></tr>
</thead>
<tbody class="fw-semibold text-gray-600">
                
                
         @foreach($catlogs as $catlog)       
        <tr class="odd">
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1">
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <!--begin::Thumbnail-->
                  
                    <!--end::Thumbnail-->

                    <div class="ms-5">
                        <!--begin::Title-->
                        <a href="{{route('catlogs.show',$catlog->id)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{$catlog->name}}</a>
                        <!--end::Title-->
                    </div>
                </div>
            </td>
            <td class="text-end pe-0">
                <span class="fw-bold">{{$catlog->description}}</span>
            </td>
            <td class="text-end pe-0">
                <span class="fw-bold">01260008</span>
            </td>
                          
                         
                            <td class="text-end pe-0" data-order="Scheduled">
                <!--begin::Badges-->                    
                <div class="badge badge-light-primary">@if($catlog->is_active == 0)
                    Inactive
                    @else
                        Active
                    @endif</div>
                <!--end::Badges-->
            </td>
            <td class="text-end pe-0" data-order="Scheduled">
                <!--begin::Badges-->                    
                <div class="badge badge-light-primary">
                    @if($catlog->is_approved == 0)
                    DisApproved
                    @else
                        Approved
                    @endif
                </div>
                <!--end::Badges-->
            </td>
            <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    Actions
                    <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
<!--begin::Menu item-->
<div class="menu-item px-3">
    <a href={{route('catlogs.edit',$catlog->id)}} class="menu-link px-3">
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
</table></div><div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"><div class="dataTables_length" id="kt_ecommerce_products_table_length"><label><select name="kt_ecommerce_products_table_length" aria-controls="kt_ecommerce_products_table" class="form-select form-select-sm form-select-solid"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_ecommerce_products_table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_ecommerce_products_table_previous"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="kt_ecommerce_products_table_next"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="6" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div></div>
<!--end::Table-->    </div>
<!--end::Card body-->
</div>
<!--end::Products-->        </div>
<!--end::Content container-->
</div>


{{ $catlogs->links('admin.custom_pagination') }}


<!--end::Content-->					
    </div>
    <!--end::Content wrapper-->

                        
          
@endsection



