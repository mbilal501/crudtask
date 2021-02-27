@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>All Posts</h4>
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
                <a href="{{ route('posts.create') }}" class = "btn btn-sm btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div>
        </div>
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('search') }}" method = "POST">
                    {{ csrf_field()}}  
                    <div class="input-group">
                        <input type="text" name ="id" class="form-control" placeholder="Search Post By ID">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($posts->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>Post Description</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->post_title}}</td>
                                   
                                    <td>{{ substr($post->post_description,0,60) }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                   
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                @else 
                    <h4 style = "text-align:center;">No Post Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection