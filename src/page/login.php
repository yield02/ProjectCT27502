<?php 



$page = 'login';

require_once __DIR__ . '/../components/header.php';

?>

<div id="content">

    <div class="overlay">
        <!-- LOGN IN FORM by Omar Dsoky -->
        <form method="post" action="/login" class="form border border-dark">
            <!--   con = Container  for items in the form-->
            <div class="con">
                <!--     Start  header Content  -->
                <header class="head-form">
                    <h2 class="fs-5">
                        <i class="fa-solid fa-user me-3 fs-4"></i>Tài khoản
                    </h2>
                </header>
                <!--     End  header Content  -->
                <br>
                <div class="field-set ">

                     <div class="border border-black rounded-2">
                        <!--   user name -->
                     <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <!--   user name Input-->
                    <input class="form-input" id="txt-input" type="text" placeholder="@UserName" name="username"
                        required>

                     </div>
                    <br>

                    <div class="border border-black rounded-2">
                        <!--   Password -->

                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <!--   Password Input-->
                    <input class="form-input" type="password" placeholder="Password" id="pwd" name="password" required>

                    <!--      Show/hide password  -->
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                    </span>
                    </div>
                    <div class="captchacontainer">
                        <img src="<?=$builder->inline()?>" alt="Captcha" class="border border-black rounded-2">
                        <br>
                        <input class="form-input border border-black rounded-2" type="text" name="captcha" placeholder="Captcha">
                    </div>

                    <br>
                    <!--        buttons -->
                    <!--      button LogIn -->
                    <button class="log-in border border-black rounded-2"> Đăng ký </button>
                </div>

                <!--   other buttons -->
                <div class="other">
                    <!--      Forgot Password button-->
                    <button class="btn submits frgt-pass border border-black rounded-2">Quên mật khẩu</button>
                    <!--     Sign Up button -->
                    <a href="/register" class="btn submits sign-up border border-black rounded-2">Đăng ký
                        <!--         Sign Up font icon -->
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>
                    <!--      End Other the Division -->
                </div>

                <!--   End Conrainer  -->
            </div>

            <!-- End Form -->
        </form>
    </div>
    <script>
    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function() {
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);
    </script>

    <?php 
require_once __DIR__ . '/../components/addCss.php';

require_once __DIR__ . '/../components/footer.php';

?>