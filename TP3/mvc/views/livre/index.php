{{ include('layouts/header.php', {title:'Client List'})}}

<div class="page">
    <div class="tableau">
        <h1>Liste de livres</h1>
            <table>
                <tr>
                    <th>Titre</th>
                    <th>Année</th>
                </tr>
                {% for livre in livres %}
                <tr>
                    <td><a href="{{base}}/livre/show?id={{ livre.id }}" class="livre">{{ livre.titre }}</a></td>
                    <td class="annee">{{ livre.annee }}</td>
        
                </tr>
                {% endfor %}
            </table>
    </div>
        <br><br>
        <a href="{{base}}/livre/create" class="btn">Nouveau Livre</a>
</div>

    {{ include('layouts/footer.php')}}