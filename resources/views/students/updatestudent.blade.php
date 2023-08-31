
@extends('layouts.main')
@section('title', 'Edit Student: '.$student->name)
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
        <form class="pt-4" method="POST" action="/update-submit-student/{{$student->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{$student->name}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="department" class="form-control" id="department" placeholder="Enter Department"
                    name="department" value="{{$student->department}}">
                @error('department')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$student->email}}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Image:</label>
                <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
            
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              @if($student->image)
              <img src="{{ asset('images/'.$student->image) }}" style="height: 50px;width:100px;">
              @else 
              <span>No image found!</span>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
