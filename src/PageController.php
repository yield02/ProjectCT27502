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

	

	$builder = new \Gregwar\Captcha\CaptchaBuilder();
	$builder->build();

		$_SESSION['phrase'] = $builder->getPhrase();
		echo $_SESSION['phrase'];
		require __DIR__ . '/page/login.php';
	}

	public function logout()
	{	
		if($_SESSION['user'])
			unset($_SESSION['user']);
		if($_SESSION['admin']) 
			unset($_SESSION['admin']);

		echo "Bạn đã đăng xuất";
		header('location: /');
		exit();
	}

	public function register() {
		
		$builder = new \Gregwar\Captcha\CaptchaBuilder();
		$builder->build();

		$_SESSION['phrase'] = $builder->getPhrase();
		echo $_SESSION['phrase'];
		require __DIR__ . '/page/register.php';
	}

	public function checkLogin()
	{
		global $PDO;
		$user = new Models\User($PDO);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (
				!(isset($_SESSION['phrase']) &&
					\Gregwar\Captcha\PhraseBuilder::comparePhrases(
						$_SESSION['phrase'],
						$_POST['captcha']
					)
				)
			) {
				echo $_SESSION['phrase'];
				$error_message = 'Nhập sai mã captcha!';

			} else if (
				!empty($_POST['username']) &&
				!empty($_POST['password']) &&
				isset($_SESSION['phrase']) &&
				\Gregwar\Captcha\PhraseBuilder::comparePhrases(
					$_SESSION['phrase'],
					$_POST['captcha']
				)
			) {
				
				if ($user->checkUser(strtolower($_POST['username']), $_POST['password'])) {
					if($user->checkAdmin(strtolower($_POST['username']), $_POST['password'])) {
						$_SESSION['admin'] = true;
					}

					$_SESSION['user'] = strtolower($_POST['username']);
					
					header('location: /');
        			exit();
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

	public function createUser() {
		global $PDO;
		$user = new Models\User($PDO);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (
				!(isset($_SESSION['phrase']) &&
					\Gregwar\Captcha\PhraseBuilder::comparePhrases(
						$_SESSION['phrase'],
						$_POST['captcha']
					)
				)
			) {
				echo "<h6 class='text-danger'>Nhập sai mã capcha!</h6>";

			}
			else if($user->checkUserName(strtolower($_POST['username']))) {
				echo "<h6 class='text-danger'>Tài khoản đã tồn tại</h6>";
			}
			else {
				if($user->register(strtolower($_POST['username']), $_POST['password'], $_POST['email'], $_POST['phone']))
					echo "<h6 class='text-info'>Đăng ký thành công </h6>";
				else 
					echo "<h6 class='text-danger'>Có lỗi xảy ra </h6>";
			}
		}
	}


	public function manage()
	{
		require __DIR__ . '/page/manage.php';
	}

	public function addPage() {
		require __DIR__ . '/page/add.php';

	}

	public function book($id)
	{
		require __DIR__ . '/page/book.php';
	}

	public function user($name) {
		if(isset($_SESSION['user']) && $_SESSION['user'] == $name) {
			require __DIR__ . '/page/user.php';
		}
		else {
			require __DIR__ . '/components/header.php';
			echo '<h2>Truy cập bị từ chối!</h2>';
			$error_message = 'Bạn không có quyền truy xuất trang này';
			require __DIR__ . '/components/show_error.php';
			require __DIR__ . '/components/footer.php';
		}
	}


	public function editBook($id) {
		if(isset($_SESSION['user']) && isset($_SESSION['admin'])) {
			require __DIR__ . '/page/editBook.php';
		}
		else {
			require __DIR__ . '/components/header.php';
			echo '<h2>Truy cập bị từ chối!</h2>';
			$error_message = 'Bạn không có quyền truy xuất trang này';
			require __DIR__ . '/components/show_error.php';
			require __DIR__ . '/components/footer.php';
		}
	}

	public function editCategory($id) {
		if(isset($_SESSION['user']) && isset($_SESSION['admin'])) {
			require __DIR__ . '/page/editCategory.php';
		}
		else {
			require __DIR__ . '/components/header.php';
			echo '<h2>Truy cập bị từ chối!</h2>';
			$error_message = 'Bạn không có quyền truy xuất trang này';
			require __DIR__ . '/components/show_error.php';
			require __DIR__ . '/components/footer.php';
		}
	}

	public function BorrowAddCart() {
		global $PDO;
		$user = $_SESSION['user'];
		if(!$user) {
			header('location: /login');
		}
		else {
			if(isset($_POST['BookID'])) {
				global $PDO;

				$BorrowTicket = new Models\BorrowTicket($PDO);

				$BorrowDetail = new Models\BorrowDetail($PDO);


				//Check co cart
				if($BorrowTicket->getCart($_SESSION['user'])) {
					// Neu co them vao cart
					$BorrowDetail->addDetailCart($BorrowTicket->getBorrowID(), $_POST['BookID']);
				}


				else {
					// `Neu khong

					//Tao cart
					$cartID = $BorrowTicket->addCart($_SESSION['user']);

					//Them vao cart 
					$BorrowDetail->addDetailCart($cartID, $_POST['BookID']);

				}
				

			}
		}
	}

	public function cart($username) {
		if(isset($_SESSION['user']) && $_SESSION['user'] == $username) {
			require __DIR__ . '/page/cart.php';
		}
		else {
			require __DIR__ . '/components/header.php';
			echo '<h2>Truy cập bị từ chối!</h2>';
			$error_message = 'Bạn không có quyền truy xuất trang này';
			require __DIR__ . '/components/show_error.php';
			require __DIR__ . '/components/footer.php';
		}

	}

	public function deleteBookCart() {
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {

			global $PDO;
			$BorrowTicket = new Models\BorrowTicket($PDO);
			$BorrowDetail = new Models\BorrowDetail($PDO);
			if(isset($_POST['BorrowDetailID']) && isset($_POST['CartID']) && $_POST['CartID'] == $BorrowTicket->getCart($_SESSION['user'])->getBorrowID()){
				$BorrowDetail->deleteDetailCart($_POST['BorrowDetailID']);
			}
			else {
				throw new Exception("Có lỗi xảy ra");
			}

		}
	}

}
?>