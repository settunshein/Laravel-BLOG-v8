@extends('layouts.backend.master')

@section('post-active', 'sidebar-active')

@section('title') {{ isset($post) ? 'Edit Post' : 'Create Post' }} @endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Post Management</h6>
</div>

<form action="{{ isset($post) ? route('admin.post.update', $post->id) : route('admin.post.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
@isset($post) @method('PATCH') @endisset

<div class="row">
    <div class="col-md-8 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        @isset($post)Edit Post Form @else Create Post Form @endisset
                    </p>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    
                    <div class="form-group col-md-12">
                        <label>Post Title</label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('title') is-invalid @enderror" 
                        name="title" value="{{ isset($post) ? @old('title', $post->title) : @old('title') }}">
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Category Name</label>
                        <select name="categories[]" id="categories" class="form-control form-control-sm select2" multiple>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @isset($post)
                                {{ $post->isSelectedCategories($post, $category->id) }}
                            @else
                                {{ collect(old('categories'))->contains($category->id) ? 'selected' : '' }}
                            @endisset>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('tags') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tag Name</label>
                        <select name="tags[]" id="tags" class="form-control form-control-sm select2" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                            @isset($post)
                                {{ $post->isSelectedTags($post, $tag->id) }}
                            @else
                                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}
                            @endisset>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('categories') }}</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Post Content</label>
                        <textarea name="content" rows="5" class="form-control form-control-sm rounded-0">{{ isset($post) ? old('content', $post->content) : old('content') }}</textarea>
                        <small class="text-danger">{{ $errors->first('content') }}</small>
                    </div>
                </div>
            </div><!-- End of card-body -->
        </div>
    </div>

    <div class="col-md-4 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        Post Image
                    </p>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div>

            <div class="card-body">
                <input type="file" class="dropify" name="image"
                @if(isset($post) && $post->image)
                    data-default-file="{{ $post->getPostImage() }}"
                @endif>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark rounded-0 float-right">
                    <i class="fa fa-edit"></i>&nbsp;
                    @isset($post) Update @else Create @endisset
                </button>
            </div><!-- End of card-footer -->
        </div>
    </div>
</div>

</form>
@endsection