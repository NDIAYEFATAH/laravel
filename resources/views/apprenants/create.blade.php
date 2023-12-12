<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="col-md-8 offset-3 mt-5">
    <div class="card">
        <div class="card-header bg-success">
            Ajout Apprenant
        </div>
        <div class="card-body">
            <form  action="{{ route('store-student') }}"  method="post">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">

                </div>
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" name="matricule">

                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone">

                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

