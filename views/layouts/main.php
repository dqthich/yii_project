<?php

/** @var yii\web\View $this */
/** @var string $content */

use  yii\web\Session;
use app\assets\AppAsset;
use app\models\Account;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$session = Yii::$app->session;
$session->open();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        // NavBar::begin([
        //     'brandLabel' => 'Money Lover',
        //     'brandUrl' => Yii::$app->homeUrl,
        //     'options' => [
        //         'class' => 'navbar navbar-expand-md navbar-dark bg-primary1 fixed-top',
        //     ],
        // ]);
        // echo Nav::widget([
        //     'options' => ['class' => 'navbar-nav'],
        //     'items' => [
        //         ['label' => 'Home', 'url' => ['/site/index']],
        //         ['label' => 'Wallet', 'url' => ['/wallet/index']],
        //         ['label' => 'Transaction', 'url' => ['/transaction/index']],
        //         ['label' => 'Category', 'url' => ['/category/index']],
        //         // Yii::$app->user->isGuest ? (['label' => 'Sign in', 'url' => ['/account/login']]
        //         // ) : ('<li>'
        //         //     . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
        //         //     . Html::submitButton(
        //         //         'Logout (' . Yii::$app->user->identity->account_name . ')',
        //         //         ['class' => 'btn btn-link logout']
        //         //     )
        //         //     . Html::endForm()
        //         //     . '</li>'
        //         // )

        //         !isset($session['username']) ? (['label' => 'Sign in', 'url' => ['/account/login']]
        //         ) : ('<li>'
        //             . Html::beginForm(['/account/logout'], 'post', ['class' => 'form-inline'])
        //             . Html::submitButton(
        //                 'Logout (' . $session['username'] . ')',
        //                 ['class' => 'btn btn-link logout']
        //             )
        //             . Html::endForm()
        //             . '</li>'
        //         )



        //     ],


        // ]);
        // NavBar::end();
        ?>
        <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="http://localhost:8000">Money lover</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/wallet/index">Wallet<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/transaction/index">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/category/index">Category</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                            if (isset($session['username'])){
                                $image = Account::find()->where(['account_name'=>$session['username']])->one();
                                echo "<img src='".$image['avatar']."' style ='height: 50px; width: 50px; border-radius: 50%' class='img-thumbnail' alt=''/>"."<br/>";
                                echo $session['username']."<br/>";
                            }else{
                                echo 'Vui lòng đăng nhập?';
                            }   
                        ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost:8000/account/login">Log in</a>
                            <a class="dropdown-item" href="#">Change avatar</a>
                            <a class="dropdown-item" href="http://localhost:8000/account/upload">Upload avatar</a>
                            <a class="dropdown-item" href="#">Change password</a>
                            <a class="dropdown-item" href="http://localhost:8000/account/logout">Log out</a>
                        </div>
                        
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <!-- <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slide3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> -->

    </header>

    <main role="main" class="flex-shrink-0">

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>


    </main>



    <footer class="footer mt-auto py-3 text-muted">
        <footer class="bg-primary text-white text-center text-lg-start">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                            voluptatem veniam, est atque cumque eum delectus sint!
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links </h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Links a</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Links b</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Links c</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Links d</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Contact</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>