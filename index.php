<?php
header("Access-Control-Allow-Origin: *");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set("America/Los_Angeles");

$year = date("Y");

$payDays = '';

for($i=1;$i<29;$i++) {
	$payDays .= "<option value=\"{$i}\">{$i}</option>\n\t";
}
	
?>

<!DOCTYPE html>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="/favicon.ico">

      <title>PandaDoc Sample App - PHP</title>

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- App-specific styles -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <link href="css/modern-business.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">

	  <!--jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- FontAwesome -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">
		  <svg width="100" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 30" class="logo ">
			  <title>PandaDoc</title>
			  <g class="logo__symbol">
				  <path fill="#f2be5a" d="M0 0h30v30H0z"></path>
				  <path fill="#3886f4" d="M0 0h30v15H0z"></path>
			  </g>
			  <path class="logo__box" d="m21.996 10.988-.076.038a3.854 3.854 0 0 0-2.533-.875 4.396 4.396 0 0 0-3.442 1.483l1.286 1.37a3.058 3.058 0 0 1 2.193-.951 2.748 2.748 0 0 1 2.685 2.966 2.763 2.763 0 0 1-2.76 2.966c-4.16 0-2.988-7.834-8.584-7.834A4.663 4.663 0 0 0 6 15.019V23.5h2.004v-4.526l.076-.038a3.854 3.854 0 0 0 2.533.875 4.396 4.396 0 0 0 3.442-1.483l-1.286-1.37a3.058 3.058 0 0 1-2.193.951 2.748 2.748 0 0 1-2.685-2.966 2.763 2.763 0 0 1 2.76-2.966c4.16 0 2.988 7.834 8.584 7.834A4.663 4.663 0 0 0 24 14.943V6.5h-2.004Z" fill="#fff" fill-rule="evenodd"></path>
			  <path class="logo__text hide-mobile" d="M77.208 7v5.713a3.434 3.434 0 0 0-2.86-1.328 4.579 4.579 0 0 0-4.554 4.787 4.579 4.579 0 0 0 4.553 4.788 3.49 3.49 0 0 0 2.861-1.328v1.087h2.015V7Zm-5.4 9.172a2.747 2.747 0 1 0 5.48 0 2.747 2.747 0 1 0-5.48 0Zm-31.632-.643v5.19H38V7.402h5.198c3.103 0 4.755 1.57 4.755 4.064s-1.652 4.063-4.755 4.063Zm0-6.115v4.023h2.982c1.733 0 2.539-.644 2.539-2.012s-.806-2.011-2.54-2.011Zm17.65 11.304h-2.015v-1.086a3.49 3.49 0 0 1-2.861 1.328 4.579 4.579 0 0 1-4.553-4.787 4.579 4.579 0 0 1 4.553-4.788 3.434 3.434 0 0 1 2.861 1.328v-1.087h2.015Zm-4.674-1.609a2.74 2.74 0 0 1-2.74-2.937 2.747 2.747 0 1 1 5.48 0 2.72 2.72 0 0 1-2.74 2.937Zm15.353-4.103v5.753H66.49v-5.11c0-1.528-.806-2.373-2.136-2.373a2.27 2.27 0 0 0-2.378 2.414v5.069h-2.014v-9.133h1.974v1.127a3.218 3.218 0 0 1 2.82-1.368 3.52 3.52 0 0 1 3.748 3.62Zm19.664 5.712h2.015v-9.092H88.17v1.087a3.435 3.435 0 0 0-2.861-1.328 4.579 4.579 0 0 0-4.553 4.787 4.579 4.579 0 0 0 4.553 4.788 3.49 3.49 0 0 0 2.861-1.328Zm-5.4-4.546a2.747 2.747 0 1 0 5.48 0 2.747 2.747 0 1 0-5.48 0Zm21.922-2.091c0-4.023-2.741-6.679-6.931-6.679h-5.32V20.76h5.32c4.19 0 6.931-2.656 6.931-6.678ZM94.616 9.454v9.253h3.144c3.143 0 4.674-1.931 4.674-4.627 0-2.735-1.53-4.626-4.674-4.626Zm16.038 11.506a4.789 4.789 0 1 0-4.916-4.787 4.733 4.733 0 0 0 4.916 4.787Zm-2.861-4.787a2.862 2.862 0 1 0 5.723 0 2.862 2.862 0 1 0-5.723 0ZM123.67 14.2l1.29-1.367a4.176 4.176 0 0 0-3.385-1.408 4.586 4.586 0 0 0-4.795 4.787A4.586 4.586 0 0 0 121.575 21 4.42 4.42 0 0 0 125 19.552l-1.249-1.368a3.313 3.313 0 0 1-2.257.965 2.736 2.736 0 0 1-2.7-2.936 2.736 2.736 0 0 1 2.7-2.937 3.058 3.058 0 0 1 2.176.925Z" fill="#111" fill-rule="evenodd"></path>
		  </svg>
            <div>
              <strong>Loanifier</strong> Sample App for PHP
            </div>
          </a>
        </div>
      </div>
    </nav>

    <div class="container">
      
      <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
          
          <h2 class="text-center">
            Your Loan Application
          </h2>

          <hr />

          <form id="theForm" data-toggle="validator" method="POST" action="app.php">
            
            <div class="form-group">
              <label for="nameFirst">First Name</label>
              <input type="text" class="form-control" id="nameFirst" name="nameFirst" placeholder="John" required value="">
            </div>

            <div class="form-group">
              <label for="nameLast">Last Name</label>
              <input type="text" class="form-control" id="nameLast" name="nameLast" placeholder="Doe" required value=""><script src="lib/app.js"></script>
            </div>
            
            <div class="form-group">
              <label for="emailAddress">Email Address</label>
              <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="me@example.com" required value="">
            </div>

            <div class="form-group">
              <label for="streetAddress">Street Address</label>
              <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="123 My St., MyTown, ST 12345" required value="">
            </div>

            <div class="form-group">
              <label for="loanAmount">Loan Amount</label>
              <input type="text" class="form-control" id="loanAmount" name="loanAmount" placeholder="1000 (No commas or currency marks)" required value="">
            </div>

            <div class="form-group">
              <label for="inputState">Pay On This Day of the Month</label>
              <select class="form-control" id="payDay" name="payDay" required>
               <?php echo $payDays; ?>
              </select>
            </div>

            <hr/>
            
            <div class="row">
              <div class="col-sm-12 text-center">
                <button type="submit" id="subBtn" class="btn btn-success has-spinner">
                  Submit Application
                  <span class="spinner"><i class="fa fa-spinner fa-spin icon-spin"></i></span>
                </button>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 text-center">
				  <div id="respMsg"></div>
              </div>
            </div>

          </form>
          
        </div><!--/col-sm-5-->
		
    </div> <!--/row-->
	
    <footer>
		<div class="col-sm-5 col-sm-offset-1">
			<p class="text-center">&copy; <?php echo $year; ?> PandaDoc Inc.</p>
		</div>
    </footer>
	
</div> <!--/container-->

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!--jQuery Validator -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<!-- This App -->
    <script type="text/javascript" src="lib/app.js"></script>
  
  </body>
</html>
