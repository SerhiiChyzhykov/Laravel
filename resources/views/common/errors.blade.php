@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <strong>Whoops! Something went wrong!</strong>

 <br><br>

 <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
@if (count(Session::all()) > 0)
    @foreach (Session::all() as $message => $key )
        @if($message == 'flash')
            @foreach ($key as $element => $row)
                @if($element == 'old')
                    @if($row)
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success!</strong>
                            <br><br>
                            <ul>
                            @foreach ($row as $element)
                               <li>{{$element}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach
@endif