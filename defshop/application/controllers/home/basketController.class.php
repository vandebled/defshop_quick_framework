<?php

class BasketController extends Controller {

  public function indexAction() {
    if(!empty($_SESSION["cart_item"])) {
      $products = $_SESSION["cart_item"];
    }
    include CURR_VIEW_PATH . "basket.html";
  }

}
