	<option value="">-- Pilih POLRES --</option>
<?php foreach ($data_polres as $key => $value_polres): ?>
	<option value="<?= $value_polres->id_polres ?>"><?= $value_polres->nama_polres ?></option>
<?php endforeach ?>