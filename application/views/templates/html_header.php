
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= isset($titulo)?$titulo:'WalterSGI'?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?= base_url(); ?>assets/css/estilo.css" rel="stylesheet">
    </head>

    <body>
<!-- Wrap all page content here -->
<div class="container" id="wrap">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 corpo">
            <div class="row">
                <header class="col-sm-12 header">
                    <div class="col-md-8">
                        <img src="#" alt="Logo da empresa ou topo"/>
                        <h1>Titulo do Sistema</h1>
                        <br/><br/>
                    </div>
                    <div class="col-md-4" id="area_user">
                        <?php if (isset($nome_usuario) && isset($nivel)): ?>
                            <div class="col-md-8" id="area_user_dados">
                                <p class="bottom text-right"><?php echo $nome_usuario; ?></p>
                                <p class="bottom text-right"><?php echo $nivel; ?></p>
                            </div>

                        <div class="col-md-4" id="area_user_img">
                                <img class="img-responsive img-thumbnail" src="<?= base_url() . (isset($foto) ? $foto : 'assets/imgs/imagem.jpg') ?>" alt="Foto do usuário"/>
                            </div>
                        <?php endif; ?>
                    </div>
                           
                </header>
            </div>
