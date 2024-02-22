<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Student</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('student.update', ['student' => $student])}}">
        @csrf 
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$student->name}}" />
        </div>
        <div>
            <label>Course</label>
            <input type="text" name="course" placeholder="Course" value="{{$student->course}}" />
        </div>
    </form>
    <form method="post" action="{{route('subjects.update', ['subjects' => $subjects])}}">
        @csrf 
        @method('put')
        <div>
            <label>Code</label>
            <input type="text" name="code" placeholder="Code" value="{{$subjects->code}}" />
        </div>
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="{{$subjects->title}}" />
        </div>
    </form>
    <form method="post" action="{{route('books.update', ['books' => $subjects])}}">
        @csrf 
        @method('put')
        <div>
            <label>Book Title</label>
            <input type="text" name="title" placeholder="Title" value="{{$books->title}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>