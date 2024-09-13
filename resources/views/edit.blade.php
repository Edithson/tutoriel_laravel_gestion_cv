@extends('layout')

@section('content')
<h3>Ajouter un nouveau CV</h3>
@foreach ($errors->all() as $error)
    <div class="alert alert-warning" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="{{route('cv.update', $cv)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="" class="form-label">Nom et prénom : </label>
    <input type="text" name="nom_prenom" value="{{$cv->nom_prenom}}" class="form-control" required><br>
    <label for="" class="form-label">Email : </label>
    <input type="email" name="email" value="{{$cv->email}}" class="form-control" required><br>
    <label for="" class="form-label">Niveau en fraiçais : </label>
    <input type="range" name="niveau_francais" value="{{$cv->niveau_francais}}" min="0" max="10" class="form-range"><br>
    <label for="" class="form-label">Niveau en anglais : </label>
    <input type="range" name="niveau_anglais" value="{{$cv->niveau_anglais}}" min="0" max="10" class="form-range"><br>
    <label for="" class="form-label">Nombre d'années d'expériences : </label>
    <input type="number" value="{{$cv->annee_experience}}" min="1" max="20" name="experience" class="form-control" required><br>
    <label for="" class="form-label">Sexe : </label>
    <input type="radio" name="sexe" value="masculin" class="form-radio"
    @if ($cv->sexe == 'masculin')
        checked
    @endif
    >Maxculin 
    <input type="radio" name="sexe" value="feminin" class="form-radio"
    @if ($cv->sexe == 'feminin')
        checked
    @endif
    >Féminin <br>
    <label for="">Technologies</label>
    @foreach ($technologies as $technologie)
        <input type="checkbox" name="{{$technologie->id}}"
        @if ($mes_technologies->count() !== 0)
            @foreach ($mes_technologies as $ma_technologie)
                @if ($ma_technologie->technology_id == $technologie->id)
                    checked
                @endif
            @endforeach
        @endif
        >{{$technologie->nom}} 
    @endforeach
    <br>
    <label for="" class="form-label">Préférence</label>
    <select name="preference" class="form-select" id="">
        <option value="backend"
            @if ($cv->preference == 'backend')
                selected
            @endif
        >backend</option>
        <option value="frontend"
            @if ($cv->preference == 'frontend')
                selected
            @endif
        >frontend</option>
    </select><br>
    <label for="" class="form-label">Photo : </label>
    <input type="file" name="photo" class="form-control"><br><br>
    <input type="submit" value="Mettre à jour" class="btn btn-primary">
</form>
@endsection