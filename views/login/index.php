<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
include "head.php";
?>
<body>
<!--<><><><><> header <><><><><>-->

<!-- <><><><><>  select section <><><><><> -->
<section class="main-sec">
    <div class="container login" id="login">
        <div class="form-login sign-up-login">
            <form id="register-form">
                <h3>create account</h3>
                <input type="text" id="register-username" placeholder="username"/>
                <input type="password" id="register-password" placeholder="password"/>
                <input type="password" id="register-password-repeat" placeholder="repeat password"/>
                <div class="alert">

                </div>
                <button class="mt-4">register</button>
            </form>
        </div>
        <div class="form-login sign-in-login">
            <form id="login-form">
                <h3>sign in</h3>
                <input type="text" name="username" id="username" placeholder="username"/>
                <input type="password" name="password" id="password" placeholder="password"/>
                <div class="alert-2">

                </div>
                <a href="#" class="mt-3">forget password?</a>
                <button class="mt-4">submit</button>
            </form>
        </div>
        <div class="overlay-login">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="login-logo">
                        <img src="public/img/gardoon-logo.svg" alt="">
                    </div>
                    <h4>WELCOME!</h4>
                    <p>sign up؟</p>
                    <button class="ghost" id="signIn">sign in</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <div class="login-logo">
                        <img src="public/img/gardoon-logo.svg" alt="">
                    </div>
                    <h4>WELCOME!</h4>
                    <p>do you have account?</p>
                    <p>Act now</p>
                    <button class="ghost" id="signUp">sign up</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <><><><><> END  select section <><><><><> -->
</body>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    function go2NewUrl(newUrl, sec) {
        setTimeout("location.href='" + newUrl + "'", sec * 1000);
    }
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const login = document.getElementById('login');

    signUpButton.addEventListener('click', () => {
        login.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        login.classList.remove("right-panel-active");
    });
    window.onload = function () {
        document.getElementById("login-form").onsubmit = function () {
            let user = $('#username').val();
            let pass = $('#password').val();
            $.post("login/checkUser", {
                username: user,
                password: pass
            }, function (data) {
                let response = JSON.parse(data);
                console.log(response);
                if (response['success'] === 1){
                    go2NewUrl(response['data'], 0);
                }else{
                    $('.alert-2').html('<p class="text-danger">'+response['data']+'</p>')
                }
            });
            return false;
        };
        document.getElementById("register-form").onsubmit = function () {
            let user = $('#register-username').val().toString();
            let pass = $('#register-password').val();
            let pass_repeat = $('#register-password-repeat').val();
            if (pass !== ''){
                if (pass === pass_repeat ) {
                    if (user.length >= 8) {
                        $.post("login/checkLogin", {
                            username: user,
                            password: pass
                        }, function (data) {
                            let response = JSON.parse(data);
                            console.log(response);
                            if (response['success'] === 1){
                                go2NewUrl('index/index', 0)
                            }else{
                                $('.alert').html('<p class="text-danger">'+ response['data'] +'</p>')
                            }
                        });
                    } else {
                        $('.alert').html('<p class="text-danger"> username must be more than 8 character !! </p>')
                    }
                } else {
                    $('.alert').html('<p class="text-danger"> your repeat password is wrong !! </p>');
                }
            }else{
                $('.alert').html('<p class="text-danger"> your password is empty !! </p>');
            }


            return false;
        };
    }
</script>
</html>