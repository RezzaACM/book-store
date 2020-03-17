@extends('layout/main')

@section('title','List Books')

@section('container')
<div class="box">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="btn">
                    <a href="{{url('/books/create')}}" class="btn btn-primary">Add New Record</a>
                </div>
                @if (\Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ \Session::get('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($books as $book)
                          <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->publisher}}</td>
                            <td>{{$book->qty}}</td>
                            <td>{{$book->description}}</td>
                            <td>
                                <a href="{{action('BookController@show', $book->id)}}" class="btn btn-primary">Update</a>
                                <form action="{{action('BookController@destroy', $book->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure for delete this data?')" type="submit">Delete</button>
                                </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection