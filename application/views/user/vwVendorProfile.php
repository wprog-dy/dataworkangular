<?php
  $this->load->view('user/vwadminheader.php');
?>
<div id="wrapper">
  <div class="main-content">
  <div class="row small-spacing">
      <div class="col-12">
        <div class="box-content">
          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="d-none text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= ucwords($vendordata->first_name.' '.$vendordata->last_name); ?></h3>

                <p class="text-muted text-center"><?= $vendordata->email; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Login Code</b> <a class="float-right"><?= $vendordata->login_code; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile Number</b> <a class="float-right"><?=  $vendordata->phone; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Other Mobile Number</b> <a class="float-right"><?= $vendordata->other_phone; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Landline Number</b> <a class="float-right"><?= $vendordata->landline; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pancard Number</b> <a class="float-right"><?= $vendordata->pancard_no; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Industry Type</b> <a class="float-right"><?= $vendordata->industry_type; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>City</b> <a class="float-right"><?= $vendordata->city; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact Person</b> <a class="float-right"><?= $vendordata->contact_person; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Company Name</b> <a class="float-right"><?= $vendordata->company_name; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Company Type</b> <a class="float-right"><?= $vendordata->company_type; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Website</b> <a class="float-right"><?= $vendordata->company_website; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>GST No</b> <a class="float-right"><?= $vendordata->gst_no; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Business Years</b> <a class="float-right"><?= $vendordata->business_years; ?></a>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong>Additional Information </strong>

                <p class="text-muted">
                  <?= $vendordata->additional_info; ?>
                </p>

                <hr>

                <strong>Main Service</strong>

                <p><?= $vendordata->main_services; ?></p>

                <hr>

                <strong>Service</strong>

                <p><?= $vendordata->services; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#drivers" data-toggle="tab">Driver List</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vehicle" data-toggle="tab">Vehicle List</a></li>
                  <li class="nav-item"><a class="nav-link" href="#trips" data-toggle="tab">Trips</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="drivers">
                    <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Driver Name</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Driver Type</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Phone</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Date Of Birth</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Aadhar No.</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Address</th>
                
              </tr>
            </thead>
            <tbody> 
            <?php 
              $i = 0; 

              foreach($driverdata as $db_value){
                ++$i;
                $tr_class = "odd";
                if($i%2 == 0){
                  $tr_class = "even";
                }
            ?>
              <tr role="row" class="<?=$tr_class?>">
                <td class="sorting_1"><?php echo $i; ?></td>
                <td>
                <?php echo ucwords($db_value->driver_name); ?>
                </td>
                <td><?php echo $db_value->driver_type; ?></td>
                <td><?php echo $db_value->phone_no; ?></td>
                <td><?php echo $db_value->dob; ?></td>
                <td><?php echo $db_value->aadhar_number; ?></td>
                <td><?php echo $db_value->address; ?></td>
              
              </tr>
              <?php } ?>
            </tbody>
          </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="vehicle">
                    <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vehicle Type</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Vehicle No.</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Assigned Driver</th>
              </tr>
            </thead>
            <tbody> 
            <?php 
              $i = 0; 
              foreach($vehicledata as $db_value){
                ++$i;
                $tr_class = "odd";
                if($i%2 == 0){
                  $tr_class = "even";
                }
            ?>
              <tr role="row" class="<?=$tr_class?>">
                <td class="sorting_1"><?php echo $i; ?></td>
                <td>
                <?php echo $db_value->vehicle_type; ?>
                </td>
                <td><?php echo $db_value->vehicle_no; ?></td>
                <td><?php echo ucwords($db_value->driver_name); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="trips">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-12 -->

<?php
  $this->load->view('user/vwadminfooter.php');
?>