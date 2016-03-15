a:5:{i:0;s:272:"<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->tag->getTitle(); ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->assets->outputCss('style'); ?>
        ";s:4:"head";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:10:"
        ";s:4:"file";s:43:"C:\wamp\www\apm/app/views/layouts\base.volt";s:4:"line";i:9;}}i:1;s:1987:"
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
                    <a class="navbar-brand" href="<?php echo $this->url->get('index/'); ?>" title="APM">APM</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="<?php echo $this->url->get('signup/'); ?>">
                        <button type="submit" class="btn btn-success">Create account</button>
                    </form>
                    <form class="navbar-form navbar-right" action="<?php echo $this->url->get('signin/'); ?>">
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
        <?php echo $this->flash->output(); ?>
        ";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:13:"   
        ";s:4:"file";s:43:"C:\wamp\www\apm/app/views/layouts\base.volt";s:4:"line";i:46;}}i:2;s:76:"
        <?php echo $this->assets->outputJs('js'); ?>
    </body>
</html>";}