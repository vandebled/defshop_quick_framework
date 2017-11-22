<?php

class Mysql {

  protected $conn = false;
  protected $sql;

  public function __construct($config = array()) {
    $host = isset($config['host'])? $config['host'] : 'localhost';
    $user = isset($config['user'])? $config['user'] : 'root';
    $password = isset($config['password'])? $config['password'] : '';
    $dbname = isset($config['dbname'])? $config['dbname'] : '';
    $port = isset($config['port'])? $config['port'] : '3306';
    $charset = isset($config['charset'])? $config['charset'] : '3306';

    $this->conn = mysqli_connect($config['host'], $config['user'], $config['password']) or die('Database connection error');
    mysqli_select_db($this->conn, $dbname) or die('Database selection error');
    $this->setChar($charset);
  }

  private function setChar($charset) {
    $sql = 'set names '.$charset;
    $this->query($sql);
  }

  public function query($sql) {
    $this->sql = $sql;
    $result = mysqli_query($this->conn, $this->sql);

    if (! $result) {
      die(mysqli_errno($this->conn).':'.mysqli_connect_error().'<br />Error SQL statement is '.$this->sql.'<br />');
    }
    return $result;
  }

  public function getAll($sql) {
    $result = $this->query($sql);
    $list = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $list[] = $row;
    }
    return $list;
  }

  public function getRow($sql) {
    if ($result = $this->query($sql)) {
      $row = mysqli_fetch_assoc($result);
      return $row;
    } else {
      return false;
    }
  }

  public function getInsertId() {
    return mysqli_insert_id($this->conn);
  }

}
