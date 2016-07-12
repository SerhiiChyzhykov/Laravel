@extends('layouts.app')

@section('content')

@if (count($photos) > 0)
<div class="content clearfix">
    <div class="container">
     @foreach ($photos as $row)
     <div class="col-xs-9 col-sm-5 col-md-4 col-lg-3">
        <div class="thumbnail" >
            <div class="caption" style = "height: 140px;" >
                <a href='/photo?id={{ $row->id}}'>
                    <img src='{{ $row->images}}' title='увеличить' style="height: 155px;">
                </a>
            </div>
            <div class="caption">
                @if (strlen($row->photos_title) >= 17)
                <h3>{{ substr($row->photos_title, 0, 17)}}...</h3>
                @else
                <h3>{{ substr($row->photos_title, 0, 17)}}</h3>
                @endif
                <?php 
                $rand = array('default','success','info','warning','danger'); 
                $rand = $rand[rand(0,4)];   
                ?>
                <span class="label label-{{$rand}}">
                    {{substr($row->category_title, 0 , 17)}}
                </span>
                <br/><br/>
                @if(strlen($row->description) >= 30)
                <p>{{ substr($row->description, 0, 30)}}...</p>
                @else
                <p>{{ substr($row->description, 0, 30)}}</p>
                @endif
                <p>
                    <a href='/photo?id={{ $row->id}}' class="btn btn-primary" >Full width</a>
                    <a href="/photos?user={{ $row->user_id}}" class="btn btn-default" role="button">User's album</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<center>
    {!! $photos->render() !!}
</center>

@endif

@endsection