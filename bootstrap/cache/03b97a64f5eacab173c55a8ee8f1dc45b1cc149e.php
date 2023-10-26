<div class="container-fluid" id="navbar">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="<?php echo e(asset('images/online.jpg')); ?>" style="height: 30px;">
                <span class="text-white">Online Market</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0" id="nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/cart">
                            Cart
                            <span class="badge bg-danger" style="position: relative;top:-10px;left:-5px;"
                                id="cart-count">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>

                    <?php

                    use App\classes\Auth;

                    if (Auth::check()) : ?>
                    <?php if (Auth::user()->admin === 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin">Admin</a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li>
                        <div class="nav-item dropdown">
                            <button class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php if(\App\Classes\Auth::check()): ?>
                                <?php echo e(\App\Classes\Auth::user()->name); ?>

                                <?php else: ?>
                                Sign in
                                <?php endif; ?>
                            </button>
                            <ul class="dropdown-menu" style="min-width: 100px;"
                                aria-labelledby="navbarDropdownMenuLink">
                                <?php if(\App\Classes\Auth::check()): ?>
                                <a class="dropdown-item text-center" href="/user/logout">Logout</a>
                                <?php else: ?>

                                <a class="dropdown-item text-center" href="/user/login">Login</a>
                                <a class="dropdown-item text-center" href="/user/register">Register</a>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>