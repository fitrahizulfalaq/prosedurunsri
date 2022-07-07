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
              <label>Judul</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="judul" placeholder="Ex: Pengumuman Bagi Petani" value="<?= set_value('judul');?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="deskripsi" id="summernote" required style="width: 100%"><?php echo form_error('deskripsi')?></textarea>                
              </div>                                                                  
            </div>                        
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>                     
            </div>
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".doc,.docx,.pdf,.ppt,.pptx" name="file">
              <small>Maksimal ukuran file 4 Mb</small>                     
            </div>            
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="created" value="<?= set_value('created');?>" required>
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
            <button id="btn-submit" type="submit" class="btn btn-success" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
