<?php 
$router->get('/login', 'App\PageController@login');

$router->post('/login', 'App\PageController@checkLogin');

$router->get('/logout', 'App\PageController@logout');

$router->get('/register', 'App\PageController@register');

$router->get('/user/{username}', 'App\PageController@user');

$router->post('/user/changePwd', function(){
    if(isset($_SESSION['user'])) {
        global $PDO;
        $user = new App\Models\user($PDO);
        echo $user->changePassword();
    }
    else {
        throw new ErrorException("Có lỗi xảy ra");
    }
});

$router->post('/user/changeinfor', function(){
    if(isset($_SESSION['user'])) {
        global $PDO;
        $user = new App\Models\user($PDO);
        echo $user->changeInfor();
    }
    else {
        throw new ErrorException("Có lỗi xảy ra");
    }

});

$router->delete('delete/user/{id}', function($id) {

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        global $PDO;
        $user = new App\Models\user($PDO);
        echo $user->delete($id);
    }
});


$router->get('searchUsername/{Username}', function($Username) {

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        global $PDO;
        $user = new App\Models\user($PDO);
        $users = array();
        $users = $user->searchUser($Username);
        echo json_encode($users, JSON_UNESCAPED_UNICODE);
    }
    
});




$router->post('/register', 'App\PageController@createUser');
