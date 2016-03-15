<!DOCTYPE html>
<html lang="en">
    <head>
        {{ get_title() }}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ this.assets.outputCss('style') }}
        {% block head %}
        {% endblock %}
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('index/') }}" title="APM">APM</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="{{ url('signup/') }}">
                        <button type="submit" class="btn btn-success">Create account</button>
                    </form>
                    <form class="navbar-form navbar-right" action="{{ url('signin/') }}">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div>
            </div>
        </nav>
        {{ flash.output() }}
        {% block content %}   
        {% endblock %}
        {{ this.assets.outputJs('js') }}
    </body>
</html>