<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@extends('navBar')

@section('content')
    <div class="container mt-5">
        <div class="col-md-8 offset-2 mt-5">
            <div class="card">
                <div class="card-header bg-secondary">
                    {{ $note->exists ? "Modifier" : "Ajouter" }} une Note
                </div>
                <div class="card-body">
                    <form  action="{{ route($note->exists ? 'listeNote.update' : 'listeNote.store',$note) }}"  method="post">
                        @csrf
                        @method($note->exists ? 'put' : 'post')
                        <div class="form-group">
                            <label for="nom">Note devoir</label>
                            <input type="text" class="form-control @error("devoirs") is-invalid @enderror" name="devoirs" value="{{ $note->devoirs ? $note->devoirs : old('devoirs') }}">
                            @error("devoirs")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nom">Note Examen</label>
                            <input type="text" class="form-control @error("examen") is-invalid @enderror" name="examen" value="{{ $note->examen ? $note->examen : old('examen') }}">
                            @error("examen")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Matiere</label>
                            <select class="form-control @error("matiere_id") is-invalid @enderror" name="matiere_id">
                                <option value="">Matiere</option>
                                @foreach($matiere as $m)
                                    <option @selected($note->matiere_id == $m->id) value="{{ $m->id }}">{{ $m->libelle }}</option>
                                @endforeach
                            </select>
                            @error("matiere_id")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apprenant</label>
                            <select class="form-control @error("apprenant_id") is-invalid @enderror" name="apprenant_id">
                                <option value="">Sélectionner un Apprenant</option>
                                @foreach($apprenant as $app)
                                    <option @selected($note->apprenant_id == $app->id) value="{{ $app->id }}">{{ $app->prenom }} {{ $app->nom }}</option>
                                @endforeach
                            </select>
                            @error("apprenant_id")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">{{ $note->exists ? "Modifier" : "Ajouter" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
