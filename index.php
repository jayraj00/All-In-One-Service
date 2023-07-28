<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Provider</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  <!-- MDN -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  
  <link rel="stylesheet" href="./css/homeStyle.css">

  <style> 
    .autocomplete {
      position: relative;
      display: inline-block;
    }

    input {
      border: 1px solid transparent;
      background-color: #f1f1f1;
      padding: 10px;
      font-size: 16px;
    }

    input[type=text] {
      background-color: #f1f1f1;
      width: 100%;
    }

    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      /*position the autocomplete items to be the same width as the container:*/
      top: 100%;
      left: 0;
      right: 0;
    }

    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff; 
      border-bottom: 1px solid #d4d4d4; 
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
      background-color: #e9e9e9; 
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
      background-color: DodgerBlue !important; 
      color: #ffffff; 
    }
  </style>

</head>  

<?php
require_once "./classes/Role.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";


if(User::userLoggedIn()) {
  $user = new User($cn, $_SESSION['email']);
  if($user->isProvider()) {
    header('Location: home.php');
  } else if ($user->isAdmin()) {
    header('Location: admin-users.php');
  }
}


if (isset($_GET['provider'])) {
  $role = Role::findById($_GET['provider']);
  
  if(isset($_GET['city']) && isset($_GET['pincode'])) {
    $providers = User::providerByCityAndPincodeAndId($_GET['city'], $_GET['pincode'], $_GET['provider']);
  } else if(isset($_GET['city'])) {
    $providers = User::providersByCityAndId($_GET['city'], $_GET['provider']);
  } else {
    $providers = User::usersByRole($_GET['provider']);
  }
} else {
  if(isset($_GET['city']) && isset($_GET['pincode'])) {
    $providers = User::providerByCityAndPincode($_GET['city'], $_GET['pincode']);
  } else if(isset($_GET['city'])) {
    $providers = User::providersByCity($_GET['city']);
  }
}

if (isset($_GET['search'])) {

  if(isset($_GET['city']) && isset($_GET['pincode'])) {
    $providers = User::providerByCityAndPincodeAndId($_GET['city'], $_GET['pincode'], Role::findByName($_GET['search'])['id']);
  } else if(isset($_GET['city'])) {
    $providers = User::providersByCityAndId($_GET['city'], Role::findByName($_GET['search'])['id']);
  } else {
    $providers = User::findByDesignation(($_GET['search']));
  }

}

if (isset($_POST['hireMeFormsubmit'])) {
  if(User::userLoggedIn()) {
    $date = $_POST['date'];
    $providerID = $_POST['providerId'];
    if (Hire::create($date, $providerID, $user->id())) {
        $created = true;
    }
  } else {

    echo "<script>
        alert('You are not loggedin!')
      </script>";



    // header('Location: login.php');
  }
}

