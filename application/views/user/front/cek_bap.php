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
                                ?>
    <form method="POST" action="<?php echo base_url('user/kirimbap'); ?>">	
    <table class="table table-hover">
    	<thead>
			<tr>
				<th>NO</th>
				<th>Tanggal Praktikum</th>
				<th>Waktu Presensi</th>
				<th>Kelas</th>
				<th>Kelompok</th>
				<th>Deskripsi</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($ambilbap as $key) {
			

			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $key->tanggal_presensi; ?></td>
				<td><?php echo $key->waktu_presensi; ?></td>
				<td><?php echo $key->kelas; ?></td>
				<td><?php echo $key->kelompok; ?></td>
				<td><?php echo $key->judul_praktikum; ?></td>
				<input type="hidden" name="id_presensi[]" value="<?php echo $key->id_presensi; ?>">
			</tr>

			<?php
			}

			?>

			<tr>
				<?php
				$hitung = count($ambilbap);

				$honor = $hitung * 10000;
				$jumlah_des = 2;
				$pemisah_des = ",";
				$pemisah_ribu = ".";

				?>
				<input type="hidden" name="honor" value="<?php echo $honor; ?>">
				<td><b>Total Honor :</b></td>
				<td colspan="5"><b><?php echo "Rp ".number_format($honor,$jumlah_des,$pemisah_des,$pemisah_ribu);?></b></td>
			</tr>
		</tbody>

	</table>
	<input type="submit" value="kirim BAP" class="btn bg-olive btn-flat margin">
	</form>
</div>                