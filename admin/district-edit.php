<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['country_id'])) {
        $valid = 0;
        $error_message .= "You must have to select a country name<br>";
    }

    if(empty($_POST['city_id'])) {
        $valid = 0;
        $error_message .= "You must have to select a city name<br>";
    }

    if(empty($_POST['district_name'])) {
        $valid = 0;
        $error_message .= "End level category name can not be empty<br>";
    }

    if($valid == 1) {    	
		// updating into the database
		$statement = $pdo->prepare("UPDATE tbl_districts SET district_name=?,city_id=? WHERE district_id=?");
		$statement->execute(array($_POST['district_name'],$_POST['city_id'],$_REQUEST['id']));

    	$success_message = 'District is updated successfully.';
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * 
                            FROM tbl_districts t1
                            JOIN tbl_city t2
                            ON t1.city_id = t2.city_id
                            JOIN tbl_country t3
                            ON t2.country_id = t3.country_id
                            WHERE t1.district_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit District</h1>
	</div>
	<div class="content-header-right">
		<a href="district.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<?php							
foreach ($result as $row) {
	$district_name = $row['district_name'];
    $city_id = $row['city_id'];
    $country_id = $row['country_id'];
}
?>

<section class="content">

  <div class="row">
    <div class="col-md-12">

		<?php if($error_message): ?>
		<div class="callout callout-danger">
		
		<p>
		<?php echo $error_message; ?>
		</p>
		</div>
		<?php endif; ?>

		<?php if($success_message): ?>
		<div class="callout callout-success">
		
		<p><?php echo $success_message; ?></p>
		</div>
		<?php endif; ?>

        <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Country Name <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="country_id" class="form-control select2 top-cat">
                            <option value="">Select Country Name</option>
                            <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_id ASC");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                                foreach ($result as $row) {
                                    ?>
                                    <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $country_id){echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">City Name <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="city_id" class="form-control select2 mid-cat">
                            <option value="">Select City</option>
                            <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_city WHERE country_id = ? ORDER BY city_id ASC");
                                $statement->execute(array($country_id));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                                foreach ($result as $row) {
                                    ?>
                                    <option value="<?php echo $row['city_id']; ?>" <?php if($row['city_id'] == $city_id){echo 'selected';} ?>><?php echo $row['city_name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">District Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="district_name" value="<?php echo $district_name; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label for="" class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                    </div>
                </div>

            </div>

        </div>

        </form>



    </div>
  </div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>