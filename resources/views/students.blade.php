<!DOCTYPE html>
<html lang="en">

<head>
    <title>Students Example Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bsstyle.css') }}">
</head>

<body>
    <div class="container mt-5">
        <h2>Student List</h2>
        <a href="/addstudent" type="button" class="btn btn-primary btn-sm">Add New Student</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>FullName</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->email }}</td>
                        <td><a href="/edit-student/{{$student->id}}" type="button" class="btn btn-info btn-sm">Update</a> 
                            
                            <a href="/remove-student/{{$student->id}}" type="button"
                                class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
