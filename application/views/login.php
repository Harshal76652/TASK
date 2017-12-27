<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Page</h2>
      <?php echo form_open('User/logincheck',array('class' => 'form-horizontal valid_from','role'=> 'form','method' => 'post')); ?>
    <div class="form-group">
      <label>USER NAME</label>
      <input type="text" name="email" required>
    </div>
    <div class="form-group">
      <label>PASSWORD</label>
      <input type="text" name="password" required>
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
 <script type="text/javascript">
    
  $(document).ready(function(){
          
    $(".valid_from").validate({

      rules:
      {
        email: {
              required: "required",
              email: "true",
            },
     
       password: "required"


    },


      messages: {
      
      email: {
              required: "Please Write Email Address",
              email: "Please Write Correct Email Address"
            },
      password: "Please Write Password"
      },
      submitHandler: function(form) {
            form.submit();
        }
    });
  });



 </script>
</body>
</html>
 