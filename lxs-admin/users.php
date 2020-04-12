<?php
include "core.php";
head();
?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
          </div>
          
              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  Users
                </div>
                <div class="card-body">
								<div class="panel-body">
									<table class="table table-bordered table-striped mb-none table-responsive" id="datatable-default">
									<thead>
										<tr>
											<th>ID</th>
											<th>Username</th>
                                            <th>E-Mail</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'users';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
											<td>' . $row['id'] . '</td>
                                            <td>' . $row['username'] . '</td>
                                            <td>' . $row['email'] . '</td>
											<td>
                                            <a href="?linax_token='.$_SESSION['token'].'&edit-id=' . $row['id'] . '" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="?linax_token='.$_SESSION['token'].'&delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id']) && $_SESSION['token'] == $_GET['linax_token']) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'users';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=users.php>";
}
?>   
								</tbody>
								</table>
                            </div>
                </div>
              </div>

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  Add Users
                </div>
                <div class="card-body">
								<div class="panel-body">
                           <form class="form-horizontal" action="" method="post">
                           	<input type="hidden" name="linax_token" value="<?= $_SESSION['token']; ?>">
										<div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-12">
												<input type="text" name="username" class="form-control" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">E-Mail Address: </label>
											<div class="col-sm-12">
												<input type="text" name="email" class="form-control" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Password: </label>
											<div class="col-sm-12">
												<input type="password" name="password" class="form-control" required>
											</div>
										</div>
									<footer class="panel-footer">
										<button class="btn btn-primary btn-block" name="add" type="submit">Add</button>
										<button type="reset" class="btn btn-info btn-block">Reset</button>
									</footer>
							</form>
<?php
if (isset($_POST['add']) && $_SESSION['token'] == $_POST['linax_token']) {
    $table    = $prefix . 'users';
    $username = addslashes($_POST['username']);
    $email    = addslashes(htmlspecialchars($_POST['email']));
    $password = base64_encode($_POST['password']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
		<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered <b>E-Mail Address</b> is invalid.</p>
        </div>
		';
    } else {
        $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$username' OR email='$email' LIMIT 1");
        $validator  = mysqli_num_rows($queryvalid);
        if ($validator > "0") {
            echo '
		<div class="alert alert-warning" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-info-circle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered <b>Username / E-Mail Address</b> is already used by other user.</p>
        </div>
		';
        } else {
            $query = mysqli_query($connect, "INSERT INTO `$table` (username, email, password) VALUES('$username', '$email', '$password')");
            echo '<meta http-equiv="refresh" content="0;url=users.php">';
        }
    }
}
?>
                </div>
              </div>
							
</div>
							

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  Edit Users
                </div>
                <div class="card-body">
 <?php
if (isset($_GET['edit-id']) && $_SESSION['token'] == $_GET['linax_token']) {
    $id    = (int) $_GET["edit-id"];
    $id = addslashes($id);
    $table = $prefix . 'users';
    $sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE id = '$id'");
    $row   = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
?>
                            <section class="panel">
								<div class="panel-body">
                           <form class="form-horizontal" action="" method="post">
                           	<input type="hidden" name="linax_token" value="<?= $_SESSION['token']; ?>">
										<div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-12">
												<input type="text" name="username" class="form-control" value="<?= $row['username']; ?>" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">E-Mail Address: </label>
											<div class="col-sm-12">
												<input type="text" name="email" class="form-control" value="<?= $row['email']; ?>" required>
											</div>
										</div>
                                        <hr>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">New Password: </label>
											<div class="col-sm-12">
												<input type="text" name="password" class="form-control">
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary btn-block" name="edit" type="submit">Update</button>
										<button type="reset" class="btn btn-info btn-block">Reset</button>
									</footer>
								</section>
							</form>

<?php
    if (isset($_POST['edit']) && $_SESSION['token'] == $_POST['linax_token']) {
        $table    = $prefix . 'users';
        $username = addslashes($_POST['username']);
        $email    = addslashes(htmlspecialchars($_POST['email']));
        $password = base64_encode($_POST['password']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered E-Mail Address is invalid.</p>
        </div>
		';
        } else {
            $query = mysqli_query($connect, "UPDATE `$table` SET username='$username', email='$email' WHERE id='$id'");
            if ($password != null) {
                $query = mysqli_query($connect, "UPDATE `$table` SET password='$password' WHERE id='$id'");
            }
            echo '<meta http-equiv="refresh" content="0;url=users.php">';
        }
    }
?>
							</section>
<?php
}
?>
                </div>
              </div>
						

<?php
footer();
?>