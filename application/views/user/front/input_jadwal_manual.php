           <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tambah jadwal</h3>           
                </div><!-- /.box-header -->
                                    <?php 
                                   if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }else{
                                        echo validation_errors();
                                    } 
                                ?>
                    <!-- form start -->
                    <form method="POST" action="<?php echo base_url('user/simpanjadwal'); ?>">
                        <div class="box-body">
                            <div class="form-group form-hari">
                                <label >Pilih Hari</label>
                                    <select name="hari[]">
                                        <option></option>
                                        <?php
                                        foreach ($ambilhari as $key) {
                                            echo "<option value='$key->id_hari'>$key->n_hari</option>";
                                        }

                                        ?>
                                    </select>
                            </div>
                            <div class="form-group form-shift">
                                <label >Pilih Shift</label>
                                    <select name="shift[]">
                                        <option></option>
                                        <?php
                                        foreach ($ambilshift as $key) {
                                            echo "<option value='$key->id_shift'>$key->n_shift : $key->waktu_mulai - $key->waktu_selesai</option>";
                                        }
                                        ?>

                                    </select>
                            </div>
                            
                        </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input type="submit" value="submit" class="btn btn-primary">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Preview</button>
                    </form>
                                 <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Preview Jadwal</h4>
                                          </div>
                                          <div class="modal-body">
                                            

                                                              <div class="box">
                                                                <div class="box-body no-padding">
                                                                  <table class="table table-striped">
                                                                    <tr>
                                                                      <th style="width: 100px">Shift</th>
                                                                       <?php
                                                                        foreach ($ambilhari as $key) {
                                                                            echo "<th>$key->n_hari</th>";
                                                                        }

                                                                        ?>
                                                                      
                                                                    </tr>
                                                                 <?php
                                                                 foreach ($ambiljadwal as $key) {
                                                                     $hari = $key->hari;
                                                                     $shift = $key->shift;
                                                                 }
                                                                 ?>
                                                                  ?>
                                                                    <tr>
                                                                      <td>7:30 - 9:30</td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "1" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "2" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td><?php
                                                                        if ($hari == "3" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "4" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "5" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "6" && $shift == "1") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    </tr>
                                                              <?php
                                                          
                                                              ?>
                                                                                                                                 <?php
                                                                   for ($i=0; $i < count($ambiljadwal); $i++) { 
                                                                   $hari = $ambiljadwal[$i]->hari;
                                                                   $shift = $ambiljadwal[$i]->shift;
                                                                   
                                                                  ?>
                                                                    <tr>
                                                                      <td>10:00 - 12:30</td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "1" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "2" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td><?php
                                                                        if ($hari == "3" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "4" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "5" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "6" && $shift == "2") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    </tr>
                                                              <?php
                                                          }
                                                              ?>
                                                                                                                                 <?php
                                                                   for ($i=0; $i < count($ambiljadwal); $i++) { 
                                                                   $hari = $ambiljadwal[$i]->hari;
                                                                   $shift = $ambiljadwal[$i]->shift;
                                                                   
                                                                  ?>
                                                                    <tr>
                                                                      <td>13:00 - 15:30</td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "1" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "2" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td><?php
                                                                        if ($hari == "3" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "4" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "5" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "6" && $shift == "3") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    </tr>
                                                              <?php
                                                          }
                                                              ?>
                                                                                                                                 <?php
                                                                   for ($i=0; $i < count($ambiljadwal); $i++) { 
                                                                   $hari = $ambiljadwal[$i]->hari;
                                                                   $shift = $ambiljadwal[$i]->shift;
                                                                   
                                                                  ?>
                                                                    <tr>
                                                                      <td>16:00 - 18:30</td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "1" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                        if ($hari == "2" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                      </td>
                                                                      <td><?php
                                                                        if ($hari == "3" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "4" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "5" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                      <td>
                                                                      <?php
                                                                        if ($hari == "6" && $shift == "4") {
                                                                            echo "<span class='label label-success'>Jaga</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    </tr>
                                                              <?php
                                                          }
                                                          ?>
                                                                  </table>
                                                                </div><!-- /.box-body -->
                                                              </div><!-- /.box -->

                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                                    <!---modal!-->
                            </div>
                   

                             <div class="box-footer">
                                <button class="btn btn-danger add-more">Add more</button>
                            </div>


                             <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Shift</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = "1";
                        foreach ($ambiljadwal as $key ) {
                            
                        
                        ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key->n_hari; ?></td>
                        <td><?php echo $key->n_shift; ?></td>
                        <td> <?php echo $key->waktu_mulai; echo " - "; echo $key->waktu_selesai;?></td>
                        <td>
                          <a href="<?php echo base_url('user/hapusjadwal/'.$key->id_jadwal) ?>" onclick="return confirm()"><span class="glyphicon glyphicon-remove"></span></a>

                          <a href="#editModal<?php echo $key->id_jadwal;?>" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        

                                 <!-- Modal -->
                                    <div class="modal fade" id="editModal<?php echo $key->id_jadwal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Jadwal</h4>
                                          </div>
                                                  <div class="modal-body">

                                                              <div class="box">
                                                                <div class="box-body no-padding">
                                                                <?php
                                                                  $id = $key->id_jadwal;
                                                                  $data = $this->jadwal_model->editjadwal($id);
                                                                  foreach ($data as $key) {
                                                                    ?>

                                                                    <form method="POST" action="<?php echo base_url('user/updatejadwal/'.$id) ?>">

                                                                      <div class="form-group">
                                                                        <label>Pilih Hari</label>
                                                                        <select name="hari" class="form-control">

                                                                           <?php
                                                                              foreach ($ambilhari as $data) {
                                                                                  ?>
                                                                                  <option value="<?php echo $data->id_hari; ?>"
                                                                                    <?php 
                                                                                    if ($key->hari == $data->id_hari) {
                                                                                      echo "selected";
                                                                                    }
                                                                                    ?>
                                                                                    ><?php echo $data->n_hari; ?></option>";

                                                                                  <?php
                                                                              }

                                                                              ?>
                                                                        </select>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <label>Pilih Shift</label>
                                                                        <select name="shift" class="form-control">

                                                                           <?php
                                                                              foreach ($ambilshift as $data) {
                                                                                  ?>
                                                                                  <option value="<?php echo $data->id_shift; ?>"
                                                                                    <?php 
                                                                                    if ($key->shift == $data->id_shift) {
                                                                                      echo "selected";
                                                                                    }
                                                                                    ?>
                                                                                    ><?php echo $data->n_shift; echo " : "; echo $data->waktu_mulai; echo " - "; echo $key->waktu_selesai;?></option>";

                                                                                  <?php
                                                                              }

                                                                              ?>
                                                                        </select>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input type="submit" class="btn btn-success" value="update">
                                                                      </div>

                                                                    </form>

                                                                    <?php
                                                                  }
                                                                  ?>

                                                                </div><!-- /.box-body -->
                                                              </div><!-- /.box -->

                                                </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                                    <!---modal!-->



                      </tr>
                      <?php
                  }
                      ?>
                  </tbody>
              </table>

            </div><!-- /.box -->
   <script type="text/javascript">
   function confirm(){
   swal({   title: "Are you sure?",   
    text: "You will not be able to recover this imaginary file!",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes, delete it!",   
    cancelButtonText: "No, cancel plx!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
      if (isConfirm) {    
       swal("Deleted!", 
        "Your imaginary file has been deleted.", "success");   
     } else {    
      swal("Cancelled", "Your imaginary file is safe :)", "error");   
    } 
  });
}
   </script>