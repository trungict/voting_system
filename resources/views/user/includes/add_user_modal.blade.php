<div id="add-user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="form-add-user" action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">
                            <strong>Email</strong>
                        </label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <strong>Name</strong>
                        </label>
                        <input class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-xs-3 control-label">
                            <strong>Password</strong>
                        </label>
                        <div class="col-xs-8">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="col-xs-3 control-label">
                            <strong>Confirm password</strong>
                        </label>
                        <div class="col-xs-8">
                            <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">
                            <strong>Role</strong>
                        </label>
                        <select id="role" name="role" class="form-control">
                            <option value="1">User</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>