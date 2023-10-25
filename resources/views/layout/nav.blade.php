<div class="container-fluid" id="navbar">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/online.jpg')}}" style="height: 30px;">
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
                        <a class="nav-link active" aria-current="page" href="/cart">
                            Cart
                            <span class="badge bg-danger" style="position: relative;top:-10px;left:-5px;"
                                id="cart-count">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                    <li>
                    <div class="nav-item dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(\App\Classes\Auth::check())
                        {{\App\Classes\Auth::user()->name}}
                    @else
                        Member
                    @endif        
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(\App\Classes\Auth::check())
                            <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
                            @else
                            <li><a class="dropdown-item" href="/user/login">Login</a></li>
                            <li><a class="dropdown-item" href="/user/register">Register</a></li>
                            @endif
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>