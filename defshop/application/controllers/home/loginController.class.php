<?php

class LoginController extends Controller {

  public function indexAction() {
    if(isset($_POST['submit'])) {
      foreach($_POST as $key=>$value) {
      	if(empty($_POST[$key])) {
      	   $error_message = "All Fields are required";
           break;
    	  }
      }
      $userModel = new UserModel('user');
      $user = $userModel->getUser($_POST['username'], $_POST['password']);
      if(!$user) {
        $error_message = "Wrong Email or Password";
      } else {
        $_SESSION['logged_user'] = $user['name'];
        $_SESSION['logged_user_id'] = $user['id'];
        header("Location: /");
        die();
      }
    }
    include CURR_VIEW_PATH . "login.html";
  }

}
