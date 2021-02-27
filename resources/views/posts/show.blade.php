@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>View Post</h4>
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
                <a href="{{ route('posts.index') }}" class = "btn btn-sm btn-primary" >Back <i class = "fa fa-backward"></i></a>
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">               
                <h4>Post Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td style = "width: 500px;">Post ID</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Post Title</td>
                            <td>{{ $post->post_title }}</td>
                        </tr>
                       
                       
                        <tr>
                            <td>Post Descrfiption</td>
                            <td>{{ $post->post_description }}</td>
                        </tr>
                                           
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection