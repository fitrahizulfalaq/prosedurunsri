<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('info');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                <input type="text" class="form-control" name="judul" placeholder="Ex: Pendataan Keanggotaan Alumni" value="<?= $this->input->post('judul') ?? $row->judul ?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="deskripsi" required="" id="summernote" style="width: 100%"><?= $this->input->post('deskripsi') ?? $row->deskripsi ?></textarea>                
              </div>                                                                  
            </div>            
            <?php if($row->foto != null) {?>
            <div>
              <img src="<?=base_url('assets/dist/img/foto-info/'.$row->foto)?>" style="width: 80%"><br>
              <input type="hidden" name="foto" value="<?= $this->input->post('foto') ?? $row->foto; ?>">
              <a href="<?= site_url('info/hapusfoto/'.$row->id);?>"><small>Hapus foto?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>
            <?php if($row->file != null) {?>
            <div>
              <h4>File : <a href="<?= base_url('assets/dist/img/file-info/'.$row->file)?>" class="text-primary"><?= $this->input->post('file') ?? $row->file; ?></h4>
              <a href="<?= site_url('info/hapusfile/'.$row->id);?>"><small>Hapus file?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".doc,.docx,.pdf,.ppt,.pptx" name="file">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>            
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="created" value="<?= $this->input->post('created') ?? date('Y-m-d', strtotime($row->created)); ?>" required>
              </div>                            
              <?php echo form_error('created')?>                        
            </div>            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
