<?php
// error warning
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open(base_url('admin/user/tambah'));
?>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama User</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
		</div>
		<div class="form-group">
			<label>Level Hak Akses User</label>
			<select name="level" class="form-control select2" style="width: 100%">
				<option value="Administrator">Administrator</option>
				<option value="Pegawai">Pegawai</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary btn-xm float-right" value="Simpan">
		</div>
	</div>
</div>


<?php
//form close
echo form_close();
?>