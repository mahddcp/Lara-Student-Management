@extends('layout')
@section('content')
 

<div class="card">
<div class="card-header">Edit Info</div>
<div class="card-body">
    <form action="{{ url('payments/'.$payment->id) }}" method="post">

        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $payment->id }}">

        <label for="enrollment_id">Enrollment No</label>
        <select name="enrollment_id" id="enrollment_id" class="form-control">
            @foreach($enrollments as $id => $enroll_no)
            <option value="{{ $id }}">{{ $enroll_no }}</option>
            @endforeach
        </select>

        <label for="paid_date">Paid Date</label>
        <input type="date" name="paid_date" id="paid_date" value="{{ $payment->paid_date }}" class="form-control"> <br>

        <label for="amount">Amount</label>
        <input type="text" name="amount" id="amount" value="{{ $payment->amount }}" class="form-control">


        <input type="submit" value="Update" class="btn btn-success">


    </form>
</div>
</div>
 
@endsection