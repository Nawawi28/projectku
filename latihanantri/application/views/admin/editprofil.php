<!-- DataTales Example -->
<div class="card-body">
    <div class="table-responsive">
        <?= form_open_multipart('Dataadmin/edit'); ?>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" value="<?= $adm['username']; ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/admin/img/') . $adm['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>


        </form>

    </div>
</div>