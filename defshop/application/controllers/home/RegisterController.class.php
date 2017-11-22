<?php

class RegisterController extends Controller {

  public function indexAction() {
    if(isset($_POST['submit'])) {
      foreach($_POST as $key=>$value) {
      	if(empty($_POST[$key])) {
      	   $error_message = "All Fields are required";
           break;
    	  }
      }
      if($_POST['password'] != $_POST['confirm_password']){
        $error_message = 'Passwords should be same<br>';
      }
      if(!isset($error_message)) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $error_message = "Invalid Email Address";
        } else {
          $userModel = new UserModel('user');
          $dataToInsert = [
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
          ];
          $result = $userModel->insertUser($dataToInsert);
        }
      }
    	if(!empty($result)) {
    		$error_message = "";
    		$success_message = "You have registered successfully!";
    		unset($_POST);
    	} else if(isset($result)) {
    		$error_message = "Problem in registration. Try Again!";
    	}
    }
    include CURR_VIEW_PATH . "register.html";
  }

}
