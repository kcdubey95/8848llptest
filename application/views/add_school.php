<!-- <?php print_r($school_data[0]->school_name) ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>School Information</title>
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
    .dataTables_length,
    .dataTables_filter {
      display: inline-block;
      margin-left: 1.5rem;
    }

    .dt-button-collection {
      width: auto !important;
    }

    .dt-button-collection .dt-button:not(.dt-btn-split-drop) {
      min-width: 4rem !important;
    }
  </style>
</head>

<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>schools">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>logout">Logout</a>
            </li>

          </ul>
        </div>
      </nav>
      <div class="col-lg-9">
        <h1 class="mb-3">School Information</h1>
        <form>
          <div class="row g-3">
            <input type="hidden" id="school_id" name="school_id" value="<?php echo $school_data[0]->id ?? '' ?>">
            <div class="col-md-6">
              <label for="school-name" class="form-label">School Name</label>
              <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school_data[0]->school_name ?? '' ?>" required>
            </div>
            <div class="col-md-6">
              <label for="school-location" class="form-label">School Location</label>
              <input type="text" class="form-control" id="school_location" value="<?php echo $school_data[0]->school_location ?? '' ?>" name="school_location" required>
            </div>
            <!-- <div class="col-md-6">
					<label for="inputState" class="form-label">State</label>
					<select id="inputState" class="form-select" required>
						<option selected>Choose...</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Puducherry">Puducherry</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Odisha">Odisha</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Telangana">Telangana</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="Uttarakhand">Uttarakhand</option>
						<option value="West Bengal">West Bengal</option>
					</select>
				</div> -->
            <!-- <div class="col-md-6">
					<label for="" class="form-label">City</label>
					<select id="inputCity" class="form-select" required>
						<option selected value="">Choose...</option>

					</select>
				</div> -->
            <div class="col-12">
              <div class="row">
                <div class="col-md-6">
                  <button id='submit' type="submit" class="btn btn-dark w-100 fw-bold">Send</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $("#inputState").change(function() {
      debugger
      var formData = {
        'city': $("#inputState").val() //for get email 
      };
      $.ajax({
        type: "post",
        data: formData,
        url: "<?php echo base_url() ?>citylist",
        success: function(data) {
          $("#inputCity").empty();
          for (let i = 0; i < data.length; i++) {
            var opt = $("<option>").val(data[i]).text(data[i]);
            $('#inputCity').append(opt)
          }
          return data;
        }
      });
    });

    $("#submit").click(function() {
      event.preventDefault();
      var school_name = $("#school_name").val();
      var school_location = $("#school_location").val();
      var school_id = $("#school_id").val();
      // var inputCity = $("#inputCity").val();
      // var inputState = $("#inputState").val();
      if (school_name != '' && school_location != '') {
        $.post("<?php echo base_url() ?>/savedata", {

            school_name: school_name,
            school_location: school_location,
            school_id: school_id,
            // inputCity: inputCity,
            // inputState: inputState,

          },
          function(data, status) {

            alert("Data: " + data + "\nStatus: " + status);
            location.reload();
          });
      } else {
        alert("Fill the data")
      }
    });
  </script>
</body>

</html>