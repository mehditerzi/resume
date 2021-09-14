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
                                    <label for="projectName<?php print $row['id'];?>">Proje İsmi</label>
                                    <input class="form-control" id="projectName<?php print $row['id'];?>" type="text"
                                        placeholder="Proje ismini girin" value="<?php print $row['name'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="projectCategory<?php print $row['id'];?>">Proje Kategorisi</label>
                                    <select class="form-control digits" id="projectCategory<?php print $row['id'];?>">
                                        <option <?php if ($row['category'] == "Tamamlandı")print "selected";?> selected value="Tamamlandı">Tamamlanan</option>
                                        <option <?php if ($row['category'] == "Devam Ediyor")print "selected";?> value="Devam Ediyor">Devam Eden</option>
                                        <option <?php if ($row['category'] == "Gelecek Proje")print "selected";?> value="Gelecek Proje">Gelecek Projeler</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="projectImages<?php print $row['id'];?>">Proje Resmi</label>
                                    <input id="projectImages<?php print $row['id'];?>" name="projectImages<?php print $row['id'];?>"
                                        class="form-control" type="file" accept="image/png, image/jpeg">
                                </div>
                                <div class="form-group">
                                    <label for="projectSlides<?php print $row['id'];?>">Proje Slaytları</label>
                                    <input id="projectSlides<?php print $row['id'];?>" name="projectSlides<?php print $row['id'];?>"
                                           class="form-control" type="file" accept="image/png, image/jpeg" multiple>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectDate<?php print $row['id'];?>">Proje Tarihi</label>
                                    <input class="form-control" id="projectDate<?php print $row['id'];?>" type="date"
                                        value="<?php print $row['date'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="projectLink<?php print $row['id'];?>">Proje Link</label>
                                    <input class="form-control" id="projectLink<?php print $row['id'];?>" type="url"
                                        placeholder="https://www.example.com" value="<?php print $row['link'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="projectLocation<?php print $row['id'];?>">Proje Konumu</label>
                                    <input class="form-control" id="projectLocation<?php print $row['id'];?>" type="text"
                                        placeholder="Taksim / Kadıköy / Göztepe" value="<?php print $row['location'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="projectRoom<?php print $row['id'];?>">Daire Sayısı</label>
                                    <input class="form-control" id="projectRoom<?php print $row['id'];?>" type="text"
                                        placeholder="Oda Sayısı" value="<?php print $row['count'];?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectText<?php print $row['id'];?>">Proje Yazısı</label>
                                    <textarea class="form-control" id="projectText<?php print $row['id'];?>"
                                        rows="3"><?php print $row['text'];?></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $imagequery = $db->query("SELECT * FROM project_images WHERE project_id = ".$row['id'], PDO::FETCH_ASSOC);
                        if ( $imagequery->rowCount() ){
                            foreach( $imagequery as $imgrow ){
                        ?>
                            <tr>
                                <td><img src="<?php print $imgrow['image'];?>" style="width: 70px; height: 70px;" alt=""></td>
                                <td>
                                    <button class="btn btn-outline-danger btn-sm m-5"
                                        onclick="projectImageRemove('<?php print $imgrow['id'];?>')"
                                        type="button">Sil</button>
                                </td>
                            </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="projectChange('<?php print $row['id'];?>')" data-dismiss="modal"
                    type="button">Kaydet</button>
            </div>
        </div>
    </div>
</div>