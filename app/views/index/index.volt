{% extends "layouts\base.volt" %}

{% block content %}
        <div class="container">
            <div class="jumbotron">
                <h1>APM</h1>
                <p>Welcome</p>
                <p><a class="btn btn-success btn-lg" href="{{ url('signin/create') }}" role="button">Create account</a></p>
            </div>
        </div>
{% endblock %}
