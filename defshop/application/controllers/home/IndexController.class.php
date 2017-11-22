<?php

class IndexController extends Controller {

  public function indexAction() {
    $productModel = new ProductModel('product');
    $products = $productModel->getProducts();

    if(!empty($_POST["quantity"])) {
      $product = $productModel->getProduct($_POST['id']);
      $item[$_POST['id']] = [
        'id' => $product['id'],
        'name' => $product['name'],
        'color' => $product['color'],
        'image' => $product['image'],
        'quantity' => $_POST['quantity'],
        'price' => $product['net'],
      ];
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($product['id'], array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
            if($product['id'] == $k) {
              if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                $_SESSION["cart_item"][$k]["quantity"] = 0;
              }
              $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
            }
          }
        } else {
  				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $item);
  			}
      } else {
        $_SESSION["cart_item"] = $item;
      }
    }
    include CURR_VIEW_PATH . "main.html";
  }
  
}
