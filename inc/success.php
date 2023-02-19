<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Success!</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="text-center mx-auto mt-3 mb-3" style="max-width: 18rem;">
				<div class="alert alert-success" role="alert">
					<strong>Success!</strong> Data were successfully submitted.
				</div>
				<div class="card border-danger text-danger mb-3">
					<div class="card-body">
						<h3 class="card-title"><strong>One more thing!</strong></h3>
						<p class="card-text">After you see the <strong>Success</strong> alert, you need to do one more thing.</p>
						<p>When you'll see that the machine got the parameters and started to running. You have to press the following button below for double-check. It's a very <strong>important</strong> task to complete</p>
						<button type="button" onclick="zero();" class="btn btn-lg btn-block btn-outline-danger">The machine is running</button>
					</div>
				</div>
				<div class="alert alert-success" role="alert" id="fix" hidden="hidden">
					<strong>Success!</strong> Now you can <a href="../index.html" class="alert-link">Go Back</a>.
				</div>
			</div>
		</div>

		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script>
			function zero() {
				$.ajax({
					type:"POST",
					cache:false,
					url:"extend.php",
					data:{zero:"ok"},
					success: function (html) {
						$("#fix").removeAttr("hidden");
					}
				});
			}
		</script>
	</body>
</html>