<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome to Financial website</title>

  <!-- Bootstrap core CSS -->

  <link href="./web-assets/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./web-assets/simple-sidebar.css" rel="stylesheet"> 

  <link rel="stylesheet" href="./web-assets/app.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Financial Application</b></div>
      <div class="list-group list-group-flush">
        <a href="/index.php" class="list-group-item list-group-item-action bg-light">All Certificates</a>
        <a href="index.php?action=certificate-add-show" class="list-group-item list-group-item-action bg-light">Add new certificate</a>
        <!--<a href="#" class="list-group-item list-group-item-action bg-light">Contact details</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>-->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>


      <div class="container-fluid">
        <h3 class="mt-4">Show certificate HTML</h3><hr/>       
        <form method="post" action="/index.php?action=certificate-edit-process">
         <input type="hidden" id="certificate_id" name="certificate_id" value="<?php echo $certificate->id; ?>">
         <input type="hidden" id="version" name="version" value="<?php echo $certificate->version; ?>"> 
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="isin"><b>ISIN:</b> </label>
            <span><?php echo $certificate->isin; ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="market"><b>Trading market:</b> </label>
            <span><?php echo $certificate->trading_market; ?></span>
          </div>
        </div>
    
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="currency"><b>Currency: </b></label>
            <span><?php echo $certificate->currency; ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="issuer"><b>Issuer: </b></label>
            <span><?php echo $certificate->issuer; ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="issuing_price"><b>Issuing price: </b></label>
            <span><?php echo $certificate->issuing_price+0; ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="current_price"><b>Current price</b></label>
            <span><?php echo $certificate->current_price+0; ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="level"><b>Bonus barrier Level : </b></label>
            <span><?php echo $certificate->barrier_level; ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="rate"><b>Guanrantee Particiation Rate : </b></label>
            <span><?php echo $certificate->participation_rate; ?></span>
          </div>
        </div>

      </form>
     </div>
    <!-- /#page-content-wrapper -->

  </div>

  <!-- Bootstrap core JavaScript -->
  
  <script src="./web-assets/jquery.min.js"></script>
  <script src="./web-assets/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

  </script>

            </div>
</div>

</div></body></html>