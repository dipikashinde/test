<?php
//print_r($list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List</h2>
        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Experience</th>
        <th>Location</th>
         <th>Comment</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<count($list); $i++){ 
            echo '<tr><td>'.$list[$i]['name'].
                 '</td><td>'.$list[$i]['email_id'].
                 '</td><td>'.$list[$i]['contact_no'].
                 '</td><td>'.$list[$i]['exp_yr'].' Year '.$list[$i]['exp_mnth'].' Months '.
                 '</td><td>'.$list[$i]['location'].
                 '</td><td>'.$list[$i]['comment'].
                 '</td><td><a href="download?resume='.$list[$i]['file_name'].'" button type="button" class="btn btn-default">Download Resume</a>'; 
         } ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
