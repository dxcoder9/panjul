           <div class="box box-primary">
                                <div class="box-header">

                                    <h3 class="box-title">Tambah Shift Praktikum</h3>
                                </div><!-- /.box-header -->
                                    <?php 
                                   if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }else{
                                        echo validation_errors();
                                    } 
                                ?>
                                <!-- form start -->
                                <form method="POST" action="<?php echo base_url('admin/simpanshift'); ?>">

                                    <div class="box-body">
                                       
                                        <div class="form-group">
                                            <label> Pilih Laboratorium</label>
                                            <select name="lab" class="form-control" required>
                                                <option></option>
                                                <?php 
                                                foreach ($ambillab as $key) {
                                                    ?>

                                                    <option value="<?php echo $key->id_lab; ?>" ><?php echo $key->n_lab; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Shift</label>
                                            <select name="shift" class="form-control" required>
                                                <option>-Pilih Shift-</option>
                                                <?php 
                                                $b = 6;
                                                for ($i=1; $i <= $b; $i++) { 
                                                    echo "<option>Shift $i</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                         <div class="bootstrap-timepicker">
                                            <div class="form-group">
                                              <label>Waktu Mulai:</label>
                                              <div class="input-group">
                                                <input name="waktu_mulai" type="text" class="form-control " required/>
                                                <div class="input-group-addon">
                                                  <i class="fa fa-clock-o"></i>
                                                </div>
                                              </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            <div class="form-group">
                                              <label>Waktu Selesai:</label>
                                              <div class="input-group">
                                                <input name="waktu_selesai" type="text" class="form-control " required/>
                                                <div class="input-group-addon">
                                                  <i class="fa fa-clock-o"></i>
                                                </div>
                                              </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                          </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" value="submit" class="btn btn-primary">
                                    </div>
                                </form>



                                <!-- datatable view shift !-->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Shift</th>
                                                    <th>Waktu Mulai</th>
                                                    <th>Waktu Selesai</th>
                                                    <th>Laboratorium</th>
                                                    <th>Aksi</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($ambilshift as $key) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $key->n_shift ?></td>
                                                    <td><?php echo $key->waktu_mulai; ?></td>
                                                    <td><?php echo $key->waktu_selesai; ?></td>
                                                    <td><?php echo $key->n_lab; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/hapusshift/'.$key->id_shift) ?>"><span class="glyphicon glyphicon-remove"></span></a>
                                                        <a href="#editModal<?php echo $key->id_shift;?>" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
                                                    </td>


                                                  <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $key->id_shift;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                                    $id = $key->id_shift;
                                                                    $data = $this->shift_model->ambilShiftUser($id);
                                                                    foreach ($data as $value) {
                                                            ?>
                                                            <form method="POST" action="<?php echo base_url('admin/updateshift');?>">
                                                            <div class="form-group">
                                                                <label> Pilih Laboratorium</label>
                                                                <input type="hidden" value="<?php echo $value->id_shift; ?>" name="id">
                                                                <select name="lab" class="form-control" required>
                                                                    <option></option>
                                                                    <?php 
                                                                    
                                                                    foreach ($ambillab as $key) {
                                                                        ?>

                                                                        <option value="<?php echo $key->id_lab; ?>"
                                                                        <?php
                                                                        if ($key->id_lab == $value->lab) {
                                                                            echo "selected";
                                                                        }

                                                                        ?> 

                                                                            ><?php echo $key->n_lab; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pilih Shift</label>
                                                                <select name="shift" class="form-control" required>
                                                                    <option>-Pilih Shift-</option>
                                                                    <?php 
                                                                    $b = 6;
                                                                    for ($i=1; $i <= $b; $i++) { 
                                                                    ?>
                                                                    <option
                                                                        <?php
                                                                        if ($value->n_shift == "Shift $i") {
                                                                            echo "selected";
                                                                        }
                                                                        ?>
                                                                    ><?php echo "Shift $i"; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                             <div class="bootstrap-timepicker">
                                                                <div class="form-group">
                                                                  <label>Waktu Mulai:</label>
                                                                  <div class="input-group">
                                                                    <input name="waktu_mulai" type="text" class="form-control " value="<?php echo $value->waktu_mulai; ?>"required/>
                                                                    <div class="input-group-addon">
                                                                      <i class="fa fa-clock-o"></i>
                                                                    </div>
                                                                  </div><!-- /.input group -->
                                                                </div><!-- /.form group -->
                                                                <div class="form-group">
                                                                  <label>Waktu Selesai:</label>
                                                                  <div class="input-group">
                                                                    <input name="waktu_selesai" type="text" class="form-control " value="<?php echo $value->waktu_selesai; ?>"required/>
                                                                    <div class="input-group-addon">
                                                                      <i class="fa fa-clock-o"></i>
                                                                    </div>
                                                                  </div><!-- /.input group -->
                                                                </div><!-- /.form group -->
                                                              </div>
                                                              <div class="form-group">
                                                                <input type="submit" value="update" class="btn btn-success">
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
                                </div>
                            </div><!-- /.box -->
                            