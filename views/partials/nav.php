<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar"
     style="background: rgb(221, 209, 195,0.8);z-index:100;">
    <div class="container">
        <a class="navbar-brand" style="color:#504831" href="index">Carmel<small>California</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu" style="color:#504831"></span> Menu
        </button>
        <div class="navbar-collapse nav-transition" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <?php foreach($navItems as $navItem): ?>
                    <li class="nav-item" id="<?= $navItem->path ?>">
                        <a href="<?= $navItem->path ?>" class="nav-link"><?= $navItem->name ?></a>
                    </li>

                <?php endforeach; ?>

                <?php if (isset($_SESSION['user'])): ?>
                    <li class='nav-item' id="<?= $logout->path ?>"><a class='nav-link' href='<?= $logout->path ?>'><?= $logout->name ?></a></li>
                <?php else: ?>
                    <li class='nav-item' id="<?= $signin->path ?>"><a class='nav-link' href='<?= $signin->path ?>'>
                            <?= $signin->name ?></a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user']) && $user->getType()->isAllowed('dashboard')): ?>
                    <li class='nav-item' id="<?= $admin->path ?>"><a class='nav-link' href='<?= $admin->path
                        ?>'><?= $admin->name ?></a></li>
                <?php endif; ?>

                <li class="nav-item cart" id="cart">
                    <a href="cart" class="nav-link">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="bag d-flex justify-content-center align-items-center">
                            <small id="Items_count"><?= $quantity ?></small>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>