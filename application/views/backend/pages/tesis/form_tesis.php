

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+s', function assets() {
      $('#btn_save').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_cancel').trigger('click');
       return false;
   });

  $('*').bind('keydown', 'Ctrl+d', function assets() {
      $('.btn_save_back').trigger('click');
       return false;
   });
    
}

jQuery(document).ready(domo);
</script>
<?php $this->load->view('core_template/fine_upload'); ?>




<!-- Main content -->
<section class="content">
	<div class="row" >
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                     <a class="btn btn-flat btn-success" title="Kembali" href="<?= site_url('admin/tesis'); ?>"><i class="fa fa-reply" ></i> Kembali</a>                     
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET ?>/img/add2.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Add</h3>
                     <h5 class="widget-user-desc">New<i class="label bg-yellow"></i></h5>
                  </div>

                 <?= form_open('', [
                    'name'    => 'form_user', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_user', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Judul Penelitian <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Penelitian / Tesis" value="<?= $judul ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="email" class="col-sm-2 control-label">Nama Penulis <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama_penulis" id="nama_penulis" placeholder="Nama Penulis" value="<?= $nama_penulis ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Tahun<i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun di serahkan" value="<?= $tahun ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Pembimbing Satu<i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="pembimbing_satu" id="tahun" placeholder="Pembimbing Satu" value="<?= $pembimbing_satu ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Pembimbing dua<i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="pembimbing_dua" id="tahun" placeholder="Pembimbing dua" value="<?= $pembimbing_dua ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Jumlah di perbanyak<i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Perbanyak" value="<?= $jumlah ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="message">
                      
                    </div>

                    <div class="row-fluid col-md-7">
                        <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Save</button>
                        <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save_back" data-stype='back' title="save and back to the list (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> Save and Go to The List</a>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</a>
                        <span class="loading loading-hide"><img src="<?= BASE_ASSET ?>/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                     </div>

                  <?= form_close(); ?>
                  
                  
               </div>
            
               <!-- /.widget-user -->

            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>

</section>

<!-- Page script -->
<script>
  $(document).ready(function() {
    if (<?= $update ?> != false) {
      $('#btn_save').hide();
      $('.btn_save_back').text('Update Data');
    }  
    $('#btn_cancel').click(function() {
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location.href = BASE_URL + 'admin/tesis';
            }
        });

        return false;
    }); /*end btn cancel*/




    $('.btn_save').click(function() {
        $('.message').fadeOut();

        var form_user = $('#form_user');
        var data_post = form_user.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({
            name: 'save_type',
            value: save_type
        });

       
        $('.loading').show();

        // data_post.group = $('#group').chosen().val();

        $.ajax({
                url: BASE_URL + '<?= $action ?>',
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                if (res.success) {
                    if (save_type == 'back') {
                        window.location.href = res.redirect;
                        return;
                    }

                    $('.message').printMessage({
                        message: res.message
                    });
                    $('.message').fadeIn();
                    $('form input[type != hidden], form textarea, form select').val('');
                    $('.chosen').val('').trigger('chosen:updated');
                    $('#user_avatar_galery').fineUploader('deleteFile', id);

                } else {
                    $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                    });
                    $('.message').fadeIn();
                }

            })
            .fail(function() {
                $('.message').printMessage({
                    message: 'Error save data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading').hide();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 1000);
            });

        return false;
    }); /*end btn save*/
    $('#user_avatar_galery').fineUploader({
        template: 'qq-template-gallery',
        request: {
            endpoint: BASE_URL + 'admin/tesis/upload_avatar_file',
            params: {
                '<?= $this->security->get_csrf_token_name(); ?>': '<?=   $this->security->get_csrf_hash(); ?>'
            }
        },
        deleteFile: {
            enabled: true,
            endpoint: BASE_URL + 'admin/tesis/delete_avatar_file'
        },
        thumbnails: {
            placeholders: {
                waitingPath: BASE_URL + 'assets/libraries/fine-upload/placeholders/waiting-generic.png',
                notAvailablePath: BASE_URL + 'assets/libraries/fine-upload/placeholders/not_available-generic.png'
            }
        },
        multiple: false,
        validation: {
            allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
        },
        showMessage: function(msg) {
            toastr['error'](msg);
        },
        callbacks: {
            onComplete: function(id, name) {
                var uuid = $('#user_avatar_galery').fineUploader('getUuid', id);
                $('#user_avatar_uuid').val(uuid);
                $('#user_avatar_name').val(name);
            },
            onSubmit: function(id, name) {
                var uuid = $('#user_avatar_uuid').val();
                $.get(BASE_URL + 'admin/tesis/delete_avatar_file/' + uuid);
            }
        }
    }); /*end image galey*/
}); /*end doc ready*/
</script>
    