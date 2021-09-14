<div class="modal fade" id="<?php print $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php print $row['id'];?>"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Slider Düzenle</h5>
                <button id="closeModal" class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form class="theme-form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group input-group-solid">
                                <label class="col-form-label pt-0" for="sliderHeader<?php print $row['id'];?>">Slider Başlığı</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" tabindex="1" id="sliderHeader<?php print $row['id'];?>"
                                        value="<?php print $row['header'];?>">
                                </div>
                            </div>
                            <div class="form-group input-group-solid">
                                <label class="col-form-label pt-0" for="sliderSubHeader<?php print $row['id'];?>">Slider Alt Başlığı</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" tabindex="2"
                                        id="sliderSubHeader<?php print $row['id'];?>" value="<?php print $row['subheader'];?>">
                                </div>
                            </div>
                            <div class="form-group input-group-solid">
                                <label for="sliderButtonText<?php print $row['id'];?>">Slider Buton Yazısı</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="sliderButtonText<?php print $row['id'];?>"
                                        tabindex="3" value="<?php print $row['buttonlink'];?>">
                                </div>
                            </div>
                            <div class="form-group input-group-solid">
                                <label for="sliderButtonText<?php print $row['id'];?>">Slider Buton Linki</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="sliderButtonLink<?php print $row['id'];?>"
                                        tabindex="3" value="<?php print $row['buttontext'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="sliderChange('<?php print $row['id'];?>')" data-dismiss="modal"
                    type="button">Kaydet</button>
            </div>
        </div>
    </div>
</div>