<?php
require_once "./connection/config.php";
require_once "./classes/User.php";


class Role
{

  public function __construct($cn, $id)
  {
    $query = $cn->prepare("SELECT * FROM roles WHERE id=:id");
    $query->bindParam(":id", $id);
    $query->execute();

    $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
  }

  public static function findById($id) {
    global $cn;
    return new Role($cn, $id);
  }

  public static function all() {
    global $cn;
    $query = $cn->prepare("SELECT * FROM roles");
    $query->execute();

    $array = array();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $array[] = new Role($cn, $row['id']);
    }
    return $array;
  }

  public static function findByName($name) {
    global $cn;
    $query = $cn->prepare("SELECT * FROM roles WHERE name=:name");
    $query->bindParam(":name", $name);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function name() {
    return $this->sqlData['name'];
  }

  public function image() {
    return $this->sqlData['image'];
  }

  public function id() {
    return $this->sqlData['id'];
  }

}
