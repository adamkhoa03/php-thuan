	<?php
    if ($_COOKIE['admin_id'] != true) {
        header('location: login.php');
        die;
    }
    include_once('../config/connect.php');
    $sql = "SELECT * FROM students";
    $query = mysqli_query($conn, $sql);

    if ($_GET['userid']) {
        $message = verifyAccount($_GET['userid']);
    }
    ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	    <div class="row">
	        <ol class="breadcrumb">
	            <li><a href="#"><svg class="glyph stroked home">
	                        <use xlink:href="#stroked-home"></use>
	                    </svg></a></li>
	            <li class="active">Danh sách thành viên</li>
	        </ol>
	    </div><!--/.row-->

	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Danh sách thành viên</h1>
	        </div>
	    </div><!--/.row-->
	    <div class="row">
	        <div class="col-lg-12">
	            <?php if (isset($message)) {
                    echo $message;
                } ?>

	            <div class="panel panel-default">
	                <div class="panel-body">
	                    <table data-toolbar="#toolbar" data-toggle="table">

	                        <thead>
	                            <tr>
	                                <th data-field="id" data-sortable="true">ID</th>
	                                <th data-field="name" data-sortable="true">Họ & Tên</th>
	                                <th data-field="price" data-sortable="true">Email</th>
	                                <th>Quyền</th>
	                                <th>Hành động</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php
                                while ($user = mysqli_fetch_array($query)) { ?>
	                                <tr>
	                                    <td style=""><?php echo $user['id']; ?></td>
	                                    <td style=""><?php echo $user['full_name']; ?></td>
	                                    <td style=""><?php echo $user['email']; ?></td>
	                                    <td><span class="label label-<?php if ($user['status'] == 0) {
                                                                            echo "danger";
                                                                        } else {
                                                                            echo 'success';
                                                                        } ?>"><?php if ($user['status'] == 0) {
                                                                                    echo "Chưa actice";
                                                                                } else {
                                                                                    echo 'Đã actice';
                                                                                } ?></span></td>
	                                    <td class="form-group">
	                                        <?php if ($user['status'] == 0) { ?>
	                                            <a href="index.php?page=users&userid=<?php echo $user['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
	                                        <?php } ?>
	                                        <!-- <?php if ($user['status'] == 1) { ?>
	                                            <a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
	                                        <?php } ?> -->

	                                    </td>
	                                </tr>
	                            <?php } ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div><!--/.row-->
	</div> <!--/.main-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>