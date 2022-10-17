@extends('layouts.backend.master')

@section('dashboard-active', 'sidebar-active')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Author Dashboard</h6>
</div>

<div class="widget-blk row mb-2">
    <div class="col-md-3">
        <div class="p-3">
            <div class="row widget" style="background-color: #42B883;">
                <div class="col-9 py-3 text-white">
                    <h3 class="mb-2"><?= $category_count ?></h3>
                    <p class="custom-fs-12 mb-0 text-white">Total Categories</p>
                </div>
                <div class="col-3 py-3 text-white d-flex align-items-center justify-content-center" 
                style="background-color: rgba(0,0,0,.1);">
                    <i class="fas fa-stream" style="font-size: 32px;"></i>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3">
            <div class="row widget" style="background-color: #F7DF1E;">
                <div class="col-9 py-3 text-white">
                    <h3 class="mb-2"><?= $tag_count ?></h3>
                    <p class="custom-fs-12 mb-0 text-white">Total Tags</p>
                </div>
                <div class="col-3 py-3 text-white d-flex align-items-center justify-content-center" 
                style="background-color: rgba(0,0,0,.1);">
                    <i class="fas fa-tags" style="font-size: 32px;"></i>
                </div> 
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="p-3">
            <div class="row widget" style="background-color: #DD4814;">
                <div class="col-9 py-3 text-white">
                    <h3 class="mb-2"><?= $post_count ?></h3>
                    <p class="custom-fs-12 mb-0 text-white">Total Posts</p>
                </div>
                <div class="col-3 py-3 text-white d-flex align-items-center justify-content-center" 
                style="background-color: rgba(0,0,0,.1);">
                    <i class="fas fa-feather" style="font-size: 32px;"></i>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3">
            <div class="row widget" style="background-color: #4584B6;">
                <div class="col-9 py-3 text-white">
                    <h3 class="mb-2"><?= $user_count ?></h3>
                    <p class="custom-fs-12 mb-0 text-white">Total Users</p>
                </div>
                <div class="col-3 py-3 text-white d-flex align-items-center justify-content-center" 
                style="background-color: rgba(0,0,0,.1);">
                    <i class="fas fa-users" style="font-size: 32px;"></i>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection