	<option value="">-- Pilih Satuan --</option>
<?php foreach ($data_satuan as $key => $value_satuan): ?>
	<option value="<?= $value_satuan->id_satuan ?>"><?= $value_satuan->nama_satuan ?></option>
<?php endforeach ?>