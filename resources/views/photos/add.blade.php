@extends('layouts.app')

@section('content')
 
<form action="{{ url('/adds') }}" method="POST" role="form" enctype="multipart/form-data" name="form">
    <legend>Add img</legend>
  {{ csrf_field() }}
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" id="" name="title" required="required">
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="" name="description" required="required">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select  name="categories" id="input" class="form-control" required="required">
            @foreach($category as $row ) 
            <option value="{{ $row->id }}">{{$row->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">File</label>
        <input type="file" class="form-control" id="" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection