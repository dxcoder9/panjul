           <div class="box box-primary">
                                <div class="box-header">

                                    <h3 class="box-title">Tambah Administrator Laboratorium</h3>
                                </div><!-- /.box-header -->
                                    <?php 
                                   if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }else{
                                        echo validation_errors();
                                    } 
                                ?>
                                <!-- form start -->
            <?php echo form_open_multipart('admin/simpandataadmin');?>

                                    <div class="box-body">
                                        
                                        
                                        <div class="form-group">
                                            <label f>Nama lengkap</label>
                                            <input type="text" class="form-control"  name="nama_lengkap" placeholder="Nama lengkap">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label >Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label >Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label >Laboratorium</label>
                                             <select class="form-control" name="lab">
                                                <?php

                                                foreach ($ambil as $key) {
                                                    ?>

                                                    <option value="<?php echo $key->id_lab ?>"><?php echo $key->n_lab; ?></option>

                                                    <?php
                                                }

                                                ?>

                                              
                                             </select>
                                        </div>
                                        !-->
                                        <div class="form-group">
                                            <label >Foto profil</label>
                                            <input type="file" name="foto">
                                            <p class="help-block">Bisa diisi nanti</p>
                                        </div>
                                        
                                        
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" value="submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div><!-- /.box -->
