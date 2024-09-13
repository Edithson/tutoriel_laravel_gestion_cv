@extends('layout')

@section('content')
<table class="table table-striped">

    @forelse ($cv as $unCv)
        <tr>
            <td><img class="image-index" src="{{Storage::url($unCv->photo)}}" alt=""></td>
            <td>{{$unCv->nom_prenom}}</td>
            <td>{{$unCv->email}}</td>
            <td><a href="{{route('cv.show', $unCv)}}"><button class="btn btn-primary">Voire plus</button></a></td>
        </tr>
    @empty
        <tr><p>Aucun cv</p></tr>
    @endforelse
</table>
@endsection