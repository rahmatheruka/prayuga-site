<!DOCTYPE html>
<html>
<head>
	<title>Prayuga - The helper for machines to understand Indonesian languages</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/icons/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/icons/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	<script type="text/javascript" src="assets/javascript/jquery.js"></script>
</head>
<body>

<!-- Fixed navbar -->
<header class="navbar navbar-expand navbar-light flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">
    <img src="assets/images/logo-color.png">
  </a>
  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
    <li class="nav-item dropdown">
      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        v0.1 Alpha
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
        <a class="dropdown-item active" href="/docs/4.0/">v0.1 Alpha</a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link p-2" href="https://github.com/twbs/bootstrap" target="_blank" rel="noopener" aria-label="GitHub">
        <i class="fa fa-github"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-2" href="https://twitter.com/getbootstrap" target="_blank" rel="noopener" aria-label="Twitter">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-2" href="https://bootstrap-slack.herokuapp.com" target="_blank" rel="noopener" aria-label="Slack">
      	<i class="fa fa-slack"></i>
      </a>
    </li>
  </ul>
</header>

<div class="container content">
	<div class="title">
		<div class="text1">Make the machine understand indonesian language</div>
		<div class="text2">Starting from sentiments, using impression technique for analyzes the wording in the sentence.</div>
	</div>
	<div class="classify-wrap">
		<div class="row">
			<div class="col"></div>
			<div class="col-8">
				<div class="form">
					
						<div class="form-group">
							<textarea id="the-text" class="form-control" rows="3" placeholder="Enter the indonesian text">kebijakan pemotongan anggaran oleh pemerintah memang akan menambah anggaran negara, sehingga negara mampu membayar utang.</textarea>
						</div>
						<button type="button" id="form-clasifiy" class="btn btn-primary">Analyze</button>
					
				</div>
				<div class="result"></div>
			</div>
			<div class="col"></div>
		</div>
	</div>
</div>

<footer>
	<div class="container">
		 <i class="fa fa-github"></i> 
		 <span>Feel free to become contrbutors, let's be friend</span>
		 <a class="btn">View Source</a>
		 <div class="clear"></div>
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/javascript/config.js"></script>
<script src="assets/javascript/script.js"></script>
</body>
</html>