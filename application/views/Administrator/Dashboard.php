
<?php
echo heading('Ini Halaman Admin','2');
echo anchor('Auth/logout','Logout');

echo form_open('Laporan/Search', array ('method' => 'POST'));
?>
</select>
    <select name="bulan_tahun_id_tahun">
        <option value="bulan_tahun_id_tahun">Please Select</option>
    <?php
        $now = date('Y');
        for ($i = $now; $i >= 2010; $i--) {
            echo "<option value=$i> $i </option>";
        }
    ?>
</select>

<?php
$option = array('' => 'Please Select',
                '1' => 'Januari',
                '2' => 'Februari',
                '3' => 'Maret',
                '4' => 'April',
                '5' => 'Mei',
                '6' => 'Juni',
                '7' => 'Juli',
                '8' => 'Agustus',
                '9' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',);
echo form_dropdown('bulan_id_bulan' , $option);
?>
<?php
echo form_submit('submit','Search');
echo form_close();

?>

<?php if ($this->session->flashdata('warning')): ?>
	<div class="alert alert-success" role="alert">
    	<?php echo $this->session->flashdata('warning'); ?>
	</div>
<?php endif; ?>
