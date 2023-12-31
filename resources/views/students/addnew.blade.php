@extends('layouts.main')
@section('title', 'Add New Student')
@section('main')
    <div class="container mt-5">
        <h2>Add New Student </h2>
        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="pt-4" method="POST" action="/store-student" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="department" class="form-control" id="department" placeholder="Enter Department"
                    name="department">
                @error('department')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" >
            
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection