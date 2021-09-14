<div class="modal fade" id="_<?php print $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="_<?php print $row['id'];?>"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kullanıcı Düzenle</h5>
                <button id="closeModal" class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form theme-form">
                    <div class="row m-b-30">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="userName<?php print $row['id'];?>">Kullanıcı Adı</label>
                          <input id="userName<?php print $row['id'];?>" class="form-control" type="text" placeholder="Adı Soyadı" value="<?php print $row['username'];?>">
                        </div>
                        <div class="form-group">
                          <label for="userPassword<?php print $row['id'];?>">Kullanıcı Şifre</label>
                          <div class="input-group">
                            <div class="input-group-prepend" id="passwordIcon" ><span class="input-group-text" id="inputGroupPrepend"><i
                                  style="cursor: pointer;" class="fa fa-eye"></i></span></div>
                            <input class="form-control" id="userPassword<?php print $row['id'];?>" type="password" placeholder="Şifre"
                              aria-describedby="inputGroupPrepend">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="userMail<?php print $row['id'];?>">Kullanıcı Email</label>
                          <input id="userMail<?php print $row['id'];?>" class="form-control" type="email" placeholder="info@gosamplewebsite.com" value="<?php print $row['mail'];?>">
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="updateUser('<?php print $row['id'];?>')" data-dismiss="modal"
                    type="button">Kaydet</button>
            </div>
        </div>
    </div>
</div>