<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $user->id_user ?>">
  <i class="fa fa-trash-alt"></i> Delete
</button>

<div class="modal fade" id="Delete<?php echo $user->id_user ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Menghapus data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin akan menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
          <i class="fa fa-backward"></i> Tidak, batalkan</button>
        <a href="<?php echo base_url('admin/user/delete/' . $user->id_user) ?>" class="btn btn-danger pull-right">
          <i class="fa fa-trash-alt"></i> Ya, Hapus Data ini
        </a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->