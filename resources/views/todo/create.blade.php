@extends('todo.layout')
    @section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>CREATE ACTIVITY
                            <a href="{{ route('todo.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('todo.store') }}" method="post">
                        @csrf
                       
                        <div class="mb-3">
                            <label >Title</label>
                            <input type="text" name='title' class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Details</label>
                            <textarea type="text" name='details' class="form-control"></textarea>
                            @error('details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Status</label>
                            <br>
                            <input type="radio" name='status' value="in-progress">In progress
                            <input type="radio" name='status' value="not-started">Not Started
                            <input type="radio" name='status' value="completed">Completed
                           
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
