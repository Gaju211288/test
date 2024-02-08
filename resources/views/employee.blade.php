
<!DOCTYPE html>
<html>
<head>
  <title>Machin test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron text-center">
      <h2>Machin Test</h2>
    </div>
    <div class="container">
        <div class="row">
            
        <div id="first">
        <div class="col-sm-4">
            <h3>Add Employee</h3>
            <form id="profileForm">
                
                <!-- Form fields (e.g., name, email, etc.) -->
                <div class="form-group">
                    <input type="hidden" id="csrf" name="csrf" value="{{ csrf_token() }}">
                    <input type="text" id ="firstName" name="firstName"/>
                    <span id="error-firstName" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="lastName" name="lastName">
                    <span id="error-lastName" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="email" name="email">
                    <span id="error-email" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="mobile" name="mobile">
                    <span id="error-mobile" style="color:red;"></span>
                </div>
               <!--  <div class="form-group">
                    
                </div> -->
                <div class="form-group">
                   <button type="button" onclick="updateProfile()">Update Employee</button> 
                </div>

                
            </form>
        </div>
        
       
        <div class="col-sm-8">
            <h3>Employee List</h3>
            <input type="text" name="search" value="">
            <button>Search</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                  <?php 
                    if(!empty($empDetails)){
                  ?> 
                    <?php 
                    foreach($empDetails as $empDetail ){  
                    ?>    
                    <tr>
                        <td>{{ $empDetail->firstName }}</td>
                        <td>{{ $empDetail->lastName }}</td>
                        <td>{{ $empDetail->email }}</td>
                        <td>{{ $empDetail->mobile }}</td>
                        <td> 
                            <a href="{{ route('employee.view', $empDetail->id) }}" class="btnclass"> view </a> | <a href="{{ route('employee.edit', $empDetail->id) }}" class="btnclass"> <i class="fa fa-edit"></i>Edit </a>
                        </td>
                    </tr>
                    <?php } ?> 
                  <?php }else{ ?>
                    <tr>
                            <td colspan="14">
                                <div class="alert alert-danger">No data found.</div>
                            </td>
                    </tr> 
                  <?php } ?>
            </table>
            </div>  
        </div>


            <div id="test">
              
            </div>
        </div>
    </div>

</body>
</html>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  
        function updateProfile() {

          //validateForm();
          var token = $('#csrf').val();  
          var firstName = $('#firstName').val();
          var lastName = $('#lastName').val();
          var email = $('#email').val();
          var mobile = $('#mobile').val();
        
            $.ajax({
               type:'POST',
               url:'/employee',
               data:{ _token : token, firstName : firstName , lastName: lastName, email: email, mobile: mobile } ,
               success:function(data) {
                  $("#test").append(data.data);
                  //$("#first").remove();
               }
 
            });
        }
        
        function validateForm() {

          $('.span-error').remove();
          var name = $('#name').val();
          var email = $('#email').val();

          if(name == ''){
            $('#error-name').append('<span class="span-error">Please enter name</span>');
            return false;
          }

          if(email == '' ){
            $('#error-email').append('<span class="span-error">Please enter email</span>');
            return false;
          }else if(email.indexOf('@') == -1 || email.indexOf('.') == -1){
            $('#error-email').append('<span class="span-error">Please enter valid email</span>');
            return false;
          }

          return true;
        }
    </script>