<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@extends('navBar')

@section('content')
    <div class="col-md-8 offset-3 mt-5">
        <div class="card">
            <div class="card-header bg-success">
                   {{ $listeMat->exists ? "Modifier" : "Ajouter" }} un Matiere
            </div>
            <div class="card-body">
                <form  action="{{ route($listeMat->exists ? 'update-matter' : 'store-matter',$listeMat) }}"  method="post">
                    @csrf
                    @method($listeMat->exists ? 'put' : 'post')
                    <div class="form-group">
                        <label for="nom">Libelle</label>
                        <input type="text" class="form-control @error("libelle") is-invalid @enderror" id="libelle" name="libelle" value="{{$listeMat->libelle ? $listeMat->libelle : old('libelle')}}">
                        @error("libelle")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coefficient</label>
                        <select class="form-control" name="coef">
                            <option value="">Sélectionner un coefficient</option>
                            <option value="2" {{ ($listeMat->coef == '2' || old('coef') == '2') ? 'selected' : '' }}>2</option>
                            <option value="3" {{ ($listeMat->coef == '3' || old('coef') == '3') ? 'selected' : '' }}>3</option>
                            <option value="4" {{ ($listeMat->coef == '4' || old('coef') == '4') ? 'selected' : '' }}>4</option>
                            <option value="5" {{ ($listeMat->coef == '5' || old('coef') == '5') ? 'selected' : '' }}>5</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">{{ $listeMat->exists ? "Modifier" : "Ajouter" }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
