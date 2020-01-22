<form action="<?=base_url('pengawas/create');?>" method="post" class="form-horizontal">
  <div class="box-body">
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" required>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-flat pull-right" title="Simpan Data Pengawas">Simpan</button>
  </div> 
  <!-- /.box-footer -->
</form>
