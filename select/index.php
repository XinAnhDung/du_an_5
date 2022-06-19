<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chọn chế độ</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
		button{
				margin-left:50%;
				margin-top: 50px;
		}
</style>
<body>  
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Chọn chế độ
		</button>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tùy chọn chế độ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- 0 cho phép Nhập 1 cho phép Quẹt -->
				<div class="modal-body">
					<form action="xuly_nhaptt.php" method="">
						<button name="btn_fill" class="btn btn-info">Nhập thông tin</button>
					</form>
					<!-- ../form_dang_nhap/index.php -->
					<form action="xuly_quetthe.php" method="">
						<button name="btn_fill" class="btn btn-success">Quẹt thẻ</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">	
		$(window).on('load',function(){
				$('#exampleModal').modal('show');
		});
</script>

</body>
</html>