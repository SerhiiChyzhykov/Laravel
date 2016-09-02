@extends('layouts.app')
@section('content')
<form action="{{ url('/adds') }}" method="POST" role="form" enctype="multipart/form-data" name="form">
    <legend>Add img</legend>
    {{ csrf_field() }}
    <div class="form-group">
        <div class="col-lg-10">
            <div class="input-group">
                <span class="input-group-addon bg-slate-700"><i class="icon-lock2"></i></span>
                <input type="text" class="form-control bg-slate" placeholder="Solid background color" name="title">
                <span class="input-group-addon bg-slate-700"><i class="icon-help"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <div class="input-group">
                <span class="input-group-addon bg-slate-700"><i class="icon-lock2"></i></span>
                <input type="text" class="form-control bg-slate" placeholder="Solid background color" name="description">
                <span class="input-group-addon bg-slate-700"><i class="icon-help"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <select name="categoris" class="form-control bg-indigo-400">
             @foreach($category as $row ) 
             <option value="{{ $row->id }}">{{$row->title}}</option>
             @endforeach
         </select>
     </div>
 </div>
 <div class="form-group">
     <div class="col-lg-10">
         <div class="uploader">
            <input type="file" class="file-styled-primary" name="image">
            <span class="filename" style="-webkit-user-select: none;">No Photo selected</span>
            <span class="action btn bg-blue" style="-webkit-user-select: none;">Choose Photo</span>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection