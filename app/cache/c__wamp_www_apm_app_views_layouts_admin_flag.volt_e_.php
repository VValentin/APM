a:5:{i:0;s:272:"<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->tag->getTitle(); ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->assets->outputCss('style'); ?>
        ";s:4:"head";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:10:"
        ";s:4:"file";s:49:"C:\wamp\www\apm/app/views/layouts\admin_flag.volt";s:4:"line";i:9;}}i:1;s:1454:"
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
                    <a class="navbar-brand" href="<?php echo $this->url->get('admin/'); ?>" title="APM">APM</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $this->url->get('admin/'); ?>">Home</a></li>
                        <li><a href="<?php echo $this->url->get('users/'); ?>">Users</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="<?php echo $this->url->get('index/signout'); ?>">
                        <button type="submit" class="btn btn-primary">Sign out</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
        <?php echo $this->flash->output(); ?>
        ";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:13:"   
        ";s:4:"file";s:49:"C:\wamp\www\apm/app/views/layouts\admin_flag.volt";s:4:"line";i:36;}}i:2;s:76:"
        <?php echo $this->assets->outputJs('js'); ?>
    </body>
</html>";}