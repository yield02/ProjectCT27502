<?php 



$page = 'login';

require_once __DIR__ . '/../components/header.php';

?>

<div id="content">

    <div class="overlay">
        <!-- LOGN IN FORM by Omar Dsoky -->
        <form method="post" class="form border border-dark">
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
                        <input class="form-input" type="password" placeholder="Password" id="pwd" name="password"
                            required>

                        <!--      Show/hide password  -->
                        <span>
                            <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                        </span>



                    </div>
                    <br>
                    <div class="border border-black rounded-2">
                        <!--   Re-Password -->

                        <span class="input-item">
                            <i class="fa fa-key"></i>
                        </span>
                        <!--   Re-Password Input-->
                        <input class="form-input" type="password" placeholder="Re-Password" id="re-pwd"
                            name="Re-password" required>


                        <span>
                            <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                        </span>
                    </div>

                    <br>

                    <div class="border border-black rounded-2">
                        <!--   Email -->
                        <span class="input-item">
                            <i class="fa-solid fa-at"></i>
                        </span>
                        <!--   Email Input-->
                        <input class="form-input" id="txt-input" type="email" placeholder="Email" name="email" required>

                    </div>

                    <br>

                    <div class="border border-black rounded-2">
                        <!--   Phone -->
                        <span class="input-item">
                            <i class="fa-solid fa-mobile"></i>
                        </span>
                        <!--   Phone Input-->
                        <input class="form-input" id="txt-input" type="phone" placeholder="Phone" name="phone" required>

                    </div>



                    <div class="captchacontainer">
                        <img src="<?=$builder->inline()?>" alt="Captcha" class="border border-black rounded-2">
                        <br>
                        <input class="form-input border border-black rounded-2" type="text" name="captcha"
                            placeholder="Captcha">
                    </div>
                    <br>
                    <!--        buttons -->
                    <!--      button LogIn -->
                    <div id="result"></div>
                    <button class="btn log-in border border-black rounded-2 mb-2"> Đăng ký </button>
                </div>

                <!--   other buttons -->
                <div class="other">
                    <!--      Forgot Password button-->
                    <button type="button" class="btn border border-black rounded-2" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" data-bs-title="Tính năng đang được cập nhật...">Quên mật
                        khẩu</button>
                    <!--     Sign Up button -->
                    <button type="button" class="btn border border-black rounded-2">
                        <a href="/login">Đăng nhập <i class="fa fa-user"></i></a>
                        <!--         Sign Up font icon -->

                    </button>
                    <!--      End Other the Division -->
                </div>

                <!--   End Conrainer  -->
            </div>

            <!-- End Form -->
        </form>



    </div>
    <script>
    $(document).ready(function() {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
            tooltipTriggerEl))

        $('form').submit(function(event) {
            event.preventDefault();

            // Lấy dữ liệu từ form
            var formData = {
                username: $('input[name="username"]').val(),
                password: $('input[name="password"]').val(),
                email: $('input[name="email"]').val(),
                phone: $('input[name="phone"]').val(),
                captcha: $('input[name="captcha"]').val()
            };

            // Gửi request post đến API
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formData,
                success: function(data) {

                    var res = `<h6 class="text-info">${data}</h6>`

                    $('#result').html(res);
                },
                error: function(error) {

                    var res = `<h6 class="text-danger">Có lỗi xảy ra</h6>`

                    $('#result').html();
                    console.log(error);
                }
            });
        });
    });




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



<div>
    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseChangePassword" role="button"
            aria-expanded="false" aria-controls="collapseChangePassword">
            Đổi mật khẩu
        </a>
    </p>
    <div class="collapse" id="collapseChangePassword">
        <div class="card card-body">
            <form class="d-flex flex-column changePassword">
                <lable>Mật khẩu cũ:</lable> <input name="old-Password" ></input>
                <lable>Mật khẩu mới:</lable> <input name="new-Password"></input>
                <lable>Nhập lại mật khẩu: </lable> <input name="re-new-Password" /> </input>
                <button class="">Đồng ý</button>
            </form>
        </div>
    </div>
</div>
