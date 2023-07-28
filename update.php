<?php
require_once "./includes/header.php";
require_once "./classes/Account.php";
require_once "./classes/Constant.php";
require_once "./classes/User.php";

$account = new Account($cn);
$userData = User::findById($_GET['id']);

// print_r($user);
// die("okay");

if(isset($_POST['updateProfile'])) {
  $name = FormSanitizer::snitizeFormString($_POST['name']);
  $mobile = FormSanitizer::snitizeFormString($_POST['mobile']);
  $city = FormSanitizer::snitizeFormString($_POST['city']);
  $pincode = FormSanitizer::snitizeFormString($_POST['pincode']);
  $address = $_POST['address'];

  if($account->updateDetails($name, $mobile, $userData->email(), $city, $pincode, $address)) {
      // echo "<script>alert('Details Update Successfully');</script>";
      $updated = true;
      
  }
}

if(isset($_POST['updatePassword'])) {
    $newpassword = FormSanitizer::snitizeFormPassword($_POST['newPassword']);
    if(Account::changePasswordById($newpassword, $userData->id())) {
      echo "<script>alert('Password Update Successfully');</script>";
    }
}

function getInputedData($name) {
  global $userData;
  if(isset($_POST[$name])) {
    echo $_POST[$name];
  } else {
    $instanceMethod = $name;
    echo $userData->$instanceMethod();
  }
}

require_once "./includes/navbar.php"; 
?>

  <div class="main-container">
    
      <div class="container">
        <div class="card m-4 p-3">
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <h3 class="card-title text-center">Update Profile</h3>
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group mb-2">
                      <label for="name">Full Name</label>
                      <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control form-control-sm" 
                        value="<?php getInputedData('name')?>" 
                        placeholder="Full Name" 
                        autocomplete="off" 
                        required>
                      <?php echo $account->getError(Constants::$FIRST_NAME_CHARACHER);?>
                      <?php echo $account->getError(Constants::$FIRST_NAME_ONLY_CHARACHER);?>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group mb-2">
                      <label for="email">Email</label>
                      <input
                        name="email" 
                        id="email"
                        type="email"
                        disabled
                        class="form-control form-control-sm" 
                        value="<?php getInputedData('email');?>" 
                        placeholder="Email" 
                        autocomplete="off" 
                        required>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
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

                  <div class="text-right">
                    <button type="submit" name="updateProfile" class="btn btn-md btn-primary">Update</button>
                  </div>
                </div>

              </form>
            </div> 
            <div class="col-md-4 col-sm-12">
              <h3 class="card-title text-center">Change Password</h3>
              <form action="" method="post">
                <div class="row">
                  <div class="form-group mb-2">
                    <label for="newPassword">New Password</label>
                    <input
                      name="newPassword" 
                      id="newPassword"
                      type="password"
                      class="form-control form-control-sm"
                      placeholder="New Password" 
                      autocomplete="off" 
                      required>
                  </div>
                  <div class="text-right">
                    <button type="submit" name="updatePassword" class="btn btn-md btn-primary">Change Password</button>
                  </div>        
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
  </div>
  <?php include_once "./includes/scripts.php"; ?>

<script>
   function fileValidation() {
    var fileInput = document.getElementById('avatar');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('Please upload file having extensions .jpeg, .jpg, .png, .gif only.');
      fileInput.value = '';
      return false;
    } else {
      //Image preview
      if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" class="img img-fluid avatar"/>';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }

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

      const city = "<?php echo getInputedData('city'); ?>";
      const pincode = "<?php echo getInputedData('pincode'); ?>";

      setPincodes(city);

      ["Surat", "Ahmedabad", "Vadodara"].forEach(function(item) {
        const option = document.createElement("option");
        option.value = item;
        option.selected = city == item;
        option.innerHTML = item;
        $(option).appendTo("#city");
      });

      $(document).on("change", "#city", function(e) {
        const city = $(this).val();
        setPincodes(city);
      });

      function setPincodes (city) {
        if(city) {
          const pincodes = cityList.filter(function(item) {
            return item.city === city;
          });
          $("#pincode").empty();
          const option = document.createElement("option");
          $(option).appendTo("#pincode");
          pincodes.forEach(function(item){
            const option = document.createElement("option");
            option.value = item.pincode;
            option.selected = pincode == item.pincode;
            option.innerHTML = item.pincode;
            $(option).appendTo("#pincode");
          });
        }
      }

    });

</script>

<?php require_once "./includes/footer.php"; ?>

<?php
if (isset($updated)) {
  echo "<script>alertify.success('Profile updated successfully!');</script>";
  unset($_POST);
}
?>