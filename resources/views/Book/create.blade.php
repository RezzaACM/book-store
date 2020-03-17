@extends('layout.main')

@section('title','Add New Book')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('books')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                        <label for="Title">Judul buku:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                        <div class="invalid-feedback">
                           {{$message}}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <label for="Description">Keterangan:</label>
                          <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                      
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                        <label for="Qty">Stock:</label>
                        <input type="text" class="form-control" name="qty">
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label>Penerbit:</label>
                            <select class="form-control" name="publisher">
                              <option value="Pustaka Imam Syafi`i">Pustaka Imam Syafi`i</option>
                              <option value="Pustaka Ibnu Katsir">Pustaka Ibnu Katsir</option>
                              <option value="Darul Haq">Darul Haq</option>  
                              <option value="At-tibyan">At-tibyan</option>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection