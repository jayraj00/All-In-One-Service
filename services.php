<?php

use function PHPSTORM_META\type;

require_once "./includes/header.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";

$user = new User($cn, $_SESSION['email']);


if(isset($_GET['star']) && isset($_GET['hire'])) {
  if(Hire::giveStar($_GET['hire'], $_GET['star'])) {
    header('Location: services.php');
  }
}


require_once "./includes/navbar.php";
?>

<style>
  div.stars {
    width: 270px;
    display: inline-block;
  }

  input.star { display: none; }

  label.star {
    float: right;
    padding: 10px;
    font-size: 36px;
    color: #445;
    transition: all .2s;
  }

  input.star:checked ~ label.star:before {
    content: '\2605';
    color: #FD4;
    transition: all .25s;
  }

  input.star-5:checked ~ label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
  }

  input.star-1:checked ~ label.star:before { color: #F62; }

  label.star:hover { transform: rotate(-15deg) scale(1.3); }

  label.star:before {
    content: '\2605';
  }
</style>

<div class="main-container">
  <div class="container">
    <div class="row card m-4 p-3">
      <div class="col-md-12">
        <h1 class="mb-5">Your hirings</h1>
      </div>  
      <div class="card-body table-responsive">
        <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">#</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Email</th>
              <th class="th-sm">Mobile</th>
              <th class="th-sm">Address</th>
              <th class="th-sm">City</th>
              <th class="th-sm">Service date</th>
              <th class="th-sm">Stars</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $cnt = 1;
              foreach(Hire::userHiring($user->id()) as $item) {  
                $star = "";

                if((int)$item->star() !== 0) {
                  for ($i=0; $i < (int)$item->star(); $i++) {
                    $star .= "<i class='fa text-warning fa-star'></i>";
                  }
                  for ($j=$i; $i < 5; $i++) { 
                    $star .= "<i class='fa text-light fa-star'></i>";
                  }

                } else {
                  if(strtotime($item->date()) < time()) {
                    // enable
                    $star = "<button
                      class='btn btn-sm rounded-pill mt-0 btn-primary rate-me-btn'
                      data-toggle='modal' data-target='#rateMe'
                      id='" . $item->id() . "'
                      >Give Rate</button>";
                  } else {
                    // disable star
                    $star = "<button
                      disabled
                      class='btn btn-sm rounded-pill mt-0 btn-primary rate-me-btn'
                      data-toggle='modal' data-target='#rateMe'
                      id='" . $item->id() . "'
                      >Give Rate</button>";
                  }
                }



                echo "<tr>
                <th scope='row'>". $cnt++ ."</th>
                  <td>". $item->provider()->name() ."</td>
                  <td>". $item->provider()->email() ."</td>
                  <td>". $item->provider()->mobile() ."</td>
                  <td style='max-width: 600px; text-align: justify'>". $item->provider()->address() ."</td>
                  <td>". $item->provider()->city() ."</td>
                  <td class='text-primary font-weight-bold'>". $item->date() ."</td>
                  <td>
                   ". $star ."
                  </td>
                </tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <th class="th-sm">#</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Mobile</th>
            <th class="th-sm">Address</th>
            <th class="th-sm">City</th>
            <th class="th-sm">Service date</th>
            <th class="th-sm">Stars</th>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rateMe" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="rateMeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rateMeLabel">Give a rate to the provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="stars">
          <form class="p-0 m-0">
            <input class="star star-5" id="star-5" type="radio" name="star"/>
            <label onclick="ratingForm(5)" class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star"/>
            <label onclick="ratingForm(4)" class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star"/>
            <label onclick="ratingForm(3)" class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star"/>
            <label onclick="ratingForm(2)" class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star"/>
            <label onclick="ratingForm(1)" class="star star-1" for="star-1"></label>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "./includes/scripts.php";?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script>
  let hireId;
  $(document).ready(function () {
      // $('#table').dataTable();
      // $('.dataTables_length').addClass('bs-select');
      $('#table').DataTable();
      $('.dataTables_length').addClass('bs-select');
      // $('#rateMe3').mdbRate();
      $(document).on('click', '.rate-me-btn', function () {
        hireId = $(this).attr('id');
      });
  });
  function ratingForm(value) {
    window.location = `${window.location.pathname}?star=${value}&hire=${hireId}`
  }
</script>
<?php require_once "./includes/footer.php";?>

