@extends('layouts.main')
@section('title', 'Home Page')
@section('main')

    <div class="container mt-5">
        <h2>Student List</h2>
        <a href="/addstudent" type="button" class="btn btn-primary btn-sm">Add New Student</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>FullName</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Image </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($list as $ss)
                    <tr>
                        <td>{{ $ss->name }}</td>
                        <td>{{ $ss->department }}</td>
                        <td>{{ $ss->email }}</td>
                        <td>
                            @if ($ss->image)
                                <img src="{{ asset('images/' . $ss->image) }}" style="height: 150px;width:200px;">
                            @else
                                <span>No image found!</span>
                            @endif
                        </td>
                        <td><a href="/edit-student/{{ $ss->id }}" type="button" class="btn btn-info btn-sm">Update</a>

                            <a href="/remove-student/{{ $ss->id }}" type="button"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
           
        </table>
        <div style="height: 150px;width:40%;">
            {{ $list->links() }}
     </div>
        
    </div>

@endsection
