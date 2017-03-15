
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact List</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS And JavaScript -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		     <script src="https://use.fontawesome.com/58ef84afa4.js"></script>


		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		     

    </head>

    <style>
        body {background-color: powderblue;}
        h1   {color: blue;}
        input.modal-input {width: 100%;}
        .margin-top-20 {margin-top: 20px;}
        .margin-top-10 {margin-top: 10px;}
        .margin-top-5 {margin-top: 5px;}

        
    </style>


    <body>
    <!--
        <div class="container">
            <nav class="navbar navbar-default">
    -->
                <!-- Navbar Contents -->
    <!--
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Task Manager</a>
                        </div>

                        <div class="navbar-form navbar-right">
                                <button id="clearAllButton" class="btn btn-default">Clear All</button>
                        </div>

                        <ul class="nav navbar-nav">
                          <li><button id="clearAll" class="btn btn-default">Clear All</button></li>
                            
                        </ul>
                  
                    </div>
            </nav>
        </div>
      -->
        @yield('content')

    <!-- MODALS SECTION -->
    <div class="modal fade" id="deleteContact" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash" aria-hidden="true"></i> Delete Contact</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure want to delete this contact?</p>
                  </div>
                  <div class="modal-footer">
                  <!--
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="clearAllTasks()">Clear All</button>
                  -->
                    <form id="deleteForm" action="" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                          <button id="deleteBtn" type="submit" class="btn btn-danger">Delete Task</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                    
                  </div>
                </div>

          </div>
    </div>

    <!-- password reset modal -->
<div class="modal fade" id="add_contact_modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 id="contactModalHeader"><i class="fa fa-address-book-o" aria-hidden="true"></i> Add Contact <span class="extra-title muted"></span></h3>
    </div>
        <form action="/contact" method="POST" class="form-horizontal">
            {{ csrf_field() }}
         <div id="changePasswordForm" class="modal-body form-horizontal">
          <div class="control-group">
              <label for="name" class="control-label">Name</label>
              <div class="controls">
                  <input class="modal-input"  name="name" id="name" required>
              </div>
          </div>
          <div class="control-group">
              <label for="jobtitle" class="control-label">Job Title</label>
              <div class="controls">
                  <input class="modal-input" name="jobtitle" id="jobtitle" required>
              </div>
          </div>

        <div class="control-group">
              <label for="age" class="control-label">Age</label>
              <div class="controls margin-top-5">
                  <select class="modal-input" name="age" id="age" required>
                      <option>select</option>
                      <option>18</option>
                      <option>21</option>
                      <option>30</option>
                    </select>
              </div>
          </div>

          <div class="control-group">
            <label for="nickname" class="control-label">Nickname</label>
            <div class="controls">
              <input class="modal-input" name="nickname" id="nickname" required>
            </div>
          </div>

          <div class="control-group">
              <label for="group" class="control-label">Group</label>
              <div class="controls margin-top-5">
                  <select class="modal-input" name="group" id="group_select" required>
                      <option>select</option>
                      <option>Front Desk</option>
                      <option>Engineering</option>
                      <option>30</option>
                    </select>
              </div>
          </div>

          <div class="control-group margin-top-10">
            <div class="checkbox">
              <label for="manager"><input type="checkbox" name="manager"> Manager</label>
            </div>
          </div>

          <div class="modal-footer margin-top-10">
            <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button href="#" type="submit" class="btn btn-primary" id="password_modal_save">  &nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;  </button>
        </div>
        </form>
    </div>
  </div>
</div><!--change password modal -->
    
    <script>

        $( "#addContactBtn" ).click(function() {
           // console.log("clearAll clicked");
            //href="/clearall"
                         var headerText = '<i class="fa fa-address-book-o" aria-hidden="true"></i> Add Contact <span class="extra-title muted"></span>';
             $("#contactModalHeader").html(headerText);
           $("#add_contact_modal").modal('show');

       });

        $( ".editBtn" ).click(function() {
           // console.log("clearAll clicked");
            //href="/clearall"
             //$("#confirmClearAll").modal('show');
             var id = $(this).parent().attr('id');
             console.log("edit button clicked");
             console.log(id);
             
             var headerText = '<i class="fa fa-address-book-o" aria-hidden="true"></i> Edit Contact <span class="extra-title muted"></span>';
             $("#contactModalHeader").html(headerText);
             var header = $("#contactModalHeader").text();
             console.log(header);
            $("#add_contact_modal").modal('show');
       });

      $( ".deleteBtn" ).click(function() {
           // console.log("clearAll clicked");
            //href="/clearall"
            // $("#confirmClearAll").modal('show');
            console.log("delete button clicked");
            var id = $(this).parent().parent().parent().attr('id');
            console.log(id);
            var action = "/contact/" + id;
            $("#deleteForm").attr('action', action);
            $("#deleteContact").modal('show');
            
       });

        

        function clearAllTasks()
        {
            /*
            $.get('/clearall', function(){ 
                console.log('response');
                location.reload(); 
            });
            */
            $.ajax({
                method: 'POST', // Type of response and matches what we said in the route
                url: '/clearall', // This is the url we gave in the route
             //   data: {'id' : id}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log(response); 
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

        }

    </script>
        
    </body>
</html>