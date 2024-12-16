@extends('todo.layout')
    @section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @session('status')
                    
                
                <div class="alert alert-success">{{session('status') }}</div>
                @endsession
                <div class="card">

                    <div class="card-header">
                        <h4>TODO LIST
                            <a href="{{ route('todo.index') }}" class="btn btn-primary float-end">  Home</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" action="{{ route('search') }}" method="get">
                            @csrf
                            @method('GET')
                            <input class="  float-end" type="text" name="query" value="{{ request('query') }}" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success  float-end" type="submit">Search</button>
                         </form>
                        @if (@isset($todo))                                                                                
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Activities</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($todo as $todo)
                                    <tr>
                                        <td>{{ $todo->id }}</td>
                                        <td>{{ $todo->title }} <br>
                                            {{ $todo->details }}</td>
                                        <td>{{ $todo->status }}</td>
                                        <td> 
                                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-success ">Show</a>
                                            <form action="{{ route('todo.destroy', $todo->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                            <button type='submit' class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <li>No results found</li>  
                                @endforelse   
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
