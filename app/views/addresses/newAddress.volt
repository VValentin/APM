{% extends "layouts\base_dashboard.volt" %}

{% block head  %}
        {{ this.assets.outputCss('additional') }}
{% endblock %}

{% block content %} 
        <form class="form-signin" method="post" action="{{ url('addresses/addAddress') }}">
            
            <h2 class="form-signin-heading">Add a new address</h2>
            
            <label for="city" class="sr-only">City:</label>
            <input type="text" style="margin-bottom: 10px" id="city" name="city" class="form-control" placeholder="City" required>
            
            <label for="street" class="sr-only">Street:</label>
            <input type="text" style="margin-bottom: 10px" id="street" name="street" class="form-control" placeholder="Street" required>
            
            <label for="number" class="sr-only">Number:</label>
            <input type="text" style="margin-bottom: 10px" id="number" name="number" class="form-control" placeholder="Number" required>
            
            <label for="building" class="sr-only">Building</label>
            <input type="text" style="margin-bottom: 10px" id="building" name="building" class="form-control" placeholder="Building">
            
            <label for="entrance" class="sr-only">Entrance</label>
            <input type="text" style="margin-bottom: 10px" id="entrance" name="entrance" class="form-control" placeholder="Entrance">
            
            <label for="apartment" class="sr-only">Apartment</label>
            <input type="text" style="margin-bottom: 10px" id="apartment" name="apartment" class="form-control" placeholder="Apartment number">
            
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
            
            <button class="btn btn-lg btn-success btn-block" type="submit">Add address</button>
            {{ hidden_field('user_id', 'value': user_id, 'class': 'form-control') }}
        </form> 
{% endblock %}