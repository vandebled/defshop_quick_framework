<?php

class ShopOrderModel extends Model {

  public function insertOrder($data) {
    $result = $this->insert($data);
    return $result;
  }

}
