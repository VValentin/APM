{% extends "layouts\base_dashboard.volt" %}

{% block content %}
        <div class="container">
            <div class="jumbotron">
                <h1>Addresses</h1>
                <p>Manage your addresses</p>
                {% if addresses_available %}
                    <?php print_r($addresses); ?>
                {% endif %}
                <p><a class="btn btn-primary btn-lg" href="{{ url('addresses/newAddress') }}" role="button">Add new address</a></p>
            </div>
        </div>
{% endblock %}

