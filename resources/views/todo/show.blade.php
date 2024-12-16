@extends('todo.layout')
    @section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> ACTIVITY
                            <a href="{{ route('todo.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                   
                        <div class="mb-3">
                            <label >Title</label>
                            <p>{{ $todo->title }}</p>
                            
                        </div>
                        <div class="mb-3">
                            <label >Details</label>
                            <p>{!! $todo->details !!}</p>
                          
                        </div>
                        <div class="mb-3">
                            <label >Status</label>
                            <br>
                            <p>{{ $todo->status }}</p>
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
