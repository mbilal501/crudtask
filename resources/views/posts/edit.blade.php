@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>Update Post</h4>
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <div class="col-md-1">
                <a href="{{route('posts.index')}}" class = "btn btn-sm btn-primary">View All <i class = "fa fa-eye"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('posts.update', $post->id) }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                         <div class="form-group row">
                     

                     <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Post Title</label>
                        <div class="col-sm-8">
                            <input type="text" name = "post_title" value="{{ $post->post_title }}" class = "form-control" placeholder = "Enter Post Title" required>
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Post Description</label>
                        <div class="col-sm-8">
                            <textarea name = "post_description" rows = "10" cols = "10" class = "form-control" required> value="{{ $post->post_description }}"</textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Post">
                        </div>
                    </div>
                </form>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection