<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>404</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="/font-awesome-4.6.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=vietnamese" rel="stylesheet">
	<style>
		#error-page{
  margin-top: 10%;
}
.error-code{
  font-size: 180px;
  line-height: 180px;
  color: #f5acac;
  text-shadow: 0 1px #944040;
  float: right;
}
.error-message{
  font-size: 24px;
  line-height: 24px;
  text-transform: uppercase;
  color: #999;
  text-shadow: 0 1px #fff;
  margin-right: 10px;
  float: right;
}
#error-img img{
  width: 80%;
  height: 80%;
}
	</style>
</head>
<body style="background: #f5f5f5">
	<div class="container" id="error-page">
		<div class="row">
			<div class="col-6">
				<h1 class="error-code">404</h1>
				<p class="error-message">
					Không tìm thấy trang<br />
					Go Back <a href="/index.html" title="Home"><i class="fa fa-home"></i> Home</a>
				</p>
			</div>
			<div class="col-6" id="error-img">
				<img src="/images/404-error.png" alt="404" >
			</div>
		</div>
	</div>
</body>
</html>