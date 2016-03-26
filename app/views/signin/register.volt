{% extends "layouts\base.volt" %}

{% block head  %}
        {{ this.assets.outputCss('additional') }}
{% endblock %}

{% block content %} 
        <form class="form-signin" method="post" action="{{ url('signin/doRegister') }}">
            
            <h2 class="form-signin-heading">Create account</h2>
            
            <label for="first_name" class="sr-only">First name:</label>
            <input type="text" style="margin-bottom: 10px" id="first_name" name="first_name" class="form-control" placeholder="First name" required>
            
            <label for="last_name" class="sr-only">Last name:</label>
            <input type="text" style="margin-bottom: 10px" id="last_name" name="last_name" class="form-control" placeholder="Last name" required>
            
            <label for="email" class="sr-only">Email address</label>
            <input type="email" style="margin-bottom: 10px" id="email" name="email" class="form-control" placeholder="Email address" required>
            
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required pattern=".{6,}" title="6 characters minimum">
            
            <label for="confirm_password" class="sr-only">Confirm password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm password" required pattern=".{6,}" title="6 characters minimum">
            
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            
            <button class="btn btn-lg btn-success btn-block" type="submit">Create account</button>
            
        </form> 
{% endblock %}