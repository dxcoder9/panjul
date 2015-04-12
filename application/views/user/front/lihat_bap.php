<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Berita Acara Praktikum</h3>           
    </div><!-- /.box-header -->
     <?php 
            if ($this->session->flashdata('pesan')) {
                 echo $this->session->flashdata('pesan');
            }else{
                 echo validation_errors();
            } 
   	
   	if (empty($ambildatapresensi)) {
     ?>

     Tidak ada data

     <?php
 	}else{
     ?>


    <table class="table table-hover">
    	<thead>
			<tr>
				<th>NO</th>
				<th>Tanggal Praktikum</th>
				<th>Kelas</th>
				<th>Deskripsi</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
			
			$no = 1;

			for ($z=0; $z < count($ambildatapresensi); $z++) { 
				
			foreach ($ambildatapresensi[$z] as $key ) {
		
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key->tanggal_presensi; ?></td>
					<td><?php echo $key->kelas; ?></td>
					<td><?php echo $key->judul_praktikum; ?></td>	
				</tr>
			<?php

			}
		}
			?>

			<?php
			foreach ($ambilbap as $key) {
				$honor = $key->honor;

				$jumlah_des = 2;
				$pemisah_des = ",";
				$pemisah_ribu = ".";

			?>
			<tr>
				<td colspan="3"><b>Total Honor :</b></td>
				<td><b><?php echo "Rp ".number_format($honor,$jumlah_des,$pemisah_des,$pemisah_ribu);?></b></td>
				
			</tr>
			<tr>
				<td colspan="3"><b>Status :</b></td>
				<td><?php echo $key->status_bap; ?></td>
			</tr>
			<tr>
				<td colspan="4">
					<?php
					if ($key->status_bap == "acc") {
					?>

					<form action="<?php echo base_url('user/cetakbap'); ?>" method="post">
						<?php
						$no = 1;

			for ($z=0; $z < count($ambildatapresensi); $z++) { 
				
						foreach ($ambildatapresensi[$z] as $key ) {
					
						?>
								<input type="hidden" name="no[]" value="<?php echo $no++; ?>">
								<input type="hidden" name="tanggal_presensi[]" value="<?php echo $key->tanggal_presensi; ?>">
								<input type="hidden" name="kelas[]" value="<?php echo $key->kelas; ?>">
								<input type="hidden" name="deskripsi[]" value="<?php echo $key->judul_praktikum; ?>">	
								
						<?php

						}
					}
					?>
					<?php
						foreach ($ambilbap as $key) {
							$honor = $key->honor;

							$jumlah_des = 2;
							$pemisah_des = ",";
							$pemisah_ribu = ".";

						?>
						
						<input type="hidden" name="nama" value="<?php echo $key->nama_lengkap; ?>">
						<input type="hidden" name="pengajuan" value="<?php echo $key->tanggal_pengajuan; ?>">
						<input type="hidden" name="honor" value="<?php echo 'Rp '.number_format($honor,$jumlah_des,$pemisah_des,$pemisah_ribu);?>">
						<?php
						}
						?>
						<input type="submit" value="cetak bap" class="btn bg-olive btn-flat margin">
					
					</form>


					<?php
					}
					?>
				</td>
			</tr>
			

			<?php
			}
			?>
		</tbody>

	</table>
	<?php

	}
	?>
	
	</form>
</div>                