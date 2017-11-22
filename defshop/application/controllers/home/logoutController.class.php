<?php

class LogoutController extends Controller {

  public function indexAction() {
    if(isset($_SESSION['logged_user'])) {
      unset($_SESSION['logged_user']);
    }
    header("Location: /");
    die();
  }
  
}
