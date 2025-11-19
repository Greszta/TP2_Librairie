{{ include('layouts/header.php', {title:'Creation Utilisateur'})}}
        <div class="conteneur-erreur">
                    {% if errors is defined %}
                    <div class="error">
                        <ul>
                            {% for error in errors %}
                            <li>{{ error }}</li>
                            {% endfor %}
                        </ul>
                    </div>
                    {% endif %}
                </div>
    <div class="formulaire">
        <div class="contenu">
            <form method="post">
                <h2>Nouveau Utilisateur</h2>
                <label>Nom
                    <input type="text" name="name" value="{{user.name}}">
                </label>
                <label>Username
                    <input type="text" name="username" value="{{user.username}}">
                </label>
                <label>Password
                    <input type="password" name="password" >
                </label>
                <label>Email
                    <input type="email" name="email" value="{{user.email}}">
                </label>
                 <label>Privilege
                    <select name="privilege_id">
                        <option value="">Select</option>
                        {% for privilege in privileges %}
                                <option value="{{privilege.id}}" {% if privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
                        {% endfor %}
                    </select>
                </label>
                <input type="submit" class="btn" value="Save">
            </form>
        </div>
    </div>
{{ include('layouts/footer.php')}}