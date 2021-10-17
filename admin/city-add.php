<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['country_id'])) {
        $valid = 0;
        $error_message .= "You must have to select a country<br>";
    }

    if(empty($_POST['city_name'])) {
        $valid = 0;
        $error_message .= "City Name can not be empty<br>";
    }

    if($valid == 1) {

		// Saving data into the main table tbl_mid_category
		$statement = $pdo->prepare("INSERT INTO tbl_city (city_name,country_id) VALUES (?,?)");
		$statement->execute(array($_POST['city_name'],$_POST['country_id']));
	
    	$success_message = 'City name is added successfully.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add City Name</h1>
	</div>
	<div class="content-header-right">
		<a href="city.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


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
								<select name="country_id" class="form-control select2">
									<option value="">Select Country Name</option>
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_id ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
									foreach ($result as $row) {
										?>
										<option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">City Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="city_name">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>