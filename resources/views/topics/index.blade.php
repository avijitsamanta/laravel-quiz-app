@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        
        @include('adminpanel.adminSidebar')
          
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h3 class="page-title">Quizzes</h3>
                    @foreach($topics as $topic)
                        <div class="card">
                            <div class="card-body mb-2">
                                <h5 class="card-title">{{$topic->title}}</h5>
                                <a href="{{route('topics.show', $topic->id)}}" class="inline_block btn btn-primary">Go
                                    To Quiz</a>
                                    @can('update', $topic)
                                        <a href="{{route('topics.edit', $topic->id)}}"
                                           class="inline_block btn btn-warning">Edit</a>
                                           @endcan
                                           @can('delete', $topic)
                                        <form class="inline_block" action="{{route('topics.destroy', $topic->id)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                        @endcan
                                 
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection