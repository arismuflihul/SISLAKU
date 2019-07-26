<?php if ($this->session->flashdata('warning')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('warning'); ?>
	</div>
<?php endif; ?>



<table>
		<tr>
			<th>id</th>
			<th>Keterangan</th>
			<th>Debit</th>
			<th>Kredit</th>
			<th>Bulan</th>
			<th>Tahun</th>
		</tr>
    <?php foreach($laporan as $key) { ?>
		<tr>
	    	<td><?php echo $key->id_laporan ?></td>
			<td><?php echo $key->ket ?></td>
			<td><?php echo $key->debit ?></td>
			<td><?php echo $key->kredit ?></td>
			<td><?php echo $key->bulan_id_bulan ?></td>
			<td><?php echo $key->bulan_tahun_id_tahun ?></td>
		</tr>
	<?php } ?>

</table>

<?php
foreach ($array as $row){

echo form_open();
$id_laporan = array('name' => 'id_laporan');
echo form_hidden($id_laporan);
$ket = array('name' => 'ket',
			'placeholder'=> 'Keterangan',
			'required' => 'required');
echo form_input($ket);
$ket = array('name' => 'ket',
			'placeholder'=> 'Debit',
			'required' => 'required');
echo form_input($ket);
$ket = array('name' => 'ket',
			'placeholder'=> 'Kredit',
			'required' => 'required');
echo form_input($ket);
$bulan = array('name' => 'ket',
			'placeholder'=> 'bulan',
			'required' => 'required');
echo form_input($bulan);
$tahun = array('name' => 'ket',
			'value' => '<?php echo $row->bulan;?>',
			'placeholder'=> 'tahun',
			'required' => 'required');
echo form_input($tahun);
echo form_submit('submit', 'Insert');
echo form_close();

}
?>


