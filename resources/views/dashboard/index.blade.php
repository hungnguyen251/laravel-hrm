@extends('client_layout')
@section('title', 'Thống kê')

@section('content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Tổng quát</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                              <li class="breadcrumb-item active">Tổng quát</li>
                          </ol>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
  
          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                              <div class="inner">
                                  <h3>20</h3>
  
                                  <p>Số lượng nhân viên</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-bag"></i>
                              </div>
                              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
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
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                              <div class="inner">
                                  <h3>14</h3>
                                  <p>Nhân viên mới</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-person-add"></i>
                              </div>
                              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                              <div class="inner">
                                  <h3>5</h3>
  
                                  <p>Thông báo</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-pie-graph"></i>
                              </div>
                              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <!-- ./col -->
                  </div>
                  <!-- /.row -->
                  <!-- Main row -->
              
                  <!-- /.row (main row) -->
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
                                          <!-- ./chart-responsive -->
                                      </div>
                                      <!-- /.col -->
                                      <div class="col-md-4">
                                          <ul class="chart-legend clearfix">
                                              <li><i class="far fa-circle text-danger"></i> Phòng kĩ thuật</li>
                                              <li><i class="far fa-circle text-success"></i> Phòng tài chính - kế toán</li>
                                              <li><i class="far fa-circle text-warning"></i> Phòng Marketing</li>
                                              <li><i class="far fa-circle text-info"></i> Phòng IT</li>
                                              <li><i class="far fa-circle text-primary"></i> Ban lãnh đạo</li>
                                          </ul>
                                      </div>
                                      <!-- /.col -->
                                  </div>
                                  <!-- /.row -->
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer p-0">
                                  <ul class="nav nav-pills flex-column">
                                      <li class="nav-item">
                                          <a href="#" class="nav-link">
                                          Nhân viên mới
                                              <span class="float-right text-danger">
                                                  <i class="fas fa-arrow-down text-sm"></i>
                                              12%</span>
                                          </a>
                                      </li>
  
                                      <li class="nav-item">
                                          <a href="#" class="nav-link">
                                          Nhân viên nghỉ việc
                                              <span class="float-right text-success">
                                                  <i class="fas fa-arrow-up text-sm"></i> 4%
                                              </span>
                                          </a>
                                      </li>
  
                                  </ul>
                              </div>
                              <!-- /.footer -->
                          </div>
                      </div>
  
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">Custom </h3>
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
                                              <canvas id="pieChart1" height="150"></canvas>
                                          </div>
                                          <!-- ./chart-responsive -->
                                      </div>
                                      <!-- /.col -->
                                      <div class="col-md-4">
                                          <ul class="chart-legend clearfix">
                                              <li><i class="far fa-circle text-danger"></i> Custom</li>
                                              <li><i class="far fa-circle text-success"></i> Custom</li>
                                              <li><i class="far fa-circle text-warning"></i> Custom</li>
                                              <li><i class="far fa-circle text-info"></i> Custom</li>
                                              <li><i class="far fa-circle text-primary"></i> Custom</li>
                                          </ul>
                                      </div>
                                      <!-- /.col -->
                                  </div>
                                  <!-- /.row -->
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer p-0">
                                  <ul class="nav nav-pills flex-column">
                                      <li class="nav-item">
                                          <a href="#" class="nav-link">
                                          Custom
                                              <span class="float-right text-danger">
                                                  <i class="fas fa-arrow-down text-sm"></i>
                                              12%</span>
                                          </a>
                                      </li>
  
                                      <li class="nav-item">
                                          <a href="#" class="nav-link">
                                          Custom
                                              <span class="float-right text-success">
                                                  <i class="fas fa-arrow-up text-sm"></i> 4%
                                              </span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <!-- USERS LIST -->
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">Nhân viên mới nhất</h3>
                                  <div class="card-tools">
                                      <span class="badge badge-danger">8 Nhân viên mới</span>
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
                                      <li>
                                          <img src="./public/dist/img/user1-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Trần Văn Chiến</a>
                                          <span class="users-list-date">Hôm nay</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user5-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Vũ Thị Hợp</a>
                                          <span class="users-list-date">2 tháng trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user3-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Đặng Thị Kim Anh</a>
                                          <span class="users-list-date">7 tháng trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user7-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Đỗ Thành Huy</a>
                                          <span class="users-list-date">1 năm trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user6-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Phạm Hữu Nghĩa</a>
                                          <span class="users-list-date">2 năm trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user8-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Trần Văn Sử</a>
                                          <span class="users-list-date">2 năm trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user4-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Nguyễn Thị Hà Thu</a>
                                          <span class="users-list-date">2 năm trước</span>
                                      </li>
                                      <li>
                                          <img src="./public/dist/img/user1-128x128.jpg" alt="User Image">
                                          <a class="users-list-name" href="#">Hoàng Quang Mạnh</a>
                                          <span class="users-list-date">2 năm trước</span>
                                      </li>
                                  </ul>
                                  <!-- /.users-list -->
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer text-center">
                                  <a href="javascript:">Xem tất cả</a>
                              </div>
                              <!-- /.card-footer -->
                          </div>
                          <!--/.card -->
                      </div>
                  </div>
                  <!-- /.row -->
  
                  <!-- Timelime example  -->
                  <div class="row">
                      <div class="col-sm-6">
                          <h4>Thông báo </h4>
                      </div>
                      <div class="col-md-12">
                          <!-- The time line -->
                          <div class="timeline">
                          <!-- timeline time label -->
                              <div class="time-label">
                                  <span class="bg-red">02 Nov. 2022</span>
                              </div>
                              <!-- /.timeline-label -->
                              <!-- timeline item -->
                              <div>
                                  <i class="fas fa-user bg-red"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                      <h3 class="timeline-header"><a href="#">Đặng Thị Kim Anh</a> đã gửi 1 thông báo</h3>
  
                                      <div class="timeline-body">
                                          Đơn xin nghỉ phép
                                      </div>
                                  </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                  <i class="fas fa-user bg-green"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fas fa-clock"></i> 50 mins ago</span>
                                      <h3 class="timeline-header no-border"><a href="#">Phạm Hữu Nghĩa</a> đã phê duyệt lương tháng 10</h3>
                                  </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline time label -->
                              <div class="time-label">
                                  <span class="bg-green">30 Oct. 2020</span>
                              </div>
                              <!-- /.timeline-label -->
                              <!-- timeline item -->
                              <div>
                                  <i class="fas fa-sign-out-alt bg-purple"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                      <h3 class="timeline-header"><a href="#">Trần Văn Sử</a> đã xin nghỉ việc</h3>
                                  </div>
                              </div>
                              <!-- END timeline item -->
                              <div>
                                  <i class="fas fa-clock bg-gray"></i>
                              </div>
                          </div>
                      </div>
                  <!-- /.col -->
                  </div>
              </div>
          <!-- /.timeline -->
          </section>
      </div>
      <!-- /.content -->
      <!-- /.content-wrapper -->
  
  </div>
  <!-- ./wrapper -->
  
  <script>
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = {
          labels: [
              'Phòng kĩ thuật',
              'Phòng tài chính - kế toán',
              'Phòng Marketing',
              'Phòng IT',
              'Ban lãnh đạo'
          ],
  
          datasets: [
              {
                  data: [10, 3, 4, 6, 4],
                  backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
              }
          ]
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
  
  
      var pieChartCanvas1 = $('#pieChart1').get(0).getContext('2d')
      var pieData1 = {
          labels: [
              'Phòng kĩ thuật',
              'Phòng tài chính - kế toán',
              'Phòng Marketing',
              'Phòng IT',
              'Ban lãnh đạo'
          ],
  
          datasets: [
              {
                  data: [10, 3, 4, 6, 4],
                  backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
              }
          ]
      }
      var pieOptions = {
          legend: {
              display: false
          }
      }
  
      // Create pie or douhnut chart
      var pieChart1 = new Chart(pieChartCanvas1, {
          type: 'doughnut',
          data: pieData1,
          options: pieOptions
      })
  </script>
  @endsection