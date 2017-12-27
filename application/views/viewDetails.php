   <?php    print_r($this->session->userdata('name')); ?>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
</head>

  <body>
   <div class="be-content">
          <div class="main-content container-fluid">
             <div class="row">
                    <div class="panel panel-default">
  					            	<div class="panel-heading panel-heading-divider">
  					                <div class="panel-options">
                  				       <a href="javascript:;" onclick="jQuery('#modal-1').modal('show');" class="btn btn-primary pull-right"><strong>Add User</strong>
                                </a>
                                <a href="logout" class="btn btn-primary"><strong>Logout</strong>
                                </a>
            					    	</div>
            						</div>
              						<div class="panel-body">
              							<table id="table" cellspacing="0" class="table table-small-font table-bordered table-striped">
              							<thead>
              							         <tr>
                                        <th>ID</th>
                                        <th>First Name</th>                     										
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Password</th>    
                                        <th>Email</th>
                                        <th>DOB</th>
                                        <th>Gender</th> 
                                        <th>Phone Number</th> 
                                        <th>Create_At</th> 
                                        <th>Action</th> 
                                   	  </tr>
                            </thead>
              									
              							     	<tbody>
              									       <tr>
                                             <?php 
                                             
                                            foreach ($viewEmployee as $viewEmployee): ?>
                                             
                                              <td> <?= $viewEmployee->id ?> </td>
                                              <td> <?= $viewEmployee->first_name ?> </td>
                                              <td> <?= $viewEmployee->last_name ?> </td> 
                                              <td> <?= $viewEmployee->username?> </td>
                                              <td> <?= $viewEmployee->password?> </td>
                                              <td> <?= $viewEmployee->email?> </td>
                                              <td> <?= $viewEmployee->dob?> </td>
                                              <td> <?= $viewEmployee->gender?> </td>
                                              <td> <?= $viewEmployee->phoneno?> </td>
                                              <td> <?= $viewEmployee->created_at?> </td>
                                              <td>    
                                      
                                                <a  id="<?= $viewEmployee->id ?>"  onclick="showEdit('<?= $viewEmployee->id ?>' )"  class="btn btn-primary">Edit</a>
                                                <?php $id = $viewEmployee->id ;?>
                                                <a  href="<?php echo site_url("User/deleteEmployee/$id")?>"  class="btn btn-danger delete">Delate</a>
                                                
                                         

                                              </td>
                                          </tr>
                                       <?php 
                                       endforeach; ?>
                                      
              					 </tbody>
              				</table>
              			</div>
          			 </div>
          		 </div>
                  </div>
                </div>
           </body>
           </html> 



    <div class="modal fade custom-width" id="modal-1" >
    <div class="modal-dialog" style="width:40%" >
      <div class="modal-content" >
         <div class="panel panel-default panel-border-color panel-border-color-primary">
           
       <?php echo form_open('User/addEmployee',array('class' => 'form-horizontal valid_from','role'=> 'form','method' => 'post','id'=>'employee','enctype'=>'multipart/form-data')); ?>
        
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="panel-heading panel-heading-divider">Add User Details</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >First Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="first_name" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Last Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >User Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Image<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="file" name="userfile" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Email<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Password<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Gender<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="radio" name="gender" value="Male" >Male<br>
                                <input type="radio" name="gender" value="Female">Female
                              </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label" >DOB<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="dob" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Phone Number<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="phoneno" class="form-control" required>
                              </div>
                        </div>
                  </div>
                    
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary pull-right">Add</button>
                </div>
           </form>
       </div>
      </div>
   </div>
  </div>
  <div class="modal fade custom-width" id="modal-2" >

     <div class="modal-dialog" style="width:40%" >
      <div class="modal-content" >
         <div class="panel panel-default panel-border-color panel-border-color-primary">
           
       <?php echo form_open('User/updateEmployee',array('class' => 'form-horizontal valid_from','role'=> 'form','method' => 'post','id'=>'employee','enctype'=>'multipart/form-data')); ?>
        
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="panel-heading panel-heading-divider">Add User Details</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >First Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Last Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >User Name<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label" >Image<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="file" name="user_file" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Email<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Password<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Gender<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="radio" name="username" value="Male" >Male<br>
                                <input type="radio" name="username" value="Female">Female
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >DOB<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Phone Number<span>*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" required>
                              </div>
                        </div>
                  </div>
                    
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary pull-right">Add</button>
                </div>
           </form>
       </div>
      </div>
   </div> 
  </div>

  <script type="text/javascript">
    $(document).ready(function(){

     $(".delete").click(function(){
       alert("Delete?");
         var href = $(this).attr("href");
         var btn = this;

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {

          if (response == "Success")
          {
             
          }
          else
          {
           
          }

       }
    });

   })
  });

  </script>
  <script type="text/javascript">

$(document).ready(function(){
   
    $('#showEdit').submit(showEdit);
    
});

function showEdit(id)

  {
       $.ajax ({ 
        url:"editUser",
        type: "POST",
        data: {
               id:id
        },
       //cache: false,
      success: function(resp){
      
          document.getElementById("modal-2").innerHTML= resp;
          $("#modal-2").modal('show');
             
  }
    
  });
  }
  
 </script>
 <script type="text/javascript">
    
  $(document).ready(function(){
          
    $(".valid_from").validate({

      rules:
      {
       first_name: "required",
       last_name: "required",
       username: "required",
       email: "required",
       password: "required",
       gender: "required",
       last_name: "required",
       dob: "required",
        phoneno: {
              required: true,
              maxlength: 10,
              minlength:10,
              number: true

    }
     
     
      },

      messages: {
      
      first_name: "Please Write First Name",
       last_name: "Please Write Last Name",
       username: "Please Write User Name",
       email: "Please Write Email Address",
       password: "Please Write Password",
       gender: "Please Select Gender",
       last_name: "Please Last Name",
       dob: "Please Select DOB ",
        phoneno: {
              required: "Please Select Phone Number",
              maxlength: "Not Correct",
              minlength:"Not Correct",
              number: "Please Select numeric value"

    }
     
      },
      submitHandler: function(form) {
            form.submit();
        }
    });
  });



 </script>