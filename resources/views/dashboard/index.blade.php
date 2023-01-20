@extends('client_layout')
@section('title', 'Thống kê')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1 h1 class="m-0">Tổng quát</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="staff-number"></h3>
                                <p>Số lượng nhân viên</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('staffs.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>23<sup style="font-size: 20px">%</sup></h3>
                                <p>Tăng trưởng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="new-staff"></h3>
                                <p>Nhân viên mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('staffs.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 id="new-notification"></h3>
                                <p>Thông báo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('notifications.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tổ chức nhân sự </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="150"></canvas>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix" id="organization-detail">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tiến độ dự án (%) </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChartProject" height="150"></canvas>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-primary"></i> Booking</li>
                                            <li><i class="far fa-circle text-primary"></i> Giao hàng</li>
                                            <li><i class="far fa-circle text-primary"></i> TMĐT</li>
                                            <li><i class="far fa-circle text-primary"></i> Fintech</li>
                                            <li><i class="far fa-circle text-primary"></i> Giáo dục</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nhân viên mới nhất</h3>
                                <div class="card-tools">
                                    <span class="badge badge-danger new-staff"></span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="javascript:">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Doanh thu (Đơn vị: USD) </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div id="revenue">
                                    <canvas id="revenue-statistic"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    // Get context with jQuery - using jQuery's .get() method.
    $.ajax({
        type: "GET",
        url: '/ajax/get-organization',
        success: function (data) {
            
            if(data != null) {
                let organizationInfo = data.data;
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')

                var departmentName = [];
                var countStaff = [];
                var detail = '';
                var html = '';
                for(i = 0; i < organizationInfo.length; i++) {
                    departmentName.push(organizationInfo[i].name);
                    countStaff.push(organizationInfo[i].staffs);
                    html += `<li><i class="far fa-circle text-primary"></i> `+ organizationInfo[i].name +`</li>`;
                }

                $("#organization-detail").html(html);
                
                var pieData = {
                    labels: departmentName,

                    datasets: [{
                        data: countStaff,
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#253873', '#5C1D68']
                    }]
                }
                
                var pieOptions = {
                    legend: {
                        display: false
                    }
                }

                // Create pie or douhnut chart
                var pieChart = new Chart(pieChartCanvas, {
                    type: 'doughnut',
                    data: pieData,
                    options: pieOptions
                })

            } else {
                console.log('Failed to load organization');
            }
        }
    });
    

    // Create pie or douhnut chart
    var pieChartPjCanvas = $('#pieChartProject').get(0).getContext('2d')

    var pieDataPj = {
        labels: [
            'Booking',
            'Giao hàng',
            'TMĐT',
            'Fintech',
            'Giáo dục'
        ],

        datasets: [
            {
                data: [10, 30, 50, 60, 46],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
            }
        ]
    }
    var pieOptionsPj = {
        legend: {
            display: false
        }
    }

    var pieChartProject = new Chart(pieChartPjCanvas, {
        type: 'doughnut',
        data: pieDataPj,
        options: pieOptionsPj
    })
    // end pieChart

    $.ajax({
        type: "GET",
        url: '/ajax/count-staff',
        data: '',
        success: function (data) {
            if(data != null) {
                $('#staff-number').text(data);
            } else {
                console.log('Failed to load staff number');
            }
        }
    });

    $.ajax({
        type: "GET",
        url: '/ajax/get-new-staff',
        data: '',
        success: function (data) {
            if(data != null) {
                $('#new-staff').text(data.length);
                $('.new-staff').text(data.length + ' nhân viên mới');
                var html = '';

                for(i = 0; i < data.length; i++) {
                    var startTime = new Date(data[i].created_at);
                    var diff = Math.round(new Date() - startTime);
                    var workingTime = (diff/1000/60/60/24).toFixed();

                    html += `
                                <li>
                                    <img src="{{ asset('images/avatar/`+ data[i].avatar +`') }}" alt="User Image" style="width: 100px;height: 100px;">
                                    <a class="users-list-name" href="#">`+ data[i].last_name + ' ' + data[i].first_name +`</a>
                                    <span class="users-list-date">`+ workingTime +` ngày</span>
                                </li>
                            `;

                }
                
                $(".users-list").html(html);
            } else {
                console.log('Failed to load new staff');
            }
        }
    });

    $.ajax({
        type: "GET",
        url: '/ajax/get-noti',
        data: '',
        success: function (data) {
            if(data != null) {
                let countNotification = 0;
                for(i = 0; i < data.length; i++) {
                    countNotification = data.length
                }
                $('#new-notification').text(countNotification);

            } else {
                console.log('Failed to load new notification');
            }
        }
    });

    //Chart revenue start
    var ctx = document.getElementById("revenue-statistic").getContext("2d");

    var data = {
        labels: ["Jan", "Feb", "Mars", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "2021",
                backgroundColor: "#EE2A0F",
                data: [3000, 2400, 5000, 2000, 5600, 3400, 1200, 5900, 4000, 8000, 20000, 30000]
            },
            {
                label: "2022",
                backgroundColor: "#08CE38",
                data: [2000, 5400, 4300, 7600, 15600, 13400, 13200, 12400, 22000, 28000, 32000, 53000]
            }
        ]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });
    // end chart
  </script>
  @endsection