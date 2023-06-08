@if(is_permit($routes["delete"]))
    <div class="btn-group pl-1"><button type="button" class="btn btn-danger" onclick="bulkAction('delete')">Delete</button></div>
@endif
@if(is_permit($routes["update"]))
    <div class="btn-group pl-1"><button type="button" class="btn btn-success" onclick="bulkAction('active')">Activate</button></div>
    <div class="btn-group pl-1"><button type="button" class="btn btn-warning" onclick="bulkAction('inactive')">Deactivate</button></div>
@endif
