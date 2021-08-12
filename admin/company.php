<?php require_once('header.php'); ?>

<?php

	if(isset($_POST['form1'])) {
		$valid = 1;

	    if(empty($_POST['company_name'])) {
	        $valid = 0;
	        $error_message .= "Company Name can not be empty<br>";
	    } else {
	    	// Duplicate Category checking
	    	$statement = $pdo->prepare("SELECT * FROM tbl_company WHERE company_name=?");
	    	$statement->execute(array($_POST['company_name']));
	    	$total = $statement->rowCount();
	    	if($total)
	    	{
	    		$valid = 0;
	        	$error_message .= "Company Name already exists<br>";
	    	}
	    }

	    if($valid == 1) {
			// Saving data into the main table tbl_size
			$statement = $pdo->prepare("INSERT INTO tbl_company (company_name) VALUES (?)");
			$statement->execute(array($_POST['company_name']));
		
	    	$success_message = 'Company is added successfully.';
	    }
	}

?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Company</h1>
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
		            <p>
	    	        	<?php echo $success_message; ?>
	            	</p>
	            </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post">

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Company <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="company_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="box box-info">
		        
		        <div class="box-body table-responsive">
		          	<table id="example1" class="table table-bordered table-striped">
						<thead>
						    <tr>
						        <th>SL</th>
						        <th>Company Name</th>
			                    <th>Joined since</th>
						        <th>Action</th>
						    </tr>
						</thead>
			            <tbody>
			            	<?php
				            	$i=0;
				            	$statement = $pdo->prepare("SELECT * FROM tbl_company ORDER BY company_id ASC");
				            	$statement->execute();
				            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
				            	foreach ($result as $row) {
				            		$i++;
				            		?>
									<tr>
					                    <td><?php echo $i; ?></td>
				                        <td><?php echo $row['company_name']; ?></td>
					                    <td><?php echo $row['created_at']; ?></td>
					                    <td>
					                        <a href="company-edit.php?id=<?php echo $row['company_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
					                        <a href="#" class="btn btn-danger btn-xs" data-href="company-delete.php?id=<?php echo $row['company_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
					                    </td>
					                </tr>
				            	<?php }
				            ?>
			            </tbody>
		          	</table>
		        </div>
		    </div> 
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