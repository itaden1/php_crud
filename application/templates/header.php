<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href=<?php echo CSS_PATH."styles.css" ?> />
    <title><?php echo $data["title"] ?></title>
</head>
<body>
<header class="header">
    <div class="container">
        <h1><?php echo $data["title"] ?></h1>
        <nav class="nav">
            <a href="/">Home</a>
            <a href="/speakers">Speakers</a>
            <div class=pull-right>
            <?php if ($user){ ?>
                <a href=""><?php $user["name"] ?></a>
                <a href="logout">logout</a>
            <?php }else { ?>
                <a href="login">Login</a>
            <?php } ?>
            </div>
        </nav>

    </div>
</header>
