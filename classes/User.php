<?php
include_once "./classes/Role.php";
include_once "./classes/Hire.php";

class User {
    private $cn, $sqlData;

    public function __construct($cn, $email) {
        $this->cn = $cn;

        $query = $this->cn->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam(":email", $email);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users WHERE id=:id");
      $query->bindParam(":id", $id);
      $query->execute();

      $sqlData = $query->fetch(PDO::FETCH_ASSOC);
      return new User($cn, $sqlData['email']);
    }

    public static function userLoggedIn() {
        return isset($_SESSION['email']); // return bool
    }

    public static function usersByRole($id) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users where designation=:designation");
      $query->bindParam(":designation", $id);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providerByCityAndPincode($city, $pincode) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users 
        where city=:city 
        and pincode=:pincode
        and role_name!='admin'
        ");
      $query->bindParam(":city", $city);
      $query->bindParam(":pincode", $pincode);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providerByCityAndPincodeAndId($city, $pincode, $provider_id) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users where city=:city and pincode=:pincode and role_name!='admin' and designation=:designation");
      $query->bindParam(":city", $city);
      $query->bindParam(":pincode", $pincode);
      $query->bindParam(":designation", $provider_id);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providersByCity($city) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users where city=:city and role_name!='admin'");
      $query->bindParam(":city", $city);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providersByCityAndId($city, $provider_id) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users where city=:city and designation=:designation and role_name!='admin'");
      $query->bindParam(":city", $city);
      $query->bindParam(":designation", $provider_id);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providersByPincode($pincode) {
      global $cn;
      $query = $cn->prepare("SELECT * FROM users where pincode=:pincode and role_name!='admin'");
      $query->bindParam(":pincode", $pincode);
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function findByDesignation($designation) {
      global $cn;

      $query = $cn->prepare("SELECT id FROM roles WHERE name LIKE '%$designation%'");
      $query->execute();

      $sqlData = $query->fetch(PDO::FETCH_ASSOC);
      $array = array();

      if(count($sqlData) === 0)
        return $array;

      $query = $cn->prepare("SELECT * FROM users WHERE designation=:designation");
      $query->bindParam(":designation", $sqlData['id']);
      $query->execute();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }

      return $array;
    }

    public static function users() {
      global $cn;

      $query = $cn->prepare("SELECT * FROM users WHERE role_name='User'");
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $array[] = new User($cn, $row['email']);
      }
      return $array;
    }

    public static function providers() {
      global $cn;

      $query = $cn->prepare("SELECT * FROM users WHERE role_name='Worker'");
      $query->execute();

      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $array[] = new User($cn, $row['email']);
      }

      return $array;
    }

    public static function deleteById($id) {
      global $cn;

      $query = $cn->prepare("DELETE FROM users WHERE id=:id");
      $query->bindParam(":id", $id);
      $query->execute();
      return true;
    }

    public function getAnalyticData() {
      $query = $this->cn->prepare(
        "SELECT COUNT(*) AS total, DATE_FORMAT(date, '%b, %Y') AS date 
        FROM hires 
        where provider_id=:id 
        GROUP BY YEAR(date), MONTH(date) ASC"
      );
      $query->bindParam(":id", $this->sqlData['id']);
      $query->execute();
      return $query->fetchAll();
    }

    public function compeletedJobsAnalytic() {
      $query = $this->cn->prepare(
        "SELECT COUNT(*) AS total, DATE_FORMAT(date, '%b, %Y') AS date 
        FROM hires 
        WHERE provider_id=:id 
        AND done=true
        GROUP BY YEAR(date), MONTH(date) ASC"
      );
      $query->bindParam(":id", $this->sqlData['id']);
      $query->execute();
      return $query->fetchAll();
    }

    public function pendingJobsAnalytic() {
      $query = $this->cn->prepare(
        "SELECT COUNT(*) AS total, DATE_FORMAT(date, '%b, %Y') AS date 
        FROM hires 
        WHERE provider_id=:id 
        AND done=false
        GROUP BY YEAR(date), MONTH(date) ASC"
      );
      $query->bindParam(":id", $this->sqlData['id']);
      $query->execute();
      return $query->fetchAll();
    }

    public function id() {
      return $this->sqlData['id'];
    }

    public function name() {
      return $this->sqlData['name'];
    }

    public function email() {
      return $this->sqlData['email'];
    }

    public function mobile() {
      return $this->sqlData['mobile'];
    }

    public function getProfileImage() {
      return $this->sqlData['profile'];
    }

    public function isProvider() {
      return ($this->sqlData['designation'] !== -1 && $this->sqlData['role_name'] === "Worker") ? true : false;
    }

    public function isAdmin() {
      return ($this->sqlData['designation'] !== -1 && $this->sqlData['role_name'] === "admin") ? true : false;
    }

    public function providerName() {
      return Role::findById($this->sqlData['designation'])->name();
    }

    public function getJoinData() {
      return date("F jS Y", strtotime($this->sqlData['created_at']));
    }

    public function city() {
      return $this->sqlData['city'];
    }

    public function pincode() {
      return $this->sqlData['pincode'];
    }

    public function address() {
      return $this->sqlData['address'];
    }

    public function rating() {
      $query = $this->cn->prepare("SELECT 
        MAX(star) AS stars, COUNT(*) AS rating FROM hires WHERE provider_id=:provider_id
        GROUP BY star, provider_id");
      $query->bindParam(":provider_id", $this->sqlData['id']);

      $query->execute();
      $array = array();

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $array[] = $row;
      }

      if(count($array) === 0) return 0;

      $cnt = 0;

      for ($i=0; $i < count($array); $i++) { 
        $cnt += $array[$i]['rating'];
      }

      $avgStar = ceil($cnt / 6);

      $max = 0;
      $position = 0;

      for ($i=0; $i < count($array); $i++) { 
        if($array[$i]['rating'] >= $max) {
          $max = $array[$i]['rating'];
          $position = $i;
        }
        
      }
      return ($array[$position]['stars'] == 0) ? $avgStar : $array[$position]['stars'];
      // return $array[$position]['stars'];
    }
    
}

?>



<!-- SELECT MAX(star), provider_id, COUNT(*) FROM hires WHERE provider_id = 56 GROUP BY star, provider_id -->