
<option selected>Seleccione usuario...</option>
@foreach ($dataUsers as $user )
    <option value="{{$user->identification}}">{{$user->name}}</option>
@endforeach
