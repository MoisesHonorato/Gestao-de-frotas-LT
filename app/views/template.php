<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo ucfirst($page); ?> | eFrotas</title>

    <!-- LINKS -->
    <?php include_once 'links-head.php'; ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- MENU -->
            <?php include_once 'menu.php'; ?>

            <!-- CABEÇALHO -->
            <?php include_once 'cabecalho.php'; ?>

            <!-- HOME -->
            <div class="right_col" role="main">
                
                <?php
                
                $this->load($view, $viewData);
                
                ?>
            </div>

            <!-- footer content -->
            <?php include_once 'rodape.php'; ?>

        </div>
    </div>

    <!-- links JS -->
    <?php include_once 'links-rodape.php'; ?>

</body>

</html>