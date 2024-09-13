@extends('layout')

@section('content')
<div class="mini-conteneur">
    <img src="{{Storage::url($cv->photo)}}" class="photo-show" alt="">
    <h2>{{$cv->nom_prenom}}</h2>
    <table class="table-striped table info">
        <tr>
            <th>Email</th>
            <td>{{$cv->email}}</td>
        </tr>
        <tr>
            <th>Sexe</th>
            <td>{{$cv->sexe}}</td>
        </tr>
        <tr>
            <th>Technologie</th>
            <td>
                @forelse ($cv->technologies as $technologie)
                    {{$technologie->nom}}, 
                @empty
                    <p>Aucunes technologies!</p>
                @endforelse
            </td>
        </tr>
        <tr>
            <th>Niveau en français</th>
            <td>{{$cv->niveau_francais}}/10</td>
        </tr>
        <tr>
            <th>Niveau en anglais</th>
            <td>{{$cv->niveau_anglais}}/10</td>
        </tr>
        <tr>
            <th>Préférence</th>
            <td>{{$cv->preference}}</td>
        </tr>
    </table>
</div>
<div class="div-btn">
    <a class="edit" href="{{route('cv.edit', $cv)}}"><button class="btn btn-primary">Mettre à jour</button></a>
    <form action="{{route('cv.destroy', $cv)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>
</div>
@endsection