?>


  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger text-dark" href="index.php">Service Provider</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <?php if(User::userLoggedIn()) { ?>
                      <li class="nav-item"><a class="nav-link text-dark font-weight-bold js-scroll-trigger" href="profile.php">Profile</a></li>
                    <?php } else { ?>
                      <li class="nav-item"><a class="nav-link text-dark font-weight-bold js-scroll-trigger" href="login.php">Log in</a></li>
                      <li class="nav-item"><a class="nav-link text-dark font-weight-bold js-scroll-trigger" href="signup.php">Sign up</a></li>
                  <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
              <div class="d-flex justify-center">
                <div class="form-group mx-2">
                  <label class="text-white h6" for="city"><i class="fa fa-md fa-location-arrow"></i> City</label>
                  <select class="form-control form-control-sm" name="city" id="city" required>
                  </select>
                </div>
                <div class="form-group mx-2">
                  <label class="text-white h6" for="pincode"><i class="fa fa-md fa-map-pin"></i> Pincode</label>
                  <select class="form-control form-control-sm" name="pincode" id="pincode" required>
                  </select>
                </div>
              </div> 
              
              <form action="" method="get" autocomplete="off" style="display:ruby-base-container">
                <div class="autocomplete">
                  <input value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>"  name="search" id="myInput" required placeholder="Search" />
                </div>
                <!-- <button class="btn btn-primary btn-sm" type="submit">Search</button> -->
                <input class="btn-primary" type="submit" value="Search">
              </form>
              
            </div>
        </div>
    </header>
   


    <div class="container">

      <div class="row">

        <div class="col-md-12 my-5">
        </div>

        <?php
          if (!isset($providers)) {
            foreach (Role::all() as $role) {
                echo "
                <div class='col-4 mb-3'>
                  <a href='?provider=" . $role->id() . "'>              
                    <div class='card align-items-center text-center justify-content-center p-2'>
                      <img src='". $role->image() ."' style='width: 10rem; height: 10rem;' class='card-img-top' alt='...'>
                      <div class='card-body'>
                        <p class='card-text'>". $role->name() ."</p>
                      </div>
                    </div>
                  </a>
                </div>
                ";
            }
          } else if(isset($providers)) {
            if(count($providers) === 0) {
              echo "<div class='col-md-12 h6 mb-5'>No provider found in this area</div>";
            }
            foreach ($providers as $provider) {
              $star = "";

              for ($i=0; $i < (int)$provider->rating(); $i++) {
                $star .= "<i class='fa text-warning fa-star'></i>";
              }
              for ($j=$i; $i < 5; $i++) { 
                $star .= "<i class='fa text-dark fa-star'></i>";
              }

              if(User::userLoggedIn()) {
                echo "
                <div class='col-md-6 col-sm-12'>
                  <div class='card mb-3'>
                    <div class='row no-gutters'>
                      <div class='col-md-4'>
                        <img src='" . $provider->getProfileImage() . "' class='card-img' alt='...'>
                      </div>
                      <div class='col-md-8'>
                        <div class='card-body'>
                          <h5 class='card-title font-weight-bold'>" . $provider->name() . "</h5>
                          <p class='card-text mb-0'>" . $star . "</p>
                          <p class='card-text mb-0'>Email: <span class='text-muted'>" . $provider->email() . "</span></p>
                          <p class='card-text mb-0'>Contact No.: <span class='text-muted'>" . $provider->mobile() . "</span></p>
                          <p class='card-text mb-0'>City: <span class='text-muted'>". $provider->city() ."</span></p>
                          <p class='card-text mb-0'>Pincode: <span class='text-muted'>". $provider->pincode() ."</span></p>
                          <p class='card-text font-weight-bold mb-0'>I'm a <span>". $provider->providerName() ."</span></p>
                          <p class='card-text d-flex justify-content-between align-items-center'>
                            <small class='text-muted'>Joined at " . $provider->getJoinData() . "</small>
                            <button
                              class='btn btn-sm rounded-pill mt-0 btn-primary hire-me-btn'
                              data-toggle='modal' data-target='#hireMe'
                              id='" . $provider->id() . "'
                              >Hire me</button>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class='card-footer'>
                      Address: <address>". $provider->address() ."</addres>
                    </div>
                  </div>
                </div>
                ";
              } else {
                echo "
                  <div class='col-md-6 col-sm-12'>
                    <div class='card mb-3'>
                      <div class='row no-gutters'>
                        <div class='col-md-4'>
                          <img src='" . $provider->getProfileImage() . "' class='card-img' alt='...'>
                        </div>
                        <div class='col-md-8'>
                          <div class='card-body'>
                            <h5 class='card-title font-weight-bold'>" . $provider->name() . "</h5>
                            <p class='card-text mb-0'>" . $star . "</p>
                            <p class='card-text mb-0'>City: <span class='text-muted'>". $provider->city() ."</span></p>
                            <p class='card-text mb-0'>Pincode: <span class='text-muted'>". $provider->pincode() ."</span></p>
                            <p class='card-text font-weight-bold mb-0'>I'm a <span>". $provider->providerName() ."</span></p>
                            <p class='card-text d-flex justify-content-between align-items-center'>
                              <small class='text-muted'>Joined at " . $provider->getJoinData() . "</small>
                              <button
                                class='btn btn-sm rounded-pill mt-0 btn-primary hire-me-btn'
                                data-toggle='modal' data-target='#hireMe'
                                id='" . $provider->id() . "'
                                >Hire me</button>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
              }

                
            }
          }
        ?>

      </div>

      <div class="modal fade" id="hireMe" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="hireMeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="hireMeLabel">Hire</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                <input type="hidden" name="providerId" id="providerIdInModal">
                <div class="form-group">
                  <label for="date" class="form-label">Hiring Date</label>
                  <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Choose date."
                    pattern="^\w+(\s+\w+)*$" required />
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Invalid Date
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary btn-sm rounded float-right" name="hireMeFormsubmit" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Your Website 2020</div></footer>

    <?php include_once "./includes/scripts.php"; ?>
    <script>
      $(document).ready(function () {
        $(document).on('click', '.hire-me-btn', function () {
          $('#providerIdInModal').val($(this).attr('id'));
          const name = $(this).parent().siblings('.font-weight-bold.card-text').find('span')[0].innerText;
          $("#hireMeLabel")[0].append(" a " + name);
        });
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

        const city = "<?php echo isset($_GET['city']) ? $_GET['city'] : ""; ?>";
        const pincode = "<?php echo isset($_GET['pincode']) ? $_GET['pincode'] : ""; ?>";
        const provider = "<?php echo isset($_GET['provider']) ? $_GET['provider'] : ""; ?>";

        setPincodes(city);

        ["Choose", "Surat", "Ahmedabad", "Vadodara"].forEach(function(item) {
          const option = document.createElement("option");
          option.value = item;
          option.selected = city == item;
          option.innerHTML = item;
          $(option).appendTo("#city");
        });

        const path =  window.location.pathname;

        $(document).on("change", "#city", function(e) {
          const city = $(this).val();
          setPincodes(city);
          const search = "<?php echo isset($_GET['search']) ? $_GET['search'] : ""; ?>";
          if(provider) {
            // set url for provider
            window.location = `index.php?provider=${provider}&city=${city}`;
          } else {
            // set url without provider
            window.location = search ? `index.php?search=${search}&city=${city}` : `index.php?city=${city}`;
          }

        });

        $(document).on("change", "#pincode", function(e) {
          const city = $("#city").val();
          const search = "<?php echo isset($_GET['search']) ? $_GET['search'] : ""; ?>";
          if(provider) {
            // set url for provider
            window.location = `index.php?provider=${provider}&city=${city}&pincode=${$(this).val()}`;
          } else {
            // set url without provider
            window.location = search ? `index.php?search=${search}&city=${city}&pincode=${$(this).val()}` : `index.php?city=${city}&pincode=${$(this).val()}`;
          }
        });

        function setPincodes (city) {
          if(city) {
            const pincodes = cityList.filter(function(item) {
              return item.city === city;
            });
            $("#pincode").empty();
            const option = document.createElement("option");
              option.innerHTML = "Choose";
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

    <script>
      function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          /*close all autocomplete lists in the document,
          except the one passed as an argument:*/
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
      }

      
      var roles = ['Plumber', 'Application Repair', 'Electrition', 'Photographer', 'Carpenter', 'Home cleaner', 'Packer & Movers', 'Painter', 'Party decorator', 'Event Manager', 'other'];

      /*initiate the autocomplete function on the "myInput" element, and pass along the roles array as possible autocomplete values:*/
      autocomplete(document.getElementById("myInput"), roles);
    </script>

<?php
if(isset($created)) {
  echo "<script>alertify.success('Your request sent successfully to the provider!');</script>";
}
?>

  </body>

</html>

