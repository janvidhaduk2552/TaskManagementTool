@extends('main')
@section('content')
<?php 
$totaltask = DB::table('task_tbl')->where('user_id',Auth::id())->count();
?>
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
                <a class="col-lg-3 col-sm-6" href="/Task" style="text-decoration:none;">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3>Task </h3>
                        <span class="counter-value">{{$totaltask}}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endsection('content')