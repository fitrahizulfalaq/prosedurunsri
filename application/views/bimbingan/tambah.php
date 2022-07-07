<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('bantuan');?>" class="btn btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Topik ini untuk kelas</label>
              <select class="form-control" name="kelas_id" required>
                <option value="<?= set_value('kelas_id');?>">Pilihan : <?= set_value('kelas_id');?></option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_kelas")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->judul?></option>
                <?php }?>
              </select>                
              <?php echo form_error('kelas_id')?>
            </div>
            <div class="form-group">
              <label>Judul</label>              
              <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required="" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>              
              <textarea class="form-control" rows="3" name="deskripsi" required="" style="width: 100%"><?= set_value('deskripsi');?></textarea>
              <?php echo form_error('deskripsi')?>                        
            </div>                                                                   
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>