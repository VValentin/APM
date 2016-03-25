{% extends "layouts\base.volt" %}

{% block head  %}
        {{ this.assets.outputCss('additional') }}
{% endblock %}

{% block content %} 
        <form class="form-signin" method="post" action="{{ url('signin/doRegister') }}">
            
            <h2 class="form-signin-heading">Create account</h2>
            
            <label for="inputFirstName" class="sr-only">First name:</label>
            <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" placeholder="First name" required>
            
            <label for="inputLastName" class="sr-only">Last name:</label>
            <input type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Last name" required>
            
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            
            <label for="inputConfirmPassword" class="sr-only">Confirm password</label>
            <input type="password" id="inputConfirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required>
            
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            
        </form>
{% endblock %}