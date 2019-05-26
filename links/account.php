<?php
  session_start();
  if (isset($_SESSION['ROLE'])) {
    $name = $_SESSION['FNAME'] . " " . $_SESSION['LNAME'];

    if (isset($_GET['id'])) {
      require '../includes/conn.php';

      $id = $_GET['id'];

      $sql = "SELECT * FROM customeraccounts WHERE id = '$id' LIMIT 1";

      $result = $conn->query($sql);

      if ($row = $result->num_rows > 0 ) {
        foreach ($result as $data){
          $fname = $data['customerfname'];
          $lname = $data['customerlname'];
          $email = $data['customereemail'];
          $birthday = $data['customerbirthday'];
          $ssn = $data['customerSSN'];
          $debit = $data['customerCreditDebit'];
          $occupation = $data['customerOccupation'];
          $company = $data['customerCompany'];
          $mname = $data['customerMName'];

          $_SESSION['customerFNAME'] = $fname .' '. $lname ;
          $_SESSION['customerID'] = $id;
          
          $str = $data['custumerStreet'];
          $state = $data['customerState'];
          $zipcode = $data['customerZipcode'];
          $phone = $data['customerPhone'];
          $_SESSION['phone'] = $data['customerPhone'];
        }
      }
      else{
        // Find Where to go or
        die();
      }

    }

  }
  else{
    session_unset();
    session_destroy();
    header("Location: ../");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Search · CRM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .nomarg{
        margin-top: 5px !important;
        margin-bottom: 5px !important;
      }
      .form-group{
        padding: 0px !important;
        margin: 0px !important;
      }
      label{
        display: inline !important;
      }
      .bb{
        margin-bottom: 5px;
        width: 100%;
      }
      .cc{
        display: inline-block;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
          <a class="navbar-brand" href="../"><img src="../media/img/icon.png" height="45px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
              
            </ul>
            <form class="form-inline my-2 my-md-0">
              <a href="../links/" class="btn btn-sm btn-secondary" style="margin-right: 10px;">Search</a>
              <a href="../includes/logout.php" class="btn btn-sm btn-secondary">Logout</a>
            </form>
          </div>
        </nav>

      <div class="alert alert-primary" role="alert">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              Orders > <?php if(isset($_GET['name'])){echo $_GET['name'];} ?>
            </div>
            <div class="col-md-6" style="text-align: right;">
              Welcome! <?php echo $name; ?>
            </div>
          </div>
        </div>
      </div>

      <div role="main" style="background-color: #e9ecef; padding-top: 20px; padding-bottom: 20px;" class="rounded">
        <div class="container" style="padding-left: 120px; padding-right: 120px;">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                  <label for="a">Last Name</label>
                  <input type="text" class="form-control" id="a" value="<?php echo $lname; ?>">
              </div>
              <div class="form-group">
                  <label for="b">First Name</label>
                  <input type="text" class="form-control" id="b" value="<?php echo $fname; ?>">
              </div>
              <div class="form-group">
                  <label for="c">Middle Name</label>
                  <input type="text" class="form-control" id="c" value="<?php echo $mname; ?>">
              </div>
              <div class="form-group">
                  <label for="d">Street</label>
                  <input type="text" class="form-control" id="d" value="<?php echo $str; ?>">
              </div>
              <div class="form-group">
                  <label for="e">State</label>
                  <input type="text" class="form-control" id="e" value="<?php echo $state; ?>">
              </div>
              <div class="form-group">
                  <label for="f">Zip Code</label>
                  <input type="text" class="form-control" id="f" value="<?php echo $zipcode; ?>">
              </div>
            </div>

            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                  <label for="h">Email</label>
                  <input type="text" class="form-control" id="h" value="<?php echo $email; ?>">
              </div>
              <div class="form-group">
                  <label for="i">Phone</label>
                  <input type="text" class="form-control" id="i" value="<?php echo $phone; ?>">
              </div>
              <div class="form-group">
                  <label for="j">Birthday</label>
                  <input type="text" class="form-control" id="j" value="<?php echo $birthday; ?>">
              </div>
              <div class="form-group">
                  <label for="k">SSN</label>
                  <input type="text" class="form-control" id="k" value="<?php echo $ssn; ?>">
              </div>
              <div class="form-group">
                  <label for="l">Credit/Debit Card</label>
                  <input type="text" class="form-control" id="l" value="<?php echo $debit; ?>">
              </div>
              <div class="form-group">
                  <label for="m">Occupation</label>
                  <input type="text" class="form-control" id="m" value="<?php echo $occupation; ?>">
              </div>
              <div class="form-group">
                  <label for="n">Company</label>
                  <input type="text" class="form-control" id="n" value="<?php echo $company; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card cc" style="width: 10rem;">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;"><a href="">Account</a></h5>
          <a href="#" class="bb btn btn-sm btn-primary">Update</a>
          <a href="#" class="bb btn btn-sm btn-primary">Remove</a>
        </div>
      </div>
      <div class="card cc" style="width: 10rem;">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;"><a href=<?php echo 'order.php?id='.$_GET['id']?> >Order</a></h5>
          <a href="#" class="bb btn btn-sm btn-primary">Update</a>
          <a href="#" class="bb btn btn-sm btn-primary">Remove</a>
        </div>
      </div>
    </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

  <script>
   $(document).ready(function() {
      $('input').prop("disabled", true);
    })
  </script>

</body>
</html>
