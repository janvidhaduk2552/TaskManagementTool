@extends('main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-left">
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <div class="row">   
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="bg">
                        <div class="clock">
                            <div class="outer-clock-face">
                                <div class="marking marking-one"></div>
                                <div class="marking marking-two"></div>
                                <div class="marking marking-three"></div>
                                <div class="marking marking-four"></div>
                                <div class="inner-clock-face">
                                    <div class="hand hour-hand"></div>
                                    <div class="hand min-hand"></div>
                                    <div class="hand second-hand"></div>
                                </div>
                            </div>
                        </div>
                        <div class="date text-white">
                            <h3>{{$date}} {{$month}} {{$year}}</h3>
                            <h5>{{$dayname}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <a class="col-lg-3 col-sm-6" href="#" style="text-decoration:none;">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3>Users </h3>
                        <span class="counter-value">6556</span>
                    </div>
                </a>
                <a class="col-lg-3 col-sm-6" href="{{ url('/') }}" style="text-decoration:none;">
                    <div class="counter orange">
                        <div class="counter-icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h3>General Category</h3>
                        <span class="counter-value">6767</span>
                    </div>
                </a>
                <a class="col-lg-3 col-sm-6" href="{{ url('/') }}" style="text-decoration:none;">
                    <div class="counter green">
                        <div class="counter-icon">
                            <i class="fa fa-tree"></i>
                        </div>
                        <h3>Upcoming Festivals</h3>
                        <span class="counter-value">4545</span>
                    </div>
                </a>
                <a class="col-lg-3 col-sm-6" href="{{ url('/') }}" style="text-decoration:none;">
                    <div class="counter blue">
                        <div class="counter-icon">
                            <i class="fa fa-university"></i>
                        </div>
                        <h3>Business Category</h3>
                        <span class="counter-value">414</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <a class="col-lg-3 col-sm-6" href="{{ url('/') }}" style="text-decoration:none;">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fa fa-sliders"></i>
                        </div>
                        <h3>Premium User</h3>
                        <span class="counter-value">14</span>
                    </div>
                </a>
               
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title m-0" style="font-size: 1.8rem;">Users</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-md-12 order-md-2 order-first">
                            <div class="d-flex justify-content-end">
                                <!-- <a href="{{ url('/AddBusinessCategory') }}" class="btn btn-md btn-block text-white"
                                    style=" padding: 12px; background-color: #2099d8;font-size: 14px;"> Add Category</a> -->
                            </div>
                        </div>
                        </p>
                        <div class="table-responsive">
                            <table class="table  table-striped text-center" id="example">
                                <thead class="secondary text-white"
                                    style=" background-image: -webkit-linear-gradient(top, #1478ad 0%, #38BAFF 100%) !important;">
                                    <tr>
                                        <th style="height: 28px;text-align: center">No</th>
                                        <th style="height: 28px;text-align: center">UserId</th>
                                        <th style="height: 28px;text-align: center">Email</th>
                                        <th style="height: 28px;text-align: center">Link</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                  
                                    <tr>
                                        <td>1</td>
                                        <td>14</td>
                                        <td>ftguhgjghj</td>
                                        <td  style="width:20%">
                                      
                                        <a href="{{ url('/') }}" class="btn" style="background-color:#b81242;color:#fff">
                                                        View Business</a>
                                        </td>
                                    </tr>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<"dt-filter-spacer"f><ip>',
                buttons: [
                    'pdf', 'excel', 'csv', 'print', 'copy',
                ]
            });
        });
    </script>
    @endsection('content')
