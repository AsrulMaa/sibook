<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= url_image('backend', $profile->avatar) ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $profile->fullname ?></h3>

              <p class="text-muted text-center"><?= $profile->email ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?=  $active = ($profile->is_active ? '<span class="badge bg-green">Active</span>' : '<span class="badge bg-red">Not Active</span>') ?></a>
                </li>
                <li class="list-group-item">
                  <b>Role</b> <a class="pull-right"><span class="badge bg-green"><?= $profile->role ?></span></a>
                </li>
                <li class="list-group-item">
                  <b>Created At</b> <a class="pull-right"><?= $profile->created_at ?></a>
                </li>

                <li class="list-group-item">
                  <b>Update at</b> <a class="pull-right"><?= $profile->update_at ?></a>
                </li>

                <li class="list-group-item">
                  <b>Last Login</b> <a class="pull-right"><?= $profile->last_login ?></a>
                </li>
              </ul>

              <a href="<?= BASE_URL.'admin/users/edit_profile' ?>" class="btn btn-warning btn-block" ><b>Edit Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li  class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              

              <div class="active tab-pane " id="settings">
               <?= form_open($form_action, [
                    'name'    => 'form_user', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_user', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="" value="<?=$profile->email ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group ">
                        <label for="password" class="col-sm-2 control-label">Password <i class="required">*</i></label>

                        <div class="col-sm-10">
                          <div class="input-group col-md-8 input-password">
                          <input type="password" class="form-control password" name="password" id="password" placeholder="Password" value="">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-flat show-password"><i class="fa fa-eye eye"></i></button>
                            </span>
                          </div>
                            <span class="required"><?= form_error('password') ?></span>

                        </div>
                    </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Confirm Password <i class="required">*</i></label>

                    <div class="col-sm-10">
                      <div class="input-group col-md-8 input-password">
                        <input type="password" class="form-control" id="inputEmail"  name="password_confirmation"  placeholder="Confirm Password"><br>
                        <span class="required"><?= form_error('password_confirmation') ?></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"></label>

                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-flat btn-primary" > Change Password </button>
                    </div>
                  </div>
                  
                <?= form_close(); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <?php if ($this->session->flashdata('success')): ?>
        <script>
          toastr['success']('<?= $this->session->flashdata('message') ?>');  
        </script>
      <?php elseif($this->session->flashdata('error')): ?>
        <script>
          toastr['warning']('<?= $this->session->flashdata('message') ?>');  
        </script>
      <?php endif; ?>  