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
    <a href="{{ route('matieres.create') }}" class="btn btn-secondary float-start">Ajouter Matiere</a>
    <br>
    <br>
    <div class="card">
        <div class="card-header bg-secondary text-center text-white">
            Liste des Matieres
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead class="text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Coef</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($listeMat as $mat)
                    <tr>
                        <th scope="row">{{$mat->id}}</th>
                        <td>{{$mat->libelle}}</td>
                        <td>{{$mat->coef}}</td>
                        <td>
                            <div style="display: inline;">
                                <form id="deleteForm" action="{{ route('matieres.destroy',$mat) }}" style="display: inline;" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                <a href="{{ route('matieres.edit',$mat) }}" class="btn btn-warning">Modifier</a>
{{--                                <a href="{{ route('matieres.show',$mat) }}" class="btn btn-secondary float-start">Details</a>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if(count($listeMat)==0)
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
