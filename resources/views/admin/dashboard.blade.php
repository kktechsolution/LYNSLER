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
                        <a href="{{ route('ecom_orders.index') }}">
                            <h6 class="fw-semibold fs-4">Ecommerce Orders</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_ecom_orders }} <span
                                    class="ms-2 fw-normal text-muted fs-3"></span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{ route('custom_orders.index') }}">
                            <h6 class="fw-semibold fs-4">Custom Orders</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_custom_orders }}</span></h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{ route('product_categories.index') }}">
                            <h6 class="fw-semibold fs-4">Product Categories</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_product_categories }}</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{ route('products.index') }}">
                            <h6 class="fw-semibold fs-4">Products</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_products }}</h6>

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
                        <a href="{{ route('transactions.index') }}">
                            <h6 class="fw-semibold fs-4">Transactions</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_transactions }} <span
                                    class="ms-2 fw-normal text-muted fs-3"></span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{ route('catlog_categories.index') }}">
                            <h6 class="fw-semibold fs-4">Catlog Categories</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_catlog_categories }}</span></h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{ route('catlogs.index') }}">
                            <h6 class="fw-semibold fs-4">Catlogs</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_catlog }}</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                    </div>
                    <div class="card-body pt-3 p-4">
                        <a href="{{route('customers.index')}}">
                            <h6 class="fw-semibold fs-4">Customers</h6>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">{{ $total_user }}</h6>

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
                                    @foreach ($transactions as $trans)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $trans->id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $trans->order_id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $trans->amount }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary rounded-3 fw-semibold">
                                                        {{ $trans->payment_status }}</span>
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{ $trans->user->name }}</h6>
                                                <span class="fw-normal">{{ $trans->user->type }}</span>

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
    <div>

        <div class="text-center " style="width: 45%;margin-left:50px;margin-top:50px;">
            <canvas id="columnchart"></canvas>

        </div>
        <div class="text-center " style="width: 45%;margin-left:50px;margin-top:50px;">
            <canvas id="columnchart_1"></canvas>

        </div>
    </div>
    <div>

        <div class="col-xs-3 text-center " style="width: 40%;margin-top:50px;">
            <canvas id="piechart"></canvas>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        var chartData = {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [{
                fillColor: "#79D1CF",
                strokeColor: "#79D1CF",
                data: [60, 80, 81, 56, 55, 40],
            }, ],
        };

        var data = {
            labels: ["female", "Male	"],
            datasets: [{
                data: [40, 60],
                backgroundColor: ["#FF6384", "#36A2EB"],
                hoverBorderColor: ["#eee", "#eee"],
            }, ],
        };
        var piectx = document.getElementById("piechart").getContext("2d");
        var pieChart = new Chart(piectx, {
            type: "pie",
            data: data,
            options: {
                showAllTooltips: true,
                animation: {
                    animateRotate: true,
                    animateScale: true,
                },
                elements: {
                    arc: {
                        borderColor: "#fff",
                    },
                },
                title: {
                    display: true,
                    text: "Custom Chart Title",
                    fontSize: 18,
                    padding: 20,
                    fontColor: "#999",
                    fontStyle: "Normal",
                    fontFamily: "Montserrat",
                    fullWidth: true,
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        boxWidth: 30,
                        fontColor: "#999",
                        fontFamily: "Montserrat",
                        fullWidth: true,
                    },
                },
                tooltips: {
                    enabled: false,
                    bodyFontColor: "#efefef",
                    fontStyle: "Normal",
                    bodyFontFamily: "Montserrat",
                    cornerRadius: 2,
                    backgroundColor: "#333",
                    xPadding: 7,
                    yPadding: 7,
                    caretSize: 5,
                    bodySpacing: 10,
                },
            },
        });

        var columnctx = document.getElementById("columnchart").getContext("2d");
        var columnChart = new Chart(columnctx, {
            type: "bar",
            data: {
                labels: [
                    "January", "February", "March", "April", "May", "June"
                ],
                datasets: [{
                    label: "revenue Chart",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        gridLines: {
                            zeroLineWidth: 10,
                        },
                    }, ],
                },
            },
            onAnimationComplete: function() {
                var ctx = this.chart.ctx;
                ctx.font = this.scale.font;
                ctx.fillStyle = this.scale.textColor;
                ctx.textAlign = "center";
                ctx.textBaseline = "bottom";

                this.datasets.forEach(function(dataset) {
                    dataset.bars.forEach(function(bar) {
                        ctx.fillText(
                            dataString + "#",
                            position.x,
                            position.y - fontSize / 2 - padding
                        );
                    });
                });
            },
        });

        var columnctx = document.getElementById("columnchart_1").getContext("2d");
        var columnChart_1 = new Chart(columnctx, {
            type: "bar",
            data: {
                labels: [
                    "	Backflipt Product	",
                    "Backflipt Product",
                    "Backflipt Product",
                    "Backflipt Product",
                    "Backflipt Product",
                    "Backflipt Product",
                ],
                datasets: [{
                    label: "Total sale",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: "rgb(160, 194, 250)",
                    borderColor: "rgb(52, 115, 217)",
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        gridLines: {
                            zeroLineWidth: 10,
                        },
                    }, ],
                },
            },
            onAnimationComplete: function() {
                var ctx = this.chart.ctx;
                ctx.font = this.scale.font;
                ctx.fillStyle = this.scale.textColor;
                ctx.textAlign = "center";
                ctx.textBaseline = "bottom";

                this.datasets.forEach(function(dataset) {
                    dataset.bars.forEach(function(bar) {
                        ctx.fillText(
                            dataString + "#",
                            position.x,
                            position.y - fontSize / 2 - padding
                        );
                    });
                });
            },
        });

        // var ctxx = document.getElementById("columnchart").getContext("2d");
        // var myBar = new Chart(ctxx).Bar(chartData, {
        //     showTooltips: false,
        //     onAnimationComplete: function () {

        //         var ctx = this.chart.ctx;
        //         ctx.font = this.scale.font;
        //         ctx.fillStyle = this.scale.textColor
        //         ctx.textAlign = "center";
        //         ctx.textBaseline = "bottom";

        //         this.datasets.forEach(function (dataset) {
        //             dataset.bars.forEach(function (bar) {
        //                 ctx.fillText(bar.value, bar.x, bar.y - 5);
        //             });
        //         })
        //     }
        // });
    </script>
    <style>
        .text-center {
            max-height: 400px;
            margin: auto;
            float: left;
        }

        .col-xs-6 {
            max-height: 400px;
            margin: auto;
            float: left;
        }
    </style>
@endsection
