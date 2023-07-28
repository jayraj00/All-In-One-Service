<?php
require_once "./includes/header.php";
require_once "./classes/Account.php";
require_once "./classes/Constant.php";


$account = new Account($cn);

if(isset($_POST['signin'])) {
    $email = FormSanitizer::snitizeFormEmail($_POST['email']);
    $password = FormSanitizer::snitizeFormPassword($_POST['password']);

    $wasSuccessful = $account->logIn($email, $password);

    if($wasSuccessful) {
        // Success
        // redirect to home.php
        $_SESSION['email'] = $email;
        header("Location:index.php");
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
        <h3 class="card-title text-center">Log in to Service Provider</h3>
        <div class="card-text">
          <form action="" method="POST">
            <?php echo $account->getError(Constants::$LOGIN_FAIL);?>
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
            </div>
            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign in</button>
            <div class="sign-up">
              Don't have an account? <a href="signup.php">Create One</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "./includes/scripts.php"; ?>

  <script>
    $(document).ready(function() {
      console.log("Hii");
    });
  </script>

<?php
include_once "./includes/footer.php";
?>