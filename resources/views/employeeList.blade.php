<div class="col-sm-8">
            <h3>Employee List</h3>
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