<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->tag->getTitle(); ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->assets->outputCss('style'); ?>
        
        <?php echo $this->assets->outputCss('additional'); ?>

    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $this->url->get('index/'); ?>" title="APM">APM</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="<?php echo $this->url->get('signin/'); ?>">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
        <?php echo $this->flash->output(); ?>
         
        <form class="form-signin" method="post" action="<?php echo $this->url->get('signin/doSignin'); ?>">
            
            <h2 class="form-signin-heading">Please sign in</h2>
            
            <label for="inputEmail" class="sr-only">
                Email address
            </label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
            
            <label for="inputPassword" class="sr-only">
                Password
            </label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="<?php echo $this->security->getTokenKey(); ?>" value="<?php echo $this->security->getToken(); ?>" />
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            
        </form>

        <?php echo $this->assets->outputJs('js'); ?>
    </body>
</html>