<!DOCTYPE html>
<html lang="en">

<head>
  <title>School Master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="https://8848digital.com/assets/images/favicon.ico">
  <meta name="meta_title" content="seo">
  <meta name="meta_keyword" content="seo">
  <meta name="meta_description" content="seo">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    table caption {
      padding: .5em 0;
    }

    table.dataTable th,
    table.dataTable td {
      white-space: nowrap;
    }
  </style>
</head>

<body>

  <div class="container p-5 text-center">
    <h1>School Master</h1>
    <p>Get All school List</p>
    <div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>schools">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo base_url()?>logout">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
      <div class="my-5">
        <a class="btn btn-sm btn-primary btn-edit me-1 px-2" role="button" href="schools/create">Add School</a>
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
                    <button class="btn btn-sm btn-danger btn-delete px-2" type="submit" onclick="delete_school()" id="delete_school" value="<?php echo $row->id ?>">Delete</button>
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

      function delete_school() {
        event.preventDefault();
        var school_id = $("#delete_school").val();
        var result = confirm("Want to delete?");
        if (result) {
          $.post("<?php echo base_url() ?>schools/delete/" + school_id, {

              school_id: school_id,
              // inputCity: inputCity,
              // inputState: inputState,

            },
            function(data, status) {
              alert("\nStatus: " + status);
              location.reload();
            });

        }

      }
    </script>
</body>

</html>