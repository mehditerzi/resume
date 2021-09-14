<div class="modal fade" id="_<?php print $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="_<?php print $row['id'];?>"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proje Düzenle</h5>
                <button id="closeModal" class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form theme-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sliderYear<?php print $row['id'];?>">Yıl</label>
                                    <input class="form-control" id="sliderYear<?php print $row['id'];?>" type="text" placeholder="Proje ismini girin" value="<?php print $row['date'];?>">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sliderText<?php print $row['id'];?>">Yazı</label>
                                    <textarea class="form-control" id="sliderText<?php print $row['id'];?>" rows="3"><?php print $row['text'];?></textarea>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="changeSlider('<?php print $row['id'];?>')" data-dismiss="modal"
                    type="button">Kaydet</button>
            </div>
        </div>
    </div>
</div>