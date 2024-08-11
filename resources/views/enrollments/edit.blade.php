@extends('layout')
@section('content')
 

<div class="card">
<div class="card-header">Edit Info</div>
<div class="card-body">
    <form action="{{ url('enrollments/'.$enrollment->id) }}" method="post">

        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $enrollment->id }}">

        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" value="{{ $enrollment->enroll_no }}" class="form-control"></br>

        <label>Batch</label></br>
        <!-- <input type="text" name="batch_id" id="batch_id" value="{{ $enrollment->batch_id }}" class="form-control"></br> -->
        <select name="batch_id" id="batch_id" class="form-control">
            @foreach($batches as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
         </select>

        <label>Student</label></br>
        <!-- <input type="text" name="student_id" id="student_id" value="{{ $enrollment->student_id }}" class="form-control"></br> -->
        <select name="student_id" id="student_id" class="form-control">
            @foreach($students as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>

        <label>Join Date</label></br>
        <input type="date" name="join_date" id="join_date" value="{{ $enrollment->join_date }}" class="form-control"></br>

        <label>Fee</label></br>
        <input type="text" name="fee" id="fee" value="{{ $enrollment->fee }}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success">


    </form>
</div>
</div>
 
@endsection