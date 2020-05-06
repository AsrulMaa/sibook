
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
                        
                       
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET ?>/img/add2.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Form Pengambilan</h3>
                     <h5 class="widget-user-desc">Tesis</h5>
                  </div>

                  
                  
                  <div > 
                    <?= form_open(base_url('admin/rekap/get'), [
                        'name'    => 'form_user', 
                        'class'   => 'form-horizontal', 
                        'id'      => 'form', 
                        'enctype' => 'multipart/form-data', 
                        'method'  => 'POST'
                      ]); 

                      ?>
                      
                      <div class="form-group ">

                        <label for="username" class="col-sm-2 control-label">Judul Tesis<i class="required"></i></label>

                      

                        <div class="col-sm-8">
                          <?= form_dropdown('judul_tesis', getDropdownList('tesis', ['id', 'judul']), '', ['class' => 'form-control select2']); ?>
                            <small class="info help-block">
                             Select one role.
                          </small>
                        </div>

                    </div>

                   
                    
                     <div class="message">
                      
                    </div>

                    <div class="row-fluid col-md-7 ">
                        <button type="submit" class="btn btn-flat btn-info btn_get_data btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Prosess </button>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</a>
                        <span class="loading loading-hide"><img src="<?= BASE_ASSET ?>include/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                     </div>

                  <?= form_close(); ?>
                  </div>
               </div>
             
              
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>

   </div>
   <div class="table-responsive"> 
    <table class="table table-bordered table-striped dataTable">
     <thead class="head-table">
        <tr class="">
           <th>
            #
           </th>
           <th width="100px">Program Studi</th>
           <th width="120px">Matakuliah</th>
           <th width="130px">Dosen</th>
           <th width="100px">Ruangan</th>
           <th>Tanggal</th>
           <th>Action</th>
        </tr>
     </thead>
     <tbody id="tbody_content">
       
     </tbody>
    </table>
  </div>
</section>


<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
  $('.table').hide();

 $('.timepicker').datetimepicker({

           format: 'HH:mm'

          });

            //Date picker

    $('.datepicker').datepicker({

      autoclose: true,

      format: 'yyyy/mm/dd'

    });


    

    

    // $('.btn_get_data').click(function(e){
    //   e.preventDefault(); 

    //       var url = '<?= base_url('admin/rekap/get'); ?>';
    //       var save_type = 'back';
    //       var form = $('#form')[0];

    //        $.ajax({
    //            url: url,
    //            type:"post",
    //            dataType: 'json',
    //            data:new FormData(form),
    //            processData:false,
    //            contentType:false,
    //            cache:false,
    //            async:false,
    //        })

    //         .done(function(data){
    //             $('.table').show();  
    //             // $(res).each(res, function(key, r){
    //             //     // $("table #tbody_content").append($("<tr>"))
    //             //     // .append($("<td>")).append(r.nama_prodi)
    //             //     // .append($("<td>")).append(r.nama_matkul)
    //             //     // .append($("<td>")).append(r.nama_dosen)
    //             //     // .append($("<td>")).append(r.nama_ruangan)
    //             //     // .append($("<td>")).append(r.tanggal)
    //             //       console.log(r)


    //             // });

    //             $.each(data, function(i, items) {
    //                $.each(data, function(items, item) {
    //                 console.log(item.nama_prodi);
    //               });
    //             });
                 
    //         }) 
    // }); 

    // function reset() {
       
    // } 


     //for delete
    $(document).on('click', '#delete', function(){
        var user_id = $(this).attr('data-id');
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
                        url :'<?= base_url()?>admin/jadwal/delete',
                        type :'POST',
                        dataType: 'json',
                        data: {user_id:user_id}, 
                    })

                     .done(function(data){
                        
                        console.log(data.success);
                        if (data.success) {
                               $('.box-form').addClass('hide');
                                table.ajax.reload(null,false);
                                toastr['success'](data.message);   
                                return;
                            
                            
                        } 
                    }) 
                } 
            })
        
    });

    $(document).on('click', '#edit', function(){
      $('#modal_form').modal('show'); 
        $('.modal-title').text('Edit Jadwal');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/jadwal/get_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=id]').val(res.message.id);
                $('[name=semester]').val(res.message.semester);
                $('[name=nama_prodi]').val(res.message.nama_prodi).change();
                $('[name=nama_matkul]').val(res.message.nama_matkul).change();
                $('[name=nama_ruangan]').val(res.message.kode_ruangan).change();
                $('[name=nama_dosen]').val(res.message.nama_dosen).change();
                $('[name=dosen_pengganti]').val(res.message.dosen_pengganti).change();
                $('[name=jam_mulai]').val(res.message.jam_mulai);
                $('[name=jam_berakhir]').val(res.message.jam_berakhir);
                $('[name=tanggal]').val(res.message.tanggal);
                $('[name=jml_mahasiswa]').val(res.message.jml_mahasiswa);






                $('#btnSave').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        });

        
    });

    $('#btn_rekap').click(function(event) {
      /* Act on the event */

      $('#modal_rekap').modal('show');
    
    });


    // $('#rekap_btn').click(function(event) {
    //   /* Act on the event */
    //   var form_rekap = $('#form_rekap');
    //   var data_post = form_rekap.serializeArray();
    //   var save_type = $(this).attr('data-stype');

    //   $.ajax({
    //     url: BASE_URL + 'admin/jadwal/rekap_mengajar',
    //     type: 'POST',
    //     dataType: 'JSON',
    //     data: data_post,
    //   })
    //   .done(function(res) {
    //     console.log(res.message);
    //   })
    //   .fail(function() {
    //     console.log("error");
    //   })
    //   .always(function() {
    //     console.log("complete");
    //   });
      

    // });
     

    
});
</script>

<div class="modal fade" id="modal_rekap" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Rekap Data</h3>
            </div>
            <div class="modal-body  form-horizontal">
                <?= form_open('', [
                    'name'    => 'form_rekap', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_rekap', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <input type="hidden" name="id">
                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Dosen <i class="required"></i></label>
                        <div class="col-sm-8">
                         
                        </div>

                    </div>
              



                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Tanggal <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal" value="" class="form-control pull-right datepicker" id="">
                            </div>
                          
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Range <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="range" value="" class="form-control pull-right datepicker" id="">
                            </div>
                        </div>
                    </div>
                    

                  <?= form_close(); ?>
                  
                  
            </div>
            <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Calculating data ... </i></span>
                <button type="submit" class="btn btn-flat btn-info  " id="rekap_btn" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Rekap Data</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default " id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->