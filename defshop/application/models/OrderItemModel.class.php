<?php

class OrderItemModel extends Model {

  public function insertOrderItem($data) {
    $result = $this->insert($data);
    return $result;
  }

}
