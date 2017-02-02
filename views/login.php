<html>
    <head>
        <meta charset="UTF-8"> 
        <title>.: Cantina - Login:.</title>
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <br/>
        <br/>
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"><h3>.: Login :.</h3></div>
                        <div class="panel-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="flogin">Login:</label>
                                    <input type="text" class="form-control" name="login" id="flogin" />
                                </div>
                                <div class="form-group">
                                    <label for="fsenha">Senha:</label>
                                    <input type="password" class="form-control" name="senha" id="fsenha" />
                                </div>
                                <input type="submit" class="btn btn-success" value="Login" />
                            </form>
                        </div>
                        <div class="panel-footer">
                            <?php if (isset($aviso) && !empty($aviso)): ?>
                            <div class="alert alert-danger" role="alert"><?php echo $aviso; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>