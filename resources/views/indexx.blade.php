<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>How to add Edit Delete button in Yajra DataTables – Laravel</title>

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

</head>
<body>
   <div class='container mt-5'>

       <!-- Modal -->
       <div id="updateModal" class="modal fade" role="dialog">
           <div class="modal-dialog">

               <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Update</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button> 
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="name" >Employee Name</label>
                          <input type="text" class="form-control" id="emp_name" placeholder="Enter Employee name" > 
                      </div>
                      <div class="form-group">
                          <label for="email" >Email</label> 
                          <input type="email" class="form-control" id="email" placeholder="Enter email"> 
                      </div> 
                      <div class="form-group">
                          <label for="gender" >Gender</label>
                          <select id='gender' class="form-control">
                              <option value='Male'>Male</option>
                              <option value='Female'>Female</option>
                          </select> 
                      </div> 
                     <div class="form-group">
                          <label for="city" >City</label> 
                          <input type="text" class="form-control" id="city" placeholder="Enter city"> 
                     </div>

                  </div>
                  <div class="modal-footer">
                      <input type="hidden" id="txt_empid" value="0">
                      <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  </div>
             </div>

           </div>
       </div>

       <!-- Table -->
       <table id='empTable' class='datatable'>
           <thead >
               <tr>
                   <td>Employee Name</td>
                   <td>Email</td>
                   <td>Gender</td>
                   <td>City</td>
                   <td>Status</td>
                   <td>Action</td>
               </tr>
           </thead>
       </table>
   </div>

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
   $(document).ready(function(){

       // Initialize
       var empTable = $('#empTable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('getDataTableData') }}",
             columns: [
                 { data: 'emp_name' },
                 { data: 'email' },
                 { data: 'gender' },
                 { data: 'city' },
                 { data: 'status' },
                 { data: 'action' },
             ]
       });

       // Update record
       $('#empTable').on('click','.updateUser',function(){
            var id = $(this).data('id');

            $('#txt_empid').val(id);

            // AJAX request
            $.ajax({
                url: "{{ route('getEmployeeData') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN,id: id},
                dataType: 'json',
                success: function(response){

                    if(response.success == 1){

                         $('#emp_name').val(response.emp_name);
                         $('#email').val(response.email);
                         $('#gender').val(response.gender);
                         $('#city').val(response.city);

                         empTable.ajax.reload();
                    }else{
                         alert("Invalid ID.");
                    }
                }
            });

       });

       // Save user 
       $('#btn_save').click(function(){
            var id = $('#txt_empid').val();

            var emp_name = $('#emp_name').val().trim();
            var email = $('#email').val().trim();
            var gender = $('#gender').val().trim();
            var city = $('#city').val().trim();

            if(emp_name !='' && email != '' && city != ''){

                 // AJAX request
                 $.ajax({
                     url: "{{ route('updateEmployee') }}",
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id,emp_name: emp_name, email: email, gender: gender, city: city},
                     dataType: 'json',
                     success: function(response){
                         if(response.success == 1){
                              alert(response.msg);

                              // Empty and reset the values
                              $('#emp_name','#email','#city').val('');
                              $('#gender').val('Male');
                              $('#txt_empid').val(0);

                              // Reload DataTable
                              empTable.ajax.reload();

                              // Close modal
                              $('#updateModal').modal('toggle');
                         }else{
                              alert(response.msg);
                         }
                     }
                 });

            }else{
                 alert('Please fill all fields.');
            }
       });

       // Delete record
       $('#empTable').on('click','.deleteUser',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                 // AJAX request
                 $.ajax({
                     url: "{{ route('deleteEmployee') }}",
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id},
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");

                               // Reload DataTable
                               empTable.ajax.reload();
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }

       });

   });

   </script>
</body>
</html>