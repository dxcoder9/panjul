           

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Berita Acara Pelaksanaan Praktikum</h3>           
                </div><!-- /.box-header -->
                        <?php 
                                   if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }else{
                                        echo validation_errors();
                                    } 
                                
                     if (empty($cekpresensi)) {
                       ?>

                              
                                    <form method="post" action="<?php echo base_url('user/prosespresensi') ?>">
                                        <div class="form-group">
                                          <label>Kelas</label>
                                          <input type="text" name="kelas" class="form-control" placeholder="kelas" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Kelompok</label>
                                          <input type="text" class="form-control" name="kelompok" placeholder="kelompok" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Judul Praktikum</label>
                                          <input type="text" class="form-control" name="judul_praktikum" placeholder="judul kegiatan" required>
                                        </div>
                                 
                                        <div class="form-group col col-md-3">
                                        <select name="kehadiran" class="form-control">
                                          <option> </option>
                                          <option value="Hadir">Hadir</option>
                                          <option value="Tidak hadir">Tidak hadir</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <input type="submit" class="btn bg-navy btn-flat margin" value="update">
                                      </div>

                                      </form>


                       <?php
                     }else{

                       
                          if ($cekpresensi) {
                            echo "sudah ada";
                            
                            foreach ($cekpresensi as $key) {
                              
                            ?>
                            <a href="#editModal<?php echo $key->id_presensi;?>" data-toggle="modal" >edit data</a>
                            
                                                  <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $key->id_presensi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Perbarui Berita Acara Pelaksanaan Praktikum</h4>
                                                  </div>
                                                       <div class="modal-body">
                                                         <div class="box">
                                                          <div class="box-body no-padding">
                                                           <?php 
                                                                               if ($this->session->flashdata('pesan')) {
                                                                                    echo $this->session->flashdata('pesan');
                                                                                }else{
                                                                                    echo validation_errors();
                                                                                } 
                                                                            ?>
                                                            <form method="post" action="<?php echo base_url('user/updatepresensi') ?>">
                                                              <input type="hidden" value="<?php echo $key->id_presensi; ?>" name="id_presensi">
                                                              <?php
                                                              $id_presensi = $key->id_presensi;
                                                              $ambilpresensi = $this->presensi_model->ambildata($id_presensi);

                                                              foreach ($ambilpresensi as $key ) {
                                                              

                                                              ?>  

                                                                <div class="form-group">
                                                                  <label>Kelas</label>
                                                                  <input type="text" name="kelas" class="form-control" value="<?php echo $key->kelas; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label>Kelompok</label>
                                                                  <input type="text" class="form-control" name="kelompok" value="<?php echo $key->kelompok; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label>Deskripsi Kegiatan</label>
                                                                  <textarea class="form-control" name="judul_praktikum" required>
                                                                    <?php echo $key->judul_praktikum; ?>
                                                                  </textarea>
                                                                </div>
                                                         
                                                                
                                                              <div class="form-group">
                                                                <input type="submit" class="btn bg-navy btn-flat margin" value="update">
                                                              </div>
                                                              <?php

                                                            }
                                                            ?>
                                                              </form>
                                                          </div><!-- /.box-body -->
                                                         </div><!-- /.box -->
                                                       </div>                                  
                                                </div>
                                              </div>
                                            </div>
                                    <!---modal!-->

                        <?php
                          }
                        }
                      }

                        ?>


                                </div>
            