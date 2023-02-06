<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=BASE_URL?>">Login Register</a>
                    </li>
                    <?php if(auth() != null){ ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL?>/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL?>/logout">Logout</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL?>/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL?>/login">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    
