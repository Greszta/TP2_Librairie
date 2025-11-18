{{ include('layouts/header.php', {title:'Client Show'})}}
    <div class="conteniteur">
        <div class="contenu">
    <a href="{{base}}/livres" class="bouton">X</a>
            <h1>{{ livre.titre }}</h1>
            <p><strong>Auteur: </strong>{{ auteur }}</p>
            <p><strong>Catégorie: </strong>{{ categorie }}</p>
            <p><strong>Année: </strong>{{ livre.annee }}</p>
            <p><strong>État: </strong>{{ etat }}</p>
            
            <div class="boutons">
                <a href="{{base}}/livre/edit?id={{ livre.id }}" class="btn">Modifier</a>
                <form action="{{base}}/livre/delete" method="post">
                        <input type="hidden" name="id" value="{{ livre.id }}">
                        <input type="submit" value="Suprimer" class="btn rouge">
                </form>
            </div>
        </div>
    </div>
{{ include('layouts/footer.php')}}