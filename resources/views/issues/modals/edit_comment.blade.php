<div class="modal fade" id="comment-edit" tabindex="-1" role="dialog" aria-labelledby="create-modal-title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="create-modal-title">Edit current comment on ticket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <form id="new-comment-form" method="post" action="">
              @csrf
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="body" class="col-md-8 control-label">Comment Text</label>
                            <div class="col-md-8">
                                <textarea id="body" v-model="body" rows="10" cols="50"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>