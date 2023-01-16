

  <style>
    table caption {
      padding: .5em 0;
    }

    table.dataTable th,
    table.dataTable td {
      white-space: nowrap;
    }
  </style>
<!-- </head>

<body> -->

  <div class="container space-top  text-center">
    <h1>School Master</h1>
    <p>Get All school List</p>
    <a class="btn btn-sm btn-primary btn-edit me-1 px-2" role="button" href="schools/create">Add School</a>
    <div class="row">
      <div class="my-5">
        <div class="table-reponsive box">
          <table id="example" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Location</th>
                <th class="text-center">City</th>
                <th class="text-center">State</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($schoollist->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $row->school_name ?></td>
                  <td><?php echo $row->school_location ?></td>
                  <td><?php echo $row->city ?></td>
                  <td><?php echo $row->state ?></td>
                  <td> <a class="btn btn-sm btn-primary btn-edit me-1 px-2" role="button" href="<?php echo base_url() ?>schools/edit/<?php echo $row->id ?>">Edit</a>
                    <button class="btn btn-sm btn-danger btn-delete px-2" type="submit" onclick="delete_school(<?php echo $row->id ?>)" id="delete_school" value="<?php echo $row->id ?>">Delete</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#example').DataTable({
          lengthMenu: [
            [20, 45, 100, -1],
            [20, 45, 100, 'All'],
          ],
        });
      });

      function delete_school(id) {
        event.preventDefault();
        var school_id = id;
        var result = confirm("Want to delete?");
        if (result) {
          $.post("<?php echo base_url() ?>schools/delete/" + school_id, {
              school_id: school_id,    
            },
            function(data) {
              response=JSON.parse(data);
            if (response.code == "200"){
              alert("Success: " +response.msg);
              location.reload();
            }else {                  
              alert("Error: " +response.msg);
                }
            });

        }

      }
    </script>
