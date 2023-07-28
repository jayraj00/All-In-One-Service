<?php
require_once "./includes/header.php";
require_once "./classes/Account.php";
require_once "./classes/Constant.php";
require_once "./classes/Role.php";


$account = new Account($cn);

if(isset($_POST['signup'])) {
    $name = FormSanitizer::snitizeFormString($_POST['name']);
    $email = FormSanitizer::snitizeFormEmail($_POST['email']);
    $mobile = FormSanitizer::snitizeFormString($_POST['mobile']);
    $role = FormSanitizer::snitizeFormString($_POST['role']);
    $city = FormSanitizer::snitizeFormString($_POST['city']);
    $pincode = FormSanitizer::snitizeFormString($_POST['pincode']);
    $address = $_POST['address'];
    $designation = FormSanitizer::snitizeFormString($_POST['designation']);
    $password = FormSanitizer::snitizeFormPassword($_POST['password']);
    $confirmPassword = FormSanitizer::snitizeFormPassword($_POST['confirmPassword']);

    // die($address);

    $wasSuccessful = $account->register($name, $email, $mobile, $role, $designation, $password, $confirmPassword, $city, $pincode, $address);

    if($wasSuccessful) {
        // Success
        // redirect to login.php       
        $_SESSION['email'] = $email;
        header("Location:login.php");
    }
}

function getInputedData($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>


  <div class="login-container">
    <div class="card login-form">
      <div class="card-body shadow-lg">
        <h3 class="card-title text-center">Sign up to Service Provider</h3>
          <form action="" method="POST">
        <div class="row">
            <div class="col-md-4">
              <div class="form-group mb-2">
                <label for="name">Full Name</label>
                <input 
                  type="text" 
                  name="name" 
                  id="name"
                  class="form-control form-control-sm" 
                  value="<?php getInputedData('name');?>" 
                  placeholder="Full Name" 
                  autocomplete="off" 
                  required>
                <?php echo $account->getError(Constants::$FIRST_NAME_CHARACHER);?>
                <?php echo $account->getError(Constants::$FIRST_NAME_ONLY_CHARACHER);?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-2">
                <label for="email">Email</label>
                <input
                  name="email" 
                  id="email"
                  type="email"
                  class="form-control form-control-sm" 
                  value="<?php getInputedData('email');?>" 
                  placeholder="Email" 
                  autocomplete="off" 
                  required>
                <?php echo $account->getError(Constants::$EMAIL_INVALID);?>
                <?php echo $account->getError(Constants::$EMAIL_TAKEN);?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-2">
                <label for="mobile">Mobile Number</label>
                <input
                  name="mobile" 
                  id="mobile"
                  type="tel"
                  minlength="10"
                  maxlength="10"
                  class="form-control form-control-sm" 
                  value="<?php getInputedData('mobile');?>" 
                  placeholder="Mobile Number" 
                  autocomplete="off" 
                  required>
                <?php echo $account->getError(Constants::$MOBILE_INVALID);?>
                <?php echo $account->getError(Constants::$MOBILE_TAKEN);?>
              </div>   
            </div>
            
            <div class="col-md-12">
              <div class="form-group mb-2">
                <label for="mobile">Address</label>
                <textarea
                  name="address" 
                  id="address"
                  minlength="10"
                  class="form-control form-control-sm" 
                  placeholder="Address" 
                  autocomplete="off" 
                  required><?php echo getInputedData('address');?></textarea>
              </div>   
            </div>

            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="city">City</label>
                <select class="form-control form-control-sm" name="city" id="city" required>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="pincode">Pincode</label>
                <select class="form-control form-control-sm" name="pincode" id="pincode" required>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="role">Registration as a</label>
                <select class="form-control form-control-sm" name="role" id="role">
                  <option value="user" selected>User</option>
                  <option value="worker">Worker</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div id="designationDropdown" class="form-group mb-2">
                <label for="designation">Designation</label>
                <select class="form-control form-control-sm" name="designation" id="designation">
                  <option value="-1">Choose Designation</option>
                  <?php
                    foreach (Role::all() as $role) {
                      echo "<option value='". $role->id() ."'>" . $role->name() . "</option>";
                    }
                  ?>
                </select>
              </div>
            </div>            

            <div class="form-group mb-2">
              <label for="password">Password</label>
              <input
                name="password" 
                id="password"
                type="password"
                class="form-control form-control-sm" 
                value="<?php getInputedData('password');?>" 
                placeholder="Password" 
                autocomplete="off" 
                required>
                <?php echo $account->getError(Constants::$PASSWORD_CHARACHER);?>
                <?php echo $account->getError(Constants::$PASSWORD_NOT_MATCH);?>
            </div>
            
            <div class="form-group mb-2">
              <label for="confirmPassword">Confirm Password</label>
              <input
                name="confirmPassword" 
                id="confirmPassword"
                type="password"
                class="form-control form-control-sm" 
                value="<?php getInputedData('confirmPassword');?>" 
                placeholder="Confirm Password" 
                autocomplete="off" 
                required>
            </div>
           
            <div class="col-md-12">
              <button type="submit" name="signup" class="btn btn-primary btn-block">Sign up</button>
            </div>

            <div class="sign-up">
              Already have an account? <a href="login.php">login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "./includes/scripts.php"; ?>

  <script>

    $(document).ready(function() {
      const cityList = [
        {city: "Surat", pincode: 394690},
        {city: "Surat", pincode: 394376},
        {city: "Surat", pincode: 394335},
        {city: "Surat", pincode: 394310},
        {city: "Ahmedabad", pincode: 380015},
        {city: "Ahmedabad", pincode: 380058},
        {city: "Ahmedabad", pincode: 380053},
        {city: "Ahmedabad", pincode: 380055},
        {city: "Vadodara", pincode: 390007},
        {city: "Vadodara", pincode: 391135},
        {city: "Vadodara", pincode: 391110},
        {city: "Vadodara", pincode: 390014},
      ];

      ["Surat", "Ahmedabad", "Vadodara"].forEach(function(item) {
          const option = document.createElement("option");
          option.value = item;
          option.innerHTML = item;
          $(option).appendTo("#city");
        });
        setPincodes("Surat");

        $(document).on("change", "#city", function(e) {
          const city = $(this).val();
          setPincodes(city);
        });

        function setPincodes (city) {
          const pincodes = cityList.filter(function(item) {
            return item.city === city;
          });
          $("#pincode").empty();
          pincodes.forEach(function(item){
            const option = document.createElement("option");
            option.value = item.pincode;
            option.innerHTML = item.pincode;
            $(option).appendTo("#pincode");
          });
        }
      
      $("#designationDropdown").hide();
      
      $(document).on("change", "#role", function(e) {
        if($(this).val() === "user") {
          $("#designationDropdown").fadeOut(500);
        } else {
          $("#designationDropdown").fadeIn(500);
        }
      });

    });

  </script>

<?php
include_once "./includes/footer.php";
?>
