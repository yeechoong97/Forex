@extends('layouts.default')
@section('content')


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" /> -->
<div class="container" style="height:1250px;margin-top:130px;">
<div class="main-body p-0 my-3" style="height:95%;border:1px solid #cbd5e0;">
    <div class="inner-wrapper">
        <!-- Inner sidebar -->
        <div class="inner-sidebar">
            <!-- Inner sidebar header -->
            <div class="inner-sidebar-header justify-content-center">
                <a class="btn-primary form-control has-icon remove-decoration" data-toggle="modal" data-target="#createForum" >
                    New Discussion
                </a>
            </div>
            <!-- /Inner sidebar header -->

            <!-- Inner sidebar body -->
            <div class="inner-sidebar-body p-0">
                <div class="p-3 h-100" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -16px;">
                        <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                                    <div class="simplebar-content p-3" >
                                        <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon active">All Threads</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Popular this week</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div> -->
                    </div>
                    <!-- <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div> -->
                </div>
            </div>
            <!-- /Inner sidebar body -->
        </div>
        <!-- /Inner sidebar -->

        <!-- Inner main -->
        <div class="inner-main">
            <!-- Inner main header -->
            <div class="inner-main-header">
                <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                <select class="custom-select form-control custom-select-sm w-auto mr-1">
                    <option selected="">Latest</option>
                    <option value="1">Popular</option>
                    <option value="3">Solved</option>
                    <option value="3">Unsolved</option>
                    <option value="3">No Replies Yet</option>
                </select>
                <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input type="text" class="form-control mb-4 mt-4" placeholder="Search forum" />
                </span>
            </div>
            <!-- /Inner main header -->

            <!-- Inner main body -->

            <!-- Forum List -->
           
            <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

                @foreach($forums as $forum)
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" />
                            <div class="media-body">
                                <h6><a href="{{ route('forum-show', $forum->id) }}"  class="text-body forum-title-link">{{$forum->title}}</a></h6>
                                <p class="text-muted">2 days ago created by <span class="text-secondary font-weight-bold">Alex </span> </p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">Laravel 7 database backup</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">jlrdw</a> replied <span class="text-secondary font-weight-bold">3 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 18</span>
                                <span><i class="far fa-comment ml-2"></i> 1</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">Http client post raw content</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">ciungulete</a> replied <span class="text-secondary font-weight-bold">7 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 32</span>
                                <span><i class="far fa-comment ml-2"></i> 2</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">Top rated filter not working</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">bugsysha</a> replied <span class="text-secondary font-weight-bold">11 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 49</span>
                                <span><i class="far fa-comment ml-2"></i> 9</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">Create a delimiter field</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">jackalds</a> replied <span class="text-secondary font-weight-bold">12 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 65</span>
                                <span><i class="far fa-comment ml-2"></i> 10</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">One model 4 tables</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">bugsysha</a> replied <span class="text-secondary font-weight-bold">14 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 45</span>
                                <span><i class="far fa-comment ml-2"></i> 4</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                                <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body">Auth attempt returns false</a></h6>
                                <p class="text-secondary">
                                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                </p>
                                <p class="text-muted"><a href="javascript:void(0)">michaeloravec</a> replied <span class="text-secondary font-weight-bold">18 hours ago</span></p>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 70</span>
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                    <li class="page-item disabled">
                        <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item active"><span class="page-link">2</span></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item">
                        <a class="page-link has-icon" href="javascript:void(0)"><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul> -->
            </div>
            <!-- /Forum List -->

            <!-- Forum Detail -->
            <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse" data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="javascript:void(0)" class="card-link">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                <small class="d-block text-center text-muted">Newbie</small>
                            </a>
                            <div class="media-body ml-3">
                                <a href="javascript:void(0)" class="text-secondary">Mokrani</a>
                                <small class="text-muted ml-2">1 hour ago</small>
                                <h5 class="mt-1">Realtime fetching data</h5>
                                <div class="mt-3 font-size-sm">
                                    <p>Hellooo :)</p>
                                    <p>
                                        I'm newbie with laravel and i want to fetch data from database in realtime for my dashboard anaytics and i found a solution with ajax but it dosen't work if any one have a simple solution it will be
                                        helpful
                                    </p>
                                    <p>Thank</p>
                                </div>
                            </div>
                            <div class="text-muted small text-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="javascript:void(0)" class="card-link">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" width="50" alt="User" />
                                <small class="d-block text-center text-muted">Pro</small>
                            </a>
                            <div class="media-body ml-3">
                                <a href="javascript:void(0)" class="text-secondary">drewdan</a>
                                <small class="text-muted ml-2">1 hour ago</small>
                                <div class="mt-3 font-size-sm">
                                    <p>What exactly doesn't work with your ajax calls?</p>
                                    <p>Also, WebSockets are a great solution for realtime data on a dashboard. Laravel offers this out of the box using broadcasting</p>
                                </div>
                                <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart" aria-hidden="true"></i>1</button>
                                <a href="javascript:void(0)" class="text-muted small">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Forum Detail -->

            <!-- /Inner main body -->
            
        </div>
        <!-- /Inner main -->
    </div>

@include('forum.create')

<script>
$('#summernote').summernote({
    placeholder: 'Enter Contents Here',
    tabsize: 2,
    height: 120,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
    </script>

@stop

