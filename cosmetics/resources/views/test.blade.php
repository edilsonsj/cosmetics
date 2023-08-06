<h1>hello wolrd</h1>

@foreach ($result as $r)
    <p>{{$r->name}} -- {{$r->email}}</p>
@endforeach