<?php
require_once "./includes/header.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";

$user = new User($cn, $_SESSION['email']);

// if(isset($_GET['id'])) {
//   User::deleteById($_GET['id']);
//   unset($_GET['id']);
//   header('Location: admin-users.php');
// }

require_once "./includes/navbar.php";
?>


<div class="main-container">
  <div class="container">
    <div class="row card m-4 p-3">
      <div class="col-md-12">
        <h1 class="mb-5">Total hirings</h1>
      </div>  
      <div class="card-body table-responsive">
        <table table-responsive>
          <thead>
            <tr>
              <th class="th-sm">#</th>
              <th class="th-sm">User Name</th>
              <th class="th-sm">Provider Name</th>
              <th class="th-sm">Status</th>
              <th class="th-sm">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $cnt = 1;
              foreach(Hire::all() as $item) {  
                $status = $item->status() ? "Completed" : "Pending";
                echo "<tr>
                <th scope='row'>". $cnt++ ."</th>
                  <td>". $item->user()->name() ."</td>
                  <td>". $item->provider()->name() ."</td>
                  <td>". $status ."</td>
                  <td>". $item->date() ."</td>
                </tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <th class="th-sm">#</th>
            <th class="th-sm">User Name</th>
            <th class="th-sm">Provider Name</th>
            <th class="th-sm">Status</th>
            <th class="th-sm">Date</th>
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
<?php require_once "./includes/footer.php";?>

