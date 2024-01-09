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
    <a href="{{ route('add-new-student') }}" class="btn btn-secondary float-start">Ajouter Apprenant</a>
    <br>
    <br>
    <div class="card">
        <div class="card-header bg-secondary text-center text-white">
            Liste des Apprenants
        </div>
        @if(session("success"))
            <alert class="alert alert-success col-md-12">{{session("success")}}</alert>
        @endif
        <div class="card-body">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($listeApp as $app)
                    <tr>
                        <th scope="row">{{$app->id}}</th>
                        <td>{{$app->nom}}</td>
                        <td>{{$app->prenom}}</td>
                        <td>{{$app->telephone}}</td>
                        <td>{{$app->matricule}}</td>
                        <td>
                            <div style="display: inline;">
                                <a href="{{ route('update-student', $app) }}" class="btn btn-outline-secondary">Modifier</a>

                                <form id="deleteForm" action="{{ route('delete-student',$app) }}" style="display: inline;" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-secondary">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @foreach($app->notes as $note)
                        <tr>
                            <td></td>
                            <td colspan="5">
                                <table class="table mb-0 table-dark">

                                    <tr>
                                        <td>{{ $note->id }}</td>
                                        <td>{{ $note->matiere->libelle }}</td>
                                        <td>devoir</td>
                                        <td>{{ $note->valeur }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach

                @endforeach
                @if(count($listeApp)==0)
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
