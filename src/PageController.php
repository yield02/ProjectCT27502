<?php
namespace App;

use Gregwar\Captcha\PhraseBuilder;

class PageController
{
	public function index()
	{
		require __DIR__ . '/page/home.php';
	}

	public function login()
	{
		require __DIR__ . '/page/login.php';
	}

	public function logout()
	{
		echo "Bạn đã đăng xuất";
	}

	public function checkLogin()
	{
		global $PDO;
		$user = new Models\User($PDO);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (
				!(isset($_SESSION['phrase']) &&
					Gregwar\Captcha\PhraseBuilder::comparePhrases(
						$_SESSION['phrase'],
						$_POST['captcha']
					)
				)
			) {
				$error_message = 'Nhập sai mã captcha!';

			} else if (
				!empty($_POST['username']) &&
				!empty($_POST['password']) &&
				isset($_SESSION['phrase']) &&
				Gregwar\Captcha\PhraseBuilder::comparePhrases(
					$_SESSION['phrase'],
					$_POST['captcha']
				)
			) {
				if ($user->checkUser(strtolower($_POST['username']), $_POST['password'])) {
					$_SESSION['user'] = 'me';
					$loggedin = true;
					echo "ok rồi nè";
				} else {
					$error_message = 'Địa chỉ email và mật khẩu không khớp!';
				}
			} else {
				$error_message = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ địa chỉ email và mật khẩu!';
			}
		}
		if (isset($error_message)) {
			include __DIR__ . '/components/show_error.php';
		}
	}

	public function manage()
	{
		require __DIR__ . '/page/manage.php';
	}

	public function book($id)
	{
		require __DIR__ . '/page/book.php';
	}
}
?>