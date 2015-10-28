<?php

	// views
include('views/NavBarView.class.php');
include('views/LoginView.class.php');
include('views/ProfileView.class.php');
include('views/UploadView.class.php');
include('views/PracticeView.class.php');

	// models
include('models/Utilisateur.class.php');

	//controllers
include('controllers/UploadController.class.php');

<<<<<<< HEAD
	class MainController {

		function __construct() {
			
			//charge la session si cookie présent
			if(isset($_COOKIE["moncookie"])) {
				$username_cookie = substr($_COOKIE["moncookie"], 0, strrpos($_COOKIE["moncookie"], " "));
				$password_cookie = substr($_COOKIE["moncookie"], strrpos($_COOKIE["moncookie"], " ")+1);
				$login = new Utilisateur($username_cookie, $password_cookie);
			}

			//insertion de la navbar
			navBar();

			//choix de la page
			if ($this->isLogged())
			{
				if (isset($_GET['page']))
				{
					switch ($_GET['page'])
					{
						case 'login':
							$this->login();
							break;

						case 'logout':
							$this->logout();
							break;

						case 'practice':
							$this->practice();
							break;

						case 'upload':
							$this->upload();
							break;

						default: //404
							break;
					}
=======
class MainControleur {

	function __construct() {

		if(isset($_COOKIE["moncookie"])) {
			$username_cookie = substr($_COOKIE["moncookie"], 0, strrpos($_COOKIE["moncookie"], " "));
			$password_cookie = substr($_COOKIE["moncookie"], strrpos($_COOKIE["moncookie"], " ")+1);
			$login = new Utilisateur($username_cookie, $password_cookie);
		}

		$this->navBar();

		if (isset($_GET['page']))
		{
			switch ($_GET['page'])
			{
				case 'login':
				$this->login();
				break;

				case 'logout':
				$this->logout();
				break;

				case 'practice':
				$this->practice();
				break;

				case 'upload':
				$this->upload();
				break;

					default: //404

					break;
>>>>>>> 4f09a5b526a3ab55b0731056eb357c7fb55b5d7d
				}
				else
				{
					$this->profile();
				}			
			}
			else
			{
				$this->login();
			}
			
			//popup d'erreur
			if(isset($_SESSION['error']) AND $_SESSION['error'] != null AND isset($_SESSION['display_msg_error']) AND $_SESSION['display_msg_error'])
			{
				include('include/ErrorModal.php');
				$_SESSION['display_msg_error'] = false;
			}
			//popup de succès
			if(isset($_SESSION['success']) AND $_SESSION['success'] != null AND isset($_SESSION['display_msg_success']) AND $_SESSION['display_msg_success'])
			{
				include('include/SuccessModal.php');
				$_SESSION['display_msg_success'] = false;
			}
		}
		
		//insertion de la navbar
		function navBar() {
			$navBarView = new navBarView();
			echo $navBarView->getView();
		}
		
		//teste si l'utilisateur est connecté
		function isLogged() {
			if (isset($_SESSION['isLogged']) AND $_SESSION['isLogged'] == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		//charge la page de login
		function login() {
			$login = new Utilisateur($_GET['username'],$_GET['password']);
<<<<<<< HEAD
			if (!$this->isLogged())
=======
			if ($this->isLogged())
>>>>>>> 4f09a5b526a3ab55b0731056eb357c7fb55b5d7d
			{
				$_SESSION['isLogged'] = false;
				$loginView = new loginView();
				echo $loginView->getView();
			}
			else
			{
				$profileView = new ProfileView();
				echo $profileView->getView();
			}
		}

		//charge la page de déconnection
		function logout() {
			if (isset($_COOKIE['moncookie']))
			{
				unset($_COOKIE['moncookie']);
				setcookie('moncookie', '', time() - 3600, '/');
			}
			session_unset();
			session_destroy();
			$loginView = new loginView();
			echo $loginView->getView();
		}

<<<<<<< HEAD
		//charge la page practice
		function practice() {
			$practiceView = new PracticeView();
			echo $practiceView->getView();

		}

		//charge la page upload
		function upload() {
			if (isset($_FILES['fichierUp']['name']) AND $_FILES['fichierUp']['name'] != null)
=======
		function practice(){
			if ($this->isLogged())
			{
				$_SESSION['isLogged'] = false;
				$loginView = new loginView();
				echo $loginView->getView();
			}
			else
			{
				$practiceView = new PracticeView();
				echo $practiceView->getView();
			}

		}

		function upload(){
			if ($this->isLogged())
			{
				$_SESSION['isLogged'] = false;
				$loginView = new loginView();
				echo $loginView->getView();
			}
			else
>>>>>>> 4f09a5b526a3ab55b0731056eb357c7fb55b5d7d
			{
				$uploader = UploadController::Instance();
				$uploader->UploadFile();
			}
			$uploadView = new UploadView();
			echo $uploadView->getView();
		}

<<<<<<< HEAD
		//charge la page profile
		function profile() {
			$profileView = new ProfileView();
			echo $profileView->getView();
=======

		function newLogin(){
			if ($this->isLogged())
			{
				$_SESSION['isLogged'] = false;
				$loginView = new loginView();
				echo $loginView->getView();
			}
			else
			{
				$profileView = new ProfileView();
				echo $profileView->getView();
			}
>>>>>>> 4f09a5b526a3ab55b0731056eb357c7fb55b5d7d
		}
		
	}
	?>
