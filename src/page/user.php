<?php 

include __DIR__.'/../../bootstrap.php';


use App\Models\User;


$user = new User($PDO);
$user->getUser($_SESSION['user']);

$page = 'user';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
?>

<div id="user">
    <div class="container" style="height: 40rem;">
        <h2 class="my-5 text-center animated fadeIn">Thông tin cá nhân</h2>
        <div class="row mb-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Thông tin chi tiết
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Họ và tên:</strong> <?php echo $user->getFullName() ?>. <br>
                            <strong>Số điện thoại:</strong> <?php echo $user->getPhone() ?>. <br>
                            <strong>Email:</strong> <?php echo $user->getEmail() ?>. <br>
                            <strong>Địa chỉ:</strong> <?php echo $user->getAddress() ?>. <br>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Thay đổi thông tin chi tiết
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form class="changeForm" id="changeInformation" novalidate>
                                <div class="mb-3 row">
                                    <label for="iFullName" class="col-4 col-form-label"><strong>Họ và tên:
                                        </strong></label>
                                    <div class="col-6" style="height: 3.5rem;">
                                        <input class="form-control" name="iFullName" type="text" id="iFullName"
                                            value="<?php echo $user->getFullName() ?>">
                                        <div id="n_validation" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="iPhone" class="col-4 col-form-label"><strong>Số điện thoại:
                                        </strong></label>
                                    <div class="col-6" style="height: 3.5rem;">
                                        <input class="form-control" name="iPhone" type="phone" id="iPhone"
                                            value="<?php echo $user->getPhone() ?>">
                                        <div id="p_validation" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="iEmail" class="col-4 col-form-label"><strong>Email: </strong></label>
                                    <div class="col-6" style="height: 3.5rem;">
                                        <input class="form-control" name="iEmail" type="email" id="iEmail"
                                            value="<?php echo $user->getEmail() ?>">
                                        <div id="e_validation" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="iAddress" class="col-4 col-form-label"><strong>Địa chỉ:
                                        </strong></label>
                                    <div class="col-6" style="height: 3.5rem;">
                                        <input class="form-control" name="iAddress" type="text" id="iAddress"
                                            value="<?php echo $user->getAddress() ?>">
                                        <div id="a_validation" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="my-3 row">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mb-3 w-25" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Lưu thông tin</button>
                                        <div id="ciResult"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Thay đổi mật khẩu
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form class="changeForm" id="changePass">
                                <div class="mb-3 row">
                                    <label for="iFullName" class="col-5 col-form-label"><strong>Mật khẩu cũ:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" name="old-Password" type="password" id="opwd"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="iFullName" class="col-5 col-form-label">
                                        <strong>Mật khẩu mới: </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" name="new-Password" type="password" id="npwd"
                                            required></input>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="iFullName" class="col-5 col-form-label">
                                        <strong>Nhập lại mật khẩu mới: </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" name="re-new-Password" type="password" id="rnpwd"
                                            required></input>
                                    </div>
                                </div>
                                <div class="my-3 row">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mb-3 w-25">Đồng ý</button>
                                    </div>
                                </div>
                            </form>
                            <div id="cpResult"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

require_once __DIR__ . '/../components/footer.php';

?>