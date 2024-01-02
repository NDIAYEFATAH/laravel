@extends('navBar')

@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('listeNote.create') }}" class="btn btn-secondary float-start">Ajouter Note</a>
    <br>
    <br>
    <div class="card">
        <div class="card-header bg-secondary text-center text-white">
            Liste des Notes
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Apprenant</th>
                    <th scope="col">Matiere</th>
                    <th scope="col">Coefficient</th>
                    <th scope="col">Devoir</th>
                    <th scope="col">Examen</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($note as $n)
                    <tr>
                        <th scope="row">{{$n->id}}</th>
                        <td>{{$n->apprenant->prenom}}  {{$n->apprenant->nom}}</td>
                        <td>{{$n->matiere->libelle}}</td>
                        <td>{{$n->matiere->coef}}</td>
                        <td>{{$n->devoirs}}</td>
                        <td>{{$n->examen}}</td>
                        <td>
                            <div style="display: inline;">
                                <form id="deleteForm" action="{{ route('listeNote.destroy', $n) }}" style="display: inline;" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                <a href="{{ route('listeNote.edit',$n) }}" class="btn btn-warning">Modifier</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if(count($note)==0)
                    <h1>Le tableau est vide</h1>
                @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
@endsection


{{--@extends('navBar')

@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('listeNote.create') }}" class="btn btn-secondary float-start">Ajouter Note</a>
    <br>
    <br>

    <!-- Pour chaque matière, créer un tableau distinct -->
    @foreach($matiere as $matier)
        <div class="card mt-3">
            <div class="card-header bg-secondary text-center text-white">
                Liste des Notes - {{ $matier->libelle }}
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Apprenant</th>
                        <th scope="col">Coefficient</th>
                        <th scope="col">Devoir</th>
                        <th scope="col">Examen</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($note->where('matiere_id', $matier->id) as $n)
                        <tr>
                            <th scope="row">{{ $n->id }}</th>
                            <td>{{ $n->apprenant->prenom }}  {{ $n->apprenant->nom }}</td>
                            <td>{{ $n->matiere->coef }}</td>
                            <td>{{ $n->devoirs }}</td>
                            <td>{{ $n->examen }}</td>
                            <td>
                                <div style="display: inline;">
                                    <!-- ... (votre code de suppression et modification) ... -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($note->where('matiere_id', $matier->id)) == 0)
                        <tr>
                            <td colspan="6">Aucune note disponible pour cette matière.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    @if(count($note) == 0)
        <h1>Le tableau est vide</h1>
    @endif

</div>
</body>
</html>
@endsection
--}}
