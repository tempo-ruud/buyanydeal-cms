<div class="form-group">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-control custom-select">
        <option value="0" @if($status == 0) selected="selected" @endif>Disable</option>
        <option value="1" @if($status == 1) selected="selected" @endif>Enable</option>
    </select>
</div>