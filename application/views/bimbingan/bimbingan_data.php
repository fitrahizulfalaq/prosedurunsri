<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <?php $this->view('message'); ?>
      <!-- <div class="card-header">
        <a href="javascript:history.back()" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div> -->

      <div class="card-body">
        <div class="post clearfix">
          <div class="user-block">
					<form action="<?= base_url('bimbingan/tambah_bimbingan')?>" method="POST">
						<input type="hidden" name="user_id" value="<?= $this->uri->segment('5')?>"> 
            <div class="input-group input-group-sm mb-3">
              <textarea name="deskripsi" cols="10" rows="5" class="form-control form-control-sm" required></textarea>
            </div>
            <!-- <div class="input-group input-group-sm mb-3">
              <input type="file" class="form-control form-control-sm" name="file" accept=".jpg,.png,.jpeg,.mp3,.mp4" capture>
            </div> -->
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Tambah Bimbingan</button>
            </div>
						</form>
        </div>
      </div>

      <div class="table-responsive">
      <table class="table" id="kosongan">
        <thead>
        <tr>
          <th hidden>Deskripsi</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($row_t->result() as $key => $data) {;
          ?>
            <tr>              
              <td scope="row" class="<?= $data->reply == $this->session->id ? 'bg-warning' : ''?>">
                <small><?= $data->created?></small>
                <p><?= $data->deskripsi?></p>
                <?php if($data->file != null) {?>
                <div class="text-right">
                  <a href="<?=base_url('assets/dist/img/filebimbingan/'.$data->file)?>" class="text-primary">Lihat Lampiran</a>
                </div>
                <?php } ?>
                <div class="text-right">
                  <?php if ($this->session->id == $data->reply) {?>
                  <a href="<?=base_url('bimbingan/hapus/'.$data->id.'/mentor/'.$data->mentor_id.'/user/'.$data->user_id)?>" class="text-danger">Hapus</a>
                  <?php }?>
                </div>
              </td>                
            </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
    </div>
    </div>    
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --
