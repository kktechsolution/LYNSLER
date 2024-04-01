@extends('layouts.theme')
@section('content')
<br>
<div class="container-fluid">
    <!--  Row 1 -->


    <div class="row">
      <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
          <div class="position-relative">
                    </div>
          <div class="card-body pt-3 p-4">
           <a href="{{route('ecom_orders.index')}}"> <h6 class="fw-semibold fs-4">Ecommerce Orders</h6></a>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">{{$total_ecom_orders}} <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
          <div class="position-relative">
        </div>
          <div class="card-body pt-3 p-4">
            <a href="{{route('custom_orders.index')}}"><h6 class="fw-semibold fs-4">Custom Orders</h6></a>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">{{$total_custom_orders}}</span></h6>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
          <div class="position-relative">
            </div>
          <div class="card-body pt-3 p-4">
            <a href="{{route('product_categories.index')}}"><h6 class="fw-semibold fs-4">Product Categories</h6></a>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">{{$total_product_categories}}</h6>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
          <div class="position-relative">
             </div>
          <div class="card-body pt-3 p-4">
            <a href="{{route('products.index')}}"><h6 class="fw-semibold fs-4">Products</h6></a>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">{{$total_products}}</h6>

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
                      </div>
            <div class="card-body pt-3 p-4">
             <a href="{{route('transactions.index')}}"> <h6 class="fw-semibold fs-4">Transactions</h6></a>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">{{$total_transactions}} <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
          </div>
            <div class="card-body pt-3 p-4">
              <a href="{{route('catlog_categories.index')}}"><h6 class="fw-semibold fs-4">Catlog Categories</h6></a>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">{{$total_catlog_categories}}</span></h6>

              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
              </div>
            <div class="card-body pt-3 p-4">
              <a href="{{route('catlogs.index')}}"><h6 class="fw-semibold fs-4">Catlogs</h6></a>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">{{$total_catlog}}</h6>

              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
               </div>
            <div class="card-body pt-3 p-4">
              <a href="#"><h6 class="fw-semibold fs-4">User</h6></a>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">{{$total_user}}</h6>

              </div>
            </div>
          </div>
        </div>
      </div>
      <br>

    <div class="row">

        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Transaction Id</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Order Id</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Amount</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Status</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Name</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $trans)
                    <tr>
                      <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$trans->id}}</h6></td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{$trans->order_id}}</h6>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$trans->amount}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <span class="badge bg-primary rounded-3 fw-semibold"> {{$trans->payment_status}}</span>
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">{{$trans->user->name}}</h6>
                        <span class="fw-normal">{{$trans->user->type}}</span>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
@endsection
