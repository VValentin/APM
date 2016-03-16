<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->tag->getTitle(); ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->assets->outputCss('style'); ?>
        
        
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
                    <a class="navbar-brand" href="<?php echo $this->url->get('dashboard/'); ?>" title="APM">APM</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $this->url->get('dashboard/'); ?>">Home</a></li>
                        <li><a href="<?php echo $this->url->get('locations/'); ?>">Addresses</a></li>
                        <li><a href="<?php echo $this->url->get('readings/'); ?>">Readings</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="<?php echo $this->url->get('index/signout'); ?>">
                        <button type="submit" class="btn btn-primary">Sign out</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
        <?php echo $this->flash->output(); ?>
        
        <div class="container">
            <div class="jumbotron">
                <h1>Dashboard</h1>
                <p>Welcome user!</p>
            </div>
        </div>

        <?php echo $this->assets->outputJs('js'); ?>
    </body>
</html>