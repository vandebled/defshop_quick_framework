<?php

class ProductModel extends Model {

  public function getProducts() {
    $sql = "SELECT * FROM $this->table";
    $products = $this->db->getAll($sql);
    return $products;
  }

  public function getProduct($id) {
    $sql = "SELECT * FROM $this->table WHERE id = '$id'";
    $product = $this->db->getRow($sql);
    return $product;
  }

}
