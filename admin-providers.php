<?php
require_once "./includes/header.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";

$user = new User($cn, $_SESSION['email']);

if(isset($_GET['id'])) {
  User::deleteById($_GET['id']);
  unset($_GET['id']);
  header('Location: admin-providers.php');
}


require_once "./includes/navbar.php";
?>


<div class="main-container">
  <div class="container">
    <div class="row card m-4 p-3">
      <div class="col-md-12">
        <h1 class="mb-5">Providers</h1>
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
              <th class="th-sm">Pincode</th>
              <th class="th-sm">Joined Date</th>
              <th class="th-sm">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $cnt = 1;
              foreach(User::providers() as $item) {  
                $actions = '
                  <a href="?id='. $item->id() .'" class="p-0 mx-2 my-0"><i class="fa fa-lg fa-trash text-danger"></i></a>
                  <a href="update.php?id='. $item->id() .'" class="my-0 mx-2 p-0"><i class="fa fa-lg fa-edit text-warning"></i></a>
                ';
                echo "<tr>
                <th scope='row'>". $cnt++ ."</th>
                  <td>". $item->name() ."</td>
                  <td>". $item->email() ."</td>
                  <td>". $item->mobile() ."</td>
                  <td style='max-width: 600px; text-align: justify'>". $item->address() ."</td>
                  <td>". $item->city() ."</td>
                  <td>". $item->pincode() ."</td>
                  <td>". $item->getJoinData() ."</td>
                  <td>". $actions ."</td>
                </tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>City</th>
            <th>Pincode</th>
            <th>Joined Date</th>
            <th>Actions</th>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once "./includes/scripts.php" ?>

<script>
  $(document).ready(function () {
    $('#table').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<?php require_once "./includes/footer.php";?>

