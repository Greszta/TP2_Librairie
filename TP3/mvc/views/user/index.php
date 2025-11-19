{{ include('layouts/header.php', {title:'User List'})}}

<div class="page">
    <div class="tableau">
        <h1>Liste d'utilisateur</h1>
            <table>
                <tr>
                    <th class="description_user">Nom</th>
                    <th class="description_user">Username</th>
                    <th class="description_user">Email</th>
                    <th></th>
                </tr>
                {% for user in users %}
                <tr>
                    <td class="info_user">{{ user.name }}</td>
                    <td class="info_user">{{ user.username }}</td>
                    <td class="info_user">{{ user.email }}</td>
                    <td>
                        <form action="{{base}}/user/delete" method="post">
                            <input type="hidden" name="id" value="{{ user.id }}">
                            <input type="submit" value="Supprimer" class="btn rouge">
                        </form>
                    </td>
                </tr>
                {% endfor %}
            </table>
    </div>
        <br><br>
        <a href="{{base}}/user/create" class="btn">Ajouter utilisateur</a>
</div>

{{ include('layouts/footer.php')}}