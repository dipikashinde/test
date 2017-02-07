<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Test form</h2> <hr/>
  <?php validation_errors(); ?>

  <?php echo form_open_multipart(base_url('submit')); //'welcome/submit'?>
<!--  <form class="form-horizontal">-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Full Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" name="name" id="name" placeholder="Full Name" value="<?php echo set_value('name'); ?>" >
        <label for="name" class="form_error"><?php echo form_error('name'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Address:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
        <label for="name" class="form_error"><?php echo form_error('email'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact No:</label>
      <div class="col-sm-10">
        <input type="contact" class="form-control" name="contact" id="contact" placeholder="Contact No" value="<?php echo set_value('contact'); ?>">
        <label for="name" class="form_error"><?php echo form_error('contact'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ex_year">Experience in Year:</label>
      <div class="col-sm-10">          
        <input type="ex_year" name="ex_year" class="form-control" id="ex_year" placeholder="Experience in Year" value="<?php echo set_value('ex_year'); ?>">
        <label for="name" class="form_error"><?php echo form_error('ex_year'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ex_month">Experience in Months:</label>
      <div class="col-sm-10">          
        <input type="ex_month" class="form-control" name="ex_month" id="ex_month" placeholder="Experience in Months" value="<?php echo set_value('ex_month'); ?>">
        <label for="name" class="form_error"><?php echo form_error('ex_month'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="location">Location:</label>
      <div class="col-sm-10">          
        <select class="form-control" id="location" name="location">
            <option value="0"  disabled>-- Select City --</option>
            <option value="Mumbai" name="location" >Mumbai</option>
            <option value="Delhi" name="location" >Delhi</option>
            <option value="Hyderabad" name="location" >Hyderabad</option>
        </select>
        <label for="name" class="form_error"><?php echo form_error('location'); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="comment">Comments:</label>
      <div class="col-sm-10">          
        <input type="comment" class="form-control" name="comment" id="comment" placeholder="Comments">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="file">Upload your resume:</label>
      <div class="col-sm-10">          
        <input type = "file" name = "userfile" size = "20" /> 
        <?php if(isset($error)){ ?> <label for="name" class="form_error"><?php print_r($error); ?></label> <?php } ?>
        <label for="name" class="form_error"><?php echo form_error('userfile'); ?></label>
      </div>
    </div>
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" value="Submit" class="btn btn-success">Submit</button>
        <button type='reset' value='Reset' name='reset' class="btn btn-danger">Reset</button>
      </div>
    </div>
  </form>
  <div class="form-group">
      <?php if(isset($result)){     
      if( $result['status']=='ok' ){ ?> 
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> You successfully Registered.
        </div>
    <?php }else{ ?> 
        <div class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> try submitting again.
        </div>
    <?php }} ?> 
  </div>
</div>

</body>
<hr/>

<a href="<?php echo base_url('user'); ?>" ><h4>test 2 click here</h4></a>
<style>
    .form_error{
        color:red;
    }
</style>
