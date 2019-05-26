<?php
  session_start();
  if (isset($_SESSION['ROLE'])) {
    $name = $_SESSION['FNAME'] . " " . $_SESSION['LNAME'];
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
              Customer Search
            </div>
            <div class="col-md-6" style="text-align: right;">
              Welcome! <?php echo $name; ?>
            </div>
          </div>
        </div>
      </div>

      <div role="main" style="background-color: #e9ecef; padding-top: 10px; padding-bottom: 100px;" class="rounded">
        <div class="container" style="margin-bottom: 20px;">
          <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              
                <div class="form-group nomarg">
                    <label for="selectBy" class="nomarg">Search By:</label>
                    <select class="form-control class="nomarg"" id="selectBy" required>
                      <option value="s">Select</option>
                      <option value="an">Account Number</option>
                      <option value="cn">Customer Name</option>
                      <option value="pn">Product Name</option>
                    </select>
                  </div>
                <div class="form-group nomarg">
                  <label for="exampleInput" class="nomarg">Search Text:</label>
                  <input type="text" id="searchText" class="form-control class="nomarg"" id="exampleInputPassword1" autocomplete="off" required>
                </div>
                <button id="search" class="btn btn-primary">Search</button>
              
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
        <div class="container">
          <div id="red">
            
          </div>
        </div>
      </div>

    </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $( "#search" ).click(function() {

        var search = $("#searchText").val();
        var selectBy = $("#selectBy").val();
        if (search == "") {
          $("#red").html('<div class="alert alert-danger" role="alert">Search by and the search text must be filled! </div>');
        }
        else if(selectBy == "s"){
           $("#red").html('<div class="alert alert-danger" role="alert">Search by and the search text must be filled! </div>');
        }
        else if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            $('#red').html(xmlhttp.responseText);
          }
        }
        xmlhttp.open("GET","../includes/search.php?search="+search,true);
        xmlhttp.send();
      });
    });
  </script>

</body>
</html>
