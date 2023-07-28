<?php
require_once "./includes/header.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";

$user = new User($cn, $_SESSION['email']);

if(isset($_POST['markascompelete'])) {
  if(Hire::markAsCompelete($_POST['jobID'])) {
    $markAsCompelete = true;
  }
}

if(isset($_POST['markascancelled'])) {
  if(Hire::markAsCancelled($_POST['jobID'])) {
    $cancelAsCompelete = true;
  }
}

require_once "./includes/navbar.php";
?>


<div class="main-container">

  <div class="container">
    <div class="row card m-4 p-3">
      <div class="col-md-12">
        <h1 class="mb-5">Cancelled jobs</h1>
      </div>

      <div class="col-md-12 table-responsive">
        <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Date</th>
              <th scope="col">Address</th>
              <th scope="col">City</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              $cnt = 1;
              $data = Hire::cancelledJobs($user->id());
              foreach($data as $item) {  
                echo "<tr>
                  <th scope='row'>". $cnt++ ."</th>
                  <td>". $item->user()->name() ."</td>
                  <td>". $item->user()->email() ."</td>
                  <td>". $item->user()->mobile() ."</td>
                  <td class='font-weight-bold'>". $item->date() ."</td>
                  <td style='max-width: 600px; text-align: justify'>". $item->user()->address() ."</td>
                  <td>". $item->user()->city() ."</td>
                </tr>";
              } 
            ?>
            
          </tbody>
          <tfoot>
            <th scope="th-sm">#</th>
            <th scope="th-sm">Name</th>
            <th scope="th-sm">Email</th>
            <th scope="th-sm">Mobile</th>
            <th scope="th-sm">Date</th>
            <th scope="th-sm">Address</th>
            <th scope="th-sm">City</th>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>



<?php require_once "./includes/scripts.php";?>
<script>
  $(document).ready(function () {
      // $('#table').dataTable();
      // $('.dataTables_length').addClass('bs-select');
      $('#table').DataTable();
      $('.dataTables_length').addClass('bs-select');
  });
</script>
<?php 
require_once "./includes/footer.php"; 

if (isset($markAsCompelete)) {
  echo "<script>alertify.success('Maked as complete!');</script>";
  unset($_POST, $markAsCompelete); 
}

if (isset($cancelAsCompelete)) {
  echo "<script>alertify.error('Maked as cancelled!');</script>";
  unset($_POST, $cancelAsCompelete); 
}

?>

