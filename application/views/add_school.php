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

<div class="container my-5 space-top">
  <div class="row justify-content-center">

    <div class="col-lg-9">
      <h1 class="mb-3 text-center">School Information</h1>
      <form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
        <div class="alert alert-danger display-error" style="display: none"></div>
        <div class="row g-3">
          <input type="hidden" id="school_id" name="school_id" value="<?php echo $school_data[0]->id ?? '' ?>">
          <div class="col-md-6">
            <label for="school-name" class="form-label">School Name</label>
            <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school_data[0]->school_name ?? '' ?>" required>
            <span class="text-danger"><?php echo form_error('school_name'); ?></span>
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
                <button id='submit' type="submit" class="btn btn-primary w-100 fw-bold">Send</button>
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
    if (school_name != '' && school_location != '') {
      $.post("<?php echo base_url() ?>/savedata", {
          school_name: school_name,
          school_location: school_location,
          school_id: school_id,

        },
        function(data) {
          response = JSON.parse(data);
          if (response.code == "200") {
            alert("Success: " + response.msg);
          } else {
            $(".display-error").html("<ul>" + response.msg + "</ul>");
            $(".display-error").css("display", "block");
          }
          window.location = "<?php echo base_url() ?>schools";
        });
    } else {
      alert("Fill the data")
    }
  });
</script>