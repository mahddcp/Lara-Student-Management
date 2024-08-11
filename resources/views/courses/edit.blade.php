@extends('layout')
@section('content')
 
<div class="card">
    <div class="card-header">Edit Info</div>

    <div class="card-body">
        <form action="{{ url('courses/'.$courses->id) }}" method="post">

            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{ $courses->id }}">

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $courses->name }}" class="form-control"><br>

            <label for="syllabus">Syllabus</label>
            <input type="text" name="syllabus" id="syllabus" value="{{ $courses->syllabus }}" class="form-control"><br>

            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" value="{{ $courses->duration }}" class="form-control"><br>

            <input type="submit" value="Update" class="btn btn-success">


        </form>

    </div>
</div>
 
@endsection