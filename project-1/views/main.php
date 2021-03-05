<html>
<head>
    <title>Shareboard</title>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css">     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"> -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shareboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo ROOT_URL ?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_URL ?>shares">Shares</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['is_logged_in'])) : ?>                    
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL ?>users/logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL ?>users/login">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL ?>users/register">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php Message::display(); ?>
        </div>
        <div class="row">
            <?php require($view); ?>
        </div>
    </div>

</body>
</html>
