<html>
    <head>
        <meta charset="UTF-8"> 
        <title>.: Cantina :.</title>
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Canto da Gula</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo BASE_URL; ?>/caixa/">Caixa</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pedido/">Pedido</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/saida/">Saída</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/produto/">Produto</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo BASE_URL; ?>/login/logout">Sair</a></li>
                    </ul>
                        
                    </ul>
                </div>   
        </nav>
        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
    </body>
</html>