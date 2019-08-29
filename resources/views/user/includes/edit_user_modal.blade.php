<div id="edit-user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="form-edit-user" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-email">
                            <strong>Email</strong>
                        </label>
                        <input type="email" id="edit-email" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="edit-name">
                            <strong>Name</strong>
                        </label>
                        <input class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="col-xs-3 control-label">
                            <strong>New password</strong>
                        </label>
                        <div class="col-xs-8">
                            <input id="new_password" type="password" class="form-control" name="new_password" placeholder="Fill when you want to change password (Optional)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="col-xs-3 control-label">
                            <strong>Confirm new password</strong>
                        </label>
                        <div class="col-xs-8">
                            <input id="confirm_password" type="password" class="form-control" name="new_password_confirmation" placeholder="Fill when you want to change password (Optional)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-role">
                            <strong>Role</strong>
                        </label>
                        <select id="edit-role" name="role" class="form-control">
                            <option value="1">User</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>