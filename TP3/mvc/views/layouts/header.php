<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}css/style.css">
</head>
<body>
    <nav>
        <h1 class="logo">Librairie</h1>
        <div>
            <div class="navigation">
                <div class="gauche">
                    <a href="{{base}}/livres">Livres</a>
                    {% if session.privilege_id == 1%}
                    <a href="{{base}}/users">Users</a>
                    {% endif%}
                </div>
                <div class="droite">
                    {%if guest %}
                    <a href="{{base}}/login">Login</a>
                    {% else %}
                    <a href="{{base}}/logout">Logout</a>
                    {% endif %}
                </div>
            </div>
        </div>
    </nav>
    <main>
        {%if guest is empty %}
            Bienvenue {{ session.user_name }}
        {% endif %}
    