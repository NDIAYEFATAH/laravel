@extends('layout.app')
@section('content')
    <div class="col-md-8 offset-2 mt-5">
        <div class="card">
            <div class="card-header bg-secondary">
                {{$listeApprenants->exists ? "Modifier" : "Ajouter"}} un Apprenant
            </div>
            <div class="card-body">
                <form  action="{{ route($listeApprenants->exists ? 'updatestu-student' : 'store-student', $listeApprenants) }}"  method="post">
                    @csrf
                    @method($listeApprenants->exists ? 'put' : 'post')
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control @error("nom") is-invalid @enderror" id="nom" name="nom" value="{{$listeApprenants->nom ? $listeApprenants->nom : old('nom')}}">
                        @error("nom")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control @error("prenom") is-invalid @enderror" id="prenom" name="prenom" value="{{$listeApprenants->prenom ? $listeApprenants->prenom : old('prenom')}}">
                        @error("prenom")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="matricule">Matricule</label>
                        <input type="text" class="form-control @error("matricule") is-invalid @enderror" id="matricule" name="matricule" value="{{$listeApprenants->matricule ? $listeApprenants->matricule : old('matricule')}}">
                        @error("matricule")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="number" class="form-control" id="telephone @error("telephone") is-invalid @enderror" name="telephone" value="{{$listeApprenants->telephone ? $listeApprenants->telephone : old('telephone')}}">
                         @error("telephone")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{$listeApprenants->exists ? "Modifier" : "Ajouter"}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
