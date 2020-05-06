<div class="row">
    <!-- Left col -->
    <div class="col-md-12">
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <a href="<?= site_url('admin/tesis/create') ?>" class="btn btn-sm btn-info btn-flat pull-left" id="add">Tambah data</a>
          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <form name="form_user" id="form_user" action="<?= base_url('admin/tesis/index'); ?>">
          <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <th width="5"><input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all"></th>
                    <th width="50" >Judul Tesis</th>
                    <th>Penulis</th>
                    <th>Pembimbing</th>
                    <th>Tahun</th>
                    <th>Jumah</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <!-- Disini data yang akan di load -->
                    <?php foreach ($content as $row): ?>
                      <tr>
                        <td><input type="checkbox" class="flat-red check" name="delete_id[]" value="<?= $row->id ?>"></td>
                        <td><?= $row->judul ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->pembimbing_satu.' - '. $row->pembimbing_dua ?></td>
                        <td><?= $row->tahun ?></td>
                        <td><?= $row->jumlah_tesis ?></td>
                        <td>

                          
    

                              <a href="<?= base_url('admin/tesis/edit/').$row->id ?>">
                                <button class="btn btn-sm btn-info" type="button">
                                  <i class="fa fa-edit text-info"></i>
                                </button>
                              </a>  

                              <button class="btn btn-sm btn-danger delete" type="button"  data-id = "<?= $row->id ?>">
                                <i class="fa fa-trash text-danger"></i>
                              </button>
                              
                        </td>
                      </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
          </div>
       
          <div class="row">
              <div class="col-md-8">
                  <span>
                        <small>
                            
                        </small>
                  </span>
              </div>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat"  name="apply" id="apply" value="Apply" title="">Apply</button>
                     </div>
                     
                  </div>
                  
                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                       <?= $pagination; ?>
                     </div>
                  </div>
               </div>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    $('.switch-button').switchButton({
        labels_placement: 'right',
        on_label: 'Active',
        off_label: 'Inactive'
    });

    $('#table').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });

    $(document).on('change', 'input.switch-button', function() {
        var status = 'inactive';
        var id = $(this).attr('data-user-id');
        var data = [];

        if ($(this).prop('checked')) {
            status = 'active';
        }

        data.push({
            name: 'status',
            value: status
        });
        data.push({
            name: 'id',
            value: id
        });

        $.ajax({
                url: BASE_URL + '/admin/tesis/set_status',
                type: 'POST',
                dataType: 'JSON',
                data: data,
            })
            .done(function(data) {
                if (data.success) {
                    toastr['success'](data.message);
                } else {
                    toastr['warning'](data.message);
                }

            })
            .fail(function() {
                toastr['error']('Error update status');
            });
    });

   //for delete
    $(document).on('click', '.delete', function(){
       var delete_id = $(this).attr('data-id');
        swal({
                title: "Anda Yakin?",
                text: "data yang di hapus tidak bisa di restore!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus !",
                cancelButtonText: "Tidak !",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                   $.ajax({
                        url :'<?= base_url()?>admin/tesis/delete',
                        type :'POST',
                        dataType: 'json',
                        data: {delete_id:delete_id}, 
                    })

                     .done(function(data){
                        if (data.success ==true) {
                                document.location.href = data.redirect;
                                return;
                        } else {
                            toastr['error'](data.message);   
                        }
                    }) 
                } 
            })
        
    });


    $('#apply').click(function() {

        var bulk = $('#bulk');
        var serialize_bulk = $('#form_user').serializeArray();
        if (bulk.val() == 'delete') {
             swal({
             title: "Anda Yakin ?",
             text: "data yang terpilih akan di hapus dan tidak bisadi rstore ulang !",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Ya, Hapus !",
             cancelButtonText: "Tidak, Kembali !",
             closeOnConfirm: true,
             closeOnCancel: true
         },
                 function(isConfirm) {
                     if (isConfirm) {
                       $.ajax({
                            url :'<?= base_url()?>admin/tesis/delete',
                            type :'POST',
                            dataType: 'json',
                            data: serialize_bulk, 
                        })

                         .done(function(data){
                            if (data.success == true) {
                                document.location.href = data.redirect;
                                    return;
                            } else {
                                toastr['error'](data.message);   
                            }
                        }) 
                    } 
                 });

            return false;

        } else if (bulk.val() == '') {
            swal({
                title: "Upss",
                text: "Pilih salah satu aksi masal terlebih dahulu !",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Okay!",
                closeOnConfirm: true,
                closeOnCancel: true
            });

            return false;
        }

        return false;

    }); /*end appliy click*/

    const checkAll = $('#check_all');
    const checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event) {
        if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
                   

});
</script>
