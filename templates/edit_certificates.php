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
        <h1 class="mt-4">Edit certificate</h1>       
        <form method="post" action="/index.php?action=certificate-edit-process">
         <input type="hidden" id="certificate_id" name="certificate_id" value="<?php echo $certificate->id; ?>">
         <input type="hidden" id="version" name="version" value="<?php echo $certificate->version; ?>"> 
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="isin">ISIN</label>
            <input type="text" class="form-control" id="isin" name="isin" placeholder="Enter your ISIN" value="<?php echo $certificate->isin; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="market">Trading market</label>
            <input type="text" class="form-control" id="market" name="market" placeholder="Enter your trading market" value="<?php echo $certificate->trading_market; ?>">
          </div>
        </div>
    
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="currency">Currency</label>
            <input type="text" class="form-control" id="currency" name="currency" value="<?php echo $certificate->currency; ?>" placeholder="Enter your currency">
          </div>
          <div class="form-group col-md-6">
            <label for="issuer">Issuer</label>
            <input type="text" class="form-control" id="issuer" name="issuer" value="<?php echo $certificate->issuer; ?>" placeholder="Enter your Issuer">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="issuing_price">Issuing price</label>
            <input type="text" class="form-control" id="issuing_price" name="issuing_price" value="<?php echo $certificate->issuing_price+0; ?>" placeholder="Enter your Issuing price">
            <input type="hidden" name="db_issuing_price" value="<?php echo $certificate->issuing_price+0; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="current_price">Current price</label>
            <input type="text" class="form-control" id="current_price" name="current_price" value="<?php echo $certificate->current_price+0; ?>" placeholder="Enter your current price">
            <input type="hidden" name="db_current_price" value="<?php echo $certificate->current_price+0; ?>" >
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="issuing_price">Type</label>
            <select class="form-control" name="type" id="type">
                <option value="STANDARD">Standard</option>
                <option value="BONUS">Bonus</option>
                <option value="GUARANTEE">Guarantee</option>
            </select>
          </div>
          <div class="form-group col-md-6" id="bonus_section" style="display:none">
            <label for="bonus_barrier_level">Bonus Level</label>
            <input type="text" class="form-control" id="bonus_barrier_level" name="bonus_barrier_level" placeholder="Enter your bonus barrier level">
          </div>
          <div class="form-group col-md-6" id="guarantee_section" style="display:none">
            <label for="guarantee_participation_rate">Guanrantee Particiation Rate</label>
            <input type="text" class="form-control" id="guarantee_participation_rate" name="guarantee_participation_rate" placeholder="Enter your bonus Guanrantee Particiation Rate">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-12" >
              <button type="submit" class="btn btn-primary">Update certificate details</button>
          </div>
        </div>

      </form>
     </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script>
    function deleletconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("Contact deleted")
    }else{
        alert("Contact Not Deleted")
    }
    return del;
    }
</script>

  <!-- Bootstrap core JavaScript -->
  
  <script src="./web-assets/jquery.min.js"></script>
  <script src="./web-assets/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $("#type").change(function(e) {
      
      if(this.value == "BONUS"){
        $("#bonus_section").show();
      }

      if(this.value == "GUARANTEE"){
        $("#guarantee_section").show();
        $("#bonus_section").hide(); 
      }

      if(this.value == "STANDARD"){
        $("#bonus_section").hide(); 
        $("#guarantee_section").hide();
      }

    });
  </script>

            </div>
</div>

</div></body></html>