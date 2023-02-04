@extends('client_layout')
@section('title', 'Chat')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/chat.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-xxl m-0">
    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <!-- Row start -->
                    <div class="row no-gutters"  id="app">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    <li class="person" data-chat="person1">
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <span class="status away"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">Nhóm công ty</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>To: <span class="name">Group</span></span>
                            </div>
                            <div class="chat-container">
                                <chat-messages :messages="messages"></chat-messages>
                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Content wrapper end -->
</div>
@endsection