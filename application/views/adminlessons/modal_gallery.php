<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Galeria</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php foreach ($gallery as $g): ?>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <img src="<?= base_url().'assets/img/'.$g->file_name.$g->file_type ?>" alt="<?= $g->file_name ?>" onclick="url_imagen(this)" class="img-fluid">
          </div>
          <?php endforeach ?>
        </div>
        </div>
      </div>
    </div>
  </div>