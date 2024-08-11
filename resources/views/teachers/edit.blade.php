@extends('layout')
@section('content')
 

<div class="card">
<div class="card-header">Edit Info</div>
<div class="card-body">
    <form action="{{ url('teachers/ '.$teachers->id) }}" method="post">

        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $teachers->id }}">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $teachers->name }}" class="form-control"><br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ $teachers->address }}" class="form-control"><br>
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile" id="mobile" value="{{ $teachers->mobile }}" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-success">


    </form>
</div>
</div>
 
@endsection