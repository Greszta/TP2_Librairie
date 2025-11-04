{{ include('layouts/header.php', {title:'Client Create'})}}
    <div class="formulaire">
        <div class="contenu">
            <form method="post">
                <h2>Nouveau Livre</h2>
                <label>Titre
                    <input type="text" name="titre" value="{{ livre.titre }}">
                </label>
                <label>Année
                    <input type="text" name="annee" value="{{ livre.annee }}">
                </label>
                <label>Auteur
                    <select name="auteur_id">
                        <option value="">Select</option>
                        {% for auteur in auteurs %}
                            <option value="{{ auteur.id }}" {% if auteur.id == livre.auteur_id %} selected {% endif %}>{{ auteur.auteur }}</option>
                        {% endfor %}
                    </select>
                </label>
                <label>Categorie
                    <select name="categorie_id">
                        <option value="">Select</option>
                        {% for categorie in categories %}
                            <option value="{{ categorie.id }}" {% if categorie.id == livre.categorie_id %} selected {% endif %}>{{ categorie.categorie }}</option>
                        {% endfor %}
                    </select>
                </label>
                <label>État
                    <select name="etat_id">
                        <option value="">Select</option>

                        {% for etat in etats %}
                            <option value="{{ etat.id }}" {% if etat.id == livre.etat_id %} selected {% endif %}>{{ etat.etat }}</option>
                        {% endfor %}
                    </select>
                </label>
                <input type="submit" class="btn" value="Save">
            </form>
        </div>
        <div class="conteneur-erreur">
                        {% if errors.titre is defined %}
                            <span class="error">{{ errors.titre }}</span>
                        {% endif %}
                        {% if errors.annee is defined %}
                            <span class="error">{{ errors.annee }}</span>
                        {% endif %}
                        {% if errors.auteur_id is defined %}
                            <span class="error">{{ errors.auteur_id }}</span>
                        {% endif %}
                        {% if errors.etat_id is defined %}
                            <span class="error">{{ errors.etat_id }}</span>
                        {% endif %}
                        {% if errors.categorie_id is defined %}
                            <span class="error">{{ errors.categorie_id }}</span>
                        {% endif %}
                </div>
    </div>
{{ include('layouts/footer.php')}}