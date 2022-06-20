   <!-- Begin Page Content -->
   <div class="container-fluid">
   	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   		<h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
   		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   	</div>
   	<div class="row">
   		<div class="col-xl-12 col-lg-5">
   			<div class="card shadow mb-4">
   				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   					<!-- <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6> -->
   					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user"><i class="fas fa-folder-plus"></i> <b>Tambah Satuan</b></button>
   				</div>
   				<div class="card-body">
   					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
   					<?php echo $this->session->flashdata('msg'); ?>
   					<?php if (validation_errors()) { ?>
   						<div class="alert alert-danger">
   							<strong><?php echo strip_tags(validation_errors()); ?></strong>
   							<a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
   						</div>
   					<?php } ?>
   					<div class="table-responsive">
   						<table class="table table-bordered" id="table-id">
   							<thead>
   								<th>#</th>
   								<th>Kode Satuan</th>
   								<th>Nama Satuan</th>
   								<th>Status</th>
   								<th>Edit</th>
   							</thead>
   							<tbody>
   								<?php $i = 1; ?>
   								<?php foreach ($list_satuan as $lu) : ?>
   									<tr>
   										<td><?php echo $i++; ?></td>
   										<td><?php echo $lu['kode_satuan']; ?></td>
   										<td><?php echo $lu['nama_satuan']; ?></td>
   										<?php if ($lu['satuan_aktif'] == 1) : ?>
   											<td class="text-center font-weight-bolder">Aktif</td>
   										<?php else : ?>
   											<td class="text-center text-red font-weight-bolder"><span class="badge badge-danger text-black" style="font-size:13px;">Tidak Aktif</span></td>
   										<?php endif; ?>
   										<td><a href="#" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $lu['id_satuan']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i> Edit</a></td>
   									</tr>
   								<?php endforeach; ?>
   							</tbody>
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="add-user">
   	<div class="modal-dialog">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h4 class="modal-title">Tambah Satuan</h4>
   			</div>
   			<div class="modal-body">
   				<div class="box-body">
   					<form action="<?php echo base_url('admin/mst_satuan'); ?>" method="post">
   						<div class="form-group">
   							<label>Kode Satuan</label>
   							<input type="text" class="form-control form-control-sm" name="kode_satuan" required>
   						</div>
   						<div class="form-group">
   							<label>Nama satuan</label>
   							<input type="text" class="form-control form-control-sm" name="nama_satuan" required>
   						</div>
   						<div class="box-footer">
   							<button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
   							<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
   						</div>
   					</form>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>

   <div class="modal fade" id="edit-user">
   	<div class="modal-dialog">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h4 class="modal-title">Edit Satuan</h4>
   			</div>
   			<div class="modal-body">
   				<div class="box-body">
   					<form action="<?php echo base_url('admin/edit_satuan'); ?>" method="post">
   						<div class="form-group">
   							<label>Kode Satuan</label>
   							<input type="hidden" name="id_satuan" id="id_satuan">
   							<input type="text" class="form-control form-control-sm" id="kode_satuan" readonly>
   						</div>
   						<div class="form-group">
   							<label>Nama satuan</label>
   							<input type="text" class="form-control form-control-sm" name="nama_satuan" id="nama_satuan" required>
   						</div>
   						<div class="form-group">
   							<div class="form-check">
   								<input class="form-check-input" type="radio" name="satuan_aktif" value="1" checked>
   								<label class="form-check-label">Aktif</label>
   							</div>
   							<div class="form-check">
   								<input class="form-check-input" type="radio" name="satuan_aktif" value="0">
   								<label class="form-check-label">Tidak Aktif</label>
   							</div>
   						</div>
   						<div class="box-footer">
   							<button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
   							<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
   						</div>
   					</form>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>


   <script>
   	$('.tombol-edit').on('click', function() {
   		const id_satuan = $(this).data('id');
   		$.ajax({
   			url: '<?php echo base_url('admin/get_satuan'); ?>',
   			data: {
   				id_satuan: id_satuan
   			},
   			method: 'post',
   			dataType: 'json',
   			success: function(data) {
   				$('#nama_satuan').val(data.nama_satuan);
   				$('#kode_satuan').val(data.kode_satuan);
   				$('#id_satuan').val(data.id_satuan);
   			}
   		});
   	});
   </script>
