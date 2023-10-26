<style>
body {
    background-image: url(<?php echo URL_ROOT . "assets/images/back.jpg" ?>);
    background-size: cover;
}
</style>
@extends("layout.master")

@section("title","User Login")

@section("content")
<div class="container col-md-8 mt-5 table-bordered"
    style="background-image: url(<?php echo URL_ROOT . "assets/images/back01.jpg" ?>);background-size: cover;padding:50px 0 90px 0;">
    <div class="col-md-8 offset-md-2">
        <h1 style="text-align: center;margin-bottom:30px;font-family:cambria;color:orange;">Login</h1>
        @if(\App\Classes\Session::has("success_message"))
        {{(\App\Classes\Session::flash("success_message"))}}
        @endif

        @if(\App\Classes\Session::has("error_message"))
        {{(\App\Classes\Session::flash("error_message"))}}
        @endif
        <form action="/user/login" method="post">
            <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="row-fluid mt-2">
                <a href="/user/register">Not Member Yet! Please Register Here</a>
                <span style="float: right;margin-top:50px;">
                    <button type="submit" class="btn btn-outline-warning">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection