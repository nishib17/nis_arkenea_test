<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://getbootstrap.com/dist/js/bootstrap.min.js'); ?>"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
    // $( "#datepicker" ).datepicker();
      var today = new Date();
        $('#datepicker').datepicker({
            format: 'mm-dd-yyyy',
            autoclose:true,
            endDate: "today",
            maxDate: today
        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });


        $('#datepicker').keyup(function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });
} );
</script>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>Employee Update</h3>
			<hr>
			<?php
			if ($this->session->flashdata('success')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('success'); ?></p>
			<?php }
			?>
			<?php
			if ($this->session->flashdata('error')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('error'); ?></p>
			<?php }
			?>
			<?php echo form_open_multipart('employee/save',['name'=>'insertdata','autocomplete'=>'off']);?>
			<!-- <form method="POST" action="<?=base_url()?>employee/save" enctype="multipart/form-data"> -->
				<div class="row">
					<div class="col-md-4"><b>Employee Name</b>
						<input type="hidden" name="emp_id" value="<?php if(isset($result)) echo $result->emp_id ?>">
						<?php echo form_input(['name'=>'emp_name','class'=>'form-control','value'=>set_value('emp_name',$result->emp_name)]); ?>
						<?php echo form_error('emp_name',"<div style='color:red'>","</div>"); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Employee Address</b>
						<?php echo form_textarea(['name'=>'address','class'=>'form-control','rows'=>3,'value'=>set_value('address',$result->address)]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Email Address</b>
						<?php echo form_input(['name'=>'email_address','class'=>'form-control','value'=>set_value('email_address',$result->email_address)]); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Phone</b>
						<?php echo form_input(['name'=>'phone_no','class'=>'form-control','value'=>set_value('phone_no',$result->phone_no)]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>DOB</b>
						<?php echo form_input(['name'=>'dob','id'=>'datepicker','class'=>'form-control','value'=>set_value('dob',$result->dob)]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Employee image</b>
						 <img src="<?php echo base_url(); ?>uploads/<?=$result->emp_image?>" width="50px" height="50px">                   
						 <br>
						 <input name="userfile" type="file"  />
						 <input name="userfile_hidden" type="hidden" value="<?php if(isset($result)) echo $result->emp_image ?>" />

					</div>
				</div>
				<div class="row">
					<div class="col-md-4" style="margin-top: 3%">
						<?php echo form_submit(['name'=>'insert','value'=>'Submit','class'=>'btn btn-primary']); ?>

						 <a href="<?php echo base_url(); ?>" name="Cancel" class="btn  btn-warning "><i class="fa fa-angle-left"></i> Cancel</a>
					</div>
				</div>

				
			<?php echo form_close();?> 
						





		</div>
		</div>
		
		
	</div>

</body>

</html>