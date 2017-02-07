
<head>
   <title>login</title>
</head>
<body>
   <h1>Simple Login </h1>
   <?php validation_errors(); ?>
   <?php echo form_open(base_url('user/verifylogin')); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="<?php echo set_value('username'); ?>" />
     <label for="username" class="form_error"><?php echo form_error('username'); ?></label>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="<?php echo set_value('password'); ?>"/>
     <label for="password" class="form_error"><?php echo form_error('password'); ?></label>
     <br/>
     <input type="submit" value="Login"/>
   </form>
   <?php if(isset($error)){ echo '<label class="form_error">'.$error.'</label>'; } ?>
</body>
</html>

<style>
    .form_error{
        color:red;
    }
</style>