<?php
include_once "./connection/config.php";
include_once "./classes/User.php";

class Hire {
    private $cn, $sqlData;

    public function __construct($cn, $id) {
        $this->cn = $cn;

        $query = $this->cn->prepare("SELECT * FROM hires WHERE id=:id");
        $query->bindParam(":id", $id);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($date, $provider_id, $user_id) {
      global $cn;
      $query = $cn->prepare("INSERT INTO hires (date, provider_id, user_id) 
        VALUES (:date, :provider_id, :user_id)");
      $query->bindParam(":date", $date);
      $query->bindParam(":provider_id", $provider_id);
      $query->bindParam(":user_id", $user_id);
     
      $query->execute(); 
      return true;        
    }

    public static function findById($id) {
      global $cn;
      return new Hire($cn, $id);
    }

    public static function userHiring($user_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires WHERE user_id=:user_id ORDER BY id DESC");
      $query->bindParam(":user_id", $user_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public static function providerHired($provider_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires WHERE provider_id=:provider_id");
      $query->bindParam(":provider_id", $provider_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public static function completedJobs($provider_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires WHERE provider_id=:provider_id AND done=true");
      $query->bindParam(":provider_id", $provider_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }
    
    public static function uncompletedJobs($provider_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires WHERE provider_id=:provider_id AND done=false AND cancel=false");
      $query->bindParam(":provider_id", $provider_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public static function cancelledJobs($provider_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires WHERE provider_id=:provider_id AND cancel=true");
      $query->bindParam(":provider_id", $provider_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public static function todayJobs($provider_id) {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires 
        WHERE provider_id=:provider_id 
        AND DAY(date) = DAY(CURDATE()) 
        AND done=false
        AND cancel=false
        ORDER BY done");
      $query->bindParam(":provider_id", $provider_id);
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public static function markAsCancelled($id) {
      global $cn;
      $query = $cn->prepare("UPDATE hires SET cancel=true WHERE id=:id");
      $query->bindParam(":id", $id);
      $query->execute();
      return true;
    }

    public static function markAsCompelete($id) {
      global $cn;
      $query = $cn->prepare("UPDATE hires SET done=true WHERE id=:id");
      $query->bindParam(":id", $id);
      $query->execute();
      return true;
    }

    public static function giveStar($id, $star) {
      global $cn;
      $query = $cn->prepare("UPDATE hires SET star=:star WHERE id=:id");
      $query->bindParam(":star", $star);
      $query->bindParam(":id", $id);
      $query->execute();
      return true;
    }
    
    public static function all() {
      global $cn;
     
      $query = $cn->prepare("SELECT * FROM hires ORDER BY done, date");
      $query->execute();

      $array = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new Hire($cn, $row['id']);
      }
      return $array;
    }

    public function id() {
      return $this->sqlData['id'];
    }

    public function status() {
      return $this->sqlData['done'];
    }

    public function cancel() {
      return $this->sqlData['cancel'];
    }

    public function user() {
      return User::findById($this->sqlData['user_id']);
    }

    public function provider() {
      return User::findById($this->sqlData['provider_id']);
    }

    public function date() {
      return $this->sqlData['date'];
    }

    public function star() {
      return $this->sqlData['star'];
    }
}

?>