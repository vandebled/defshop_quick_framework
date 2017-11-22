<?php

class CheckoutController extends Controller {

  public function indexAction() {
    if(!isset($_SESSION['logged_user']) || empty($_SESSION["cart_item"])) {
      header("Location: /?c=basket");
      die();
    }
    if(!empty($_SESSION["cart_item"])) {
      $products = $_SESSION["cart_item"];
    }

    if(isset($_POST['submit'])) {
      $shopOrder = new ShopOrderModel('shop_order');
      $dataToInsert = [
        'user_id' => $_SESSION['logged_user_id'],
        'method' => $_POST['method'],
        'created' => date('Y-m-d H:i:s'),
      ];
      $insertedOrderId = $shopOrder->insertOrder($dataToInsert);

      if($insertedOrderId) {
        foreach($_SESSION["cart_item"] as $item) {
          $orderItemModel = new OrderItemModel('order_item');
          $dataToInsert = [
            'shop_order_id' => $insertedOrderId,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
          ];

          $insertedOrderItemId = $orderItemModel->insertOrderItem($dataToInsert);
        }
        unset($_SESSION["cart_item"]);
        $order = "ok";
      }
    }

    include CURR_VIEW_PATH . "checkout.html";
  }

}
