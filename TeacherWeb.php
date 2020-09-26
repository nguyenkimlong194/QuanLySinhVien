<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
	<link rel="stylesheet" href="assets/css/Teacher.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				QUẢN LÝ THÔNG TIN SINH VIÊN

			</div>
			<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="title ">STT</th>
							<th class="title ">Họ</th>
                                                        <th class="title ">Tên</th>
							<th class="title ">Tuổi</th>
							<th class="title ">Địa chỉ</th>
                                                        <th class ="title" width="60px"></th>
							<th class ="title" width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from student where fname like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from student';
}

$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['fname'].'</td>
                        <td>'.$std['lname'].'</td>
			<td>'.$std['age'].'</td>
			<td>'.$std['address'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('input.php', '_self')">Add Student</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteStudent(id) {
			option = confirm('Bạn có muốn xoá sinh viên này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_student.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>