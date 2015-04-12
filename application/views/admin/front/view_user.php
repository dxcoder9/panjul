
<?php 
if ($this->session->flashdata('pesan')) {
  echo $this->session->flashdata('pesan');
    }

 ?>
 <div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Lab</th>
                <th>Status</th>
                <th>Tanggal daftar</th>
                <th>Masa berlaku</th>
                <th>Aksi</th>
            </tr>
        </thead>
 
       
        <tbody>
        <?php 
        $no = 1; 
        foreach ($ambiluser as $row) {
       
        ?>
              <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->nama_lengkap; ?></td>
              <td><?php echo $row->NIM; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->email; ?></td>     
              <td><?php echo $row->n_level; ?></td>
              <td><?php echo $row->n_lab; ?></td>
              <td><?php echo $row->status; ?></td>
              <td><?php echo $row->tanggal_daftar;?></td>
              <td><?php echo $row->tanggal_expired;?></td>
              <td><a data-toggle=""  data-target="" href="<?php echo base_url('admin/aktifasiuser/'.$row->id_user) ?>">
                <span class="glyphicon glyphicon-ok-sign"></span></a>
                <a  href="<?php echo base_url('admin/blokiruser/'.$row->id_user) ?>">
         <span class="glyphicon glyphicon-remove-sign"></span>
        </a></td>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Set waktu aktifasi</h4>
                  </div>

                  <div class="modal-body">
                   <form class="form-group" method="POST" action="<?php echo base_url('admin/aktifasiuser') ?>">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $row->id_user; ?>">
                    <input class="form-control" type="number" name="set" placeholder="isi masa aktif (dalam bulan)">
                    <input type="submit" value="submit" class="btn btn-primary">
                   </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>
              </div>
            </div>


            </tr>


         

            <?php
          }
            ?>



        </tbody>
    </table>
</div>
<script type="text/javascript">
function myfunction() {
   
$.ajax({    //create an ajax request to load_page.php
    type: "POST",
    url: "http://localhost/pa/index.php/admin/aktifasiuser/",             
    dataType: "html",   //expect html to be returned                
    success: function(response){                    
        swal("Good job!", "You clicked the button!", "success");
        //alert(response);
    }

   });
}


</script>