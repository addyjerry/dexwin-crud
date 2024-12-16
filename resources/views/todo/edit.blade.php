@extends('todo.layout')
    @section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>EDIT ACTIVITY
                            <a href="{{ route('todo.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('todo.update',$todo->id) }}" method="post">
                        @csrf
                           @method('PUT')
                        <div class="mb-3">
                            <label >Title</label>
                            <input type="text" name='title' class="form-control" value="{{ $todo->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Details</label>
                            <textarea type="text" name='details' class="form-control">{!! $todo->details !!}</textarea>
                            @error('details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Status</label>
                            <br>
                            <input type="radio" name='status' value="in-progress"{{ $status === 'in-progress' ?'selected':''}}>In progress
                            <input type="radio" name='status' value="not-started"{{ $status === 'not-started' ?'selected':''}}>Not Started
                            <input type="radio" name='status' value="completed"{{ $status === 'completed' ?'selected':''}}>Completed
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
