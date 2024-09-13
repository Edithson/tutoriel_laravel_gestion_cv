@extends('layout')

@section('content')
<h3>Ajouter un nouveau CV</h3>
@foreach ($errors->all() as $error)
    <div class="alert alert-warning" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="{{route('cv.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="" class="form-label">Nom et prénom : </label>
    <input type="text" name="nom_prenom" class="form-control" required><br>
    <label for="" class="form-label">Email : </label>
    <input type="email" name="email" class="form-control" required><br>
    <label for="" class="form-label">Niveau en fraiçais : </label>
    <input type="range" name="niveau_francais" min="0" max="10" class="form-range"><br>
    <label for="" class="form-label">Niveau en anglais : </label>
    <input type="range" name="niveau_anglais" min="0" max="10" class="form-range"><br>
    <label for="" class="form-label">Nombre d'années d'expériences : </label>
    <input type="number" min="1" max="20" name="experience" class="form-control" required><br>
    <label for="" class="form-label">Sexe : </label>
    <input type="radio" name="sexe" value="masculin" checked class="form-radio">Maxculin 
    <input type="radio" name="sexe" value="feminin" class="form-radio">Féminin <br>
    <label for="">Technologies</label>
    @foreach($technologies as $technologie)
        <input type="checkbox" name="{{$technologie->id}}">{{$technologie->nom}} 
    @endforeach <br>
    <label for="" class="form-label">Préférence</label>
    <select name="preference" class="form-select" id="">
        <option value="backend">backend</option>
        <option value="frontend">frontend</option>
    </select><br>
    <label for="" class="form-label">Photo : </label>
    <input type="file" name="photo" class="form-control" required><br><br>
    <input type="submit" value="Valider" class="btn btn-success">
</form>
@endsection