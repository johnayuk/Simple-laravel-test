@extends('layouts.layout')


@section('content')

    <div class="jumbotron " style="margin-top: 100px;">
        <h3 style="text-align: center">Simple Todo List</h3>
        <div class="row">
            <div class="col-md-6">

                <form method="post" action="{{ route('todo') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                        <small id="emailHelp" class="form-text text-muted">Learn how to use best practise in writting codes.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Description" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="col-md-6">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">S/N`</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todo as $todo)
                    <tr>
                    
                        <td>{{ $loop->index +1}}</td>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>
                        {{-- <a class="btn btn-primary" href="{{ route('todo.edit',$todo->id) }}">Edit</a> --}}

                        <div class="modal fade" id="exampleModal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                                <form  action="{{url('/update_todo/'.$todo->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
            
                                                    <h3>Edit User : {{$todo->id}}</h3>
                                                    <div class="form-group">
                                                      <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" value="{{$todo->name}}" class="form-control">
                                                    </div>
            
                                                    <div class="form-group">
                                                      <label for="name">Description</label>
                                                    <input type="text" name="description" id="last_name" value="{{$todo->description}}" class="form-control">
                                                    </div>
            
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </form>
                                        </div>
                                            </div>
                                              </div>
                                              <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal{{$todo->id}}">Edit</button>

                        </td>
                        <td>

                        {{-- <form action= "{{url('/delete_todo/'.$todo->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="delete"formmethod="POST" class="btn btn-danger">Delete</button>
                        </form> --}}

                        <div class="modal fade" id="staticBackdrop{{$todo->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Delete {{$todo->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form id="delete_modal" action="{{url('/delete_todo/'.$todo->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                  <h3>Are you sure want to delete Patient This Record ?</h3>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                      </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <button type='button' class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop{{$todo->id}}">Delete</button>

                        </td>
                        
                         </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection