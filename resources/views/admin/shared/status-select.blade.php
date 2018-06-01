<div class="form-group">
    <label for="is_active" class="form-label">Status</label>
    <select id="is_active" name="is_active" class="form-control custom-select">
        <option value="0" @if($status == 0) selected="selected" @endif>Disable</option>
        <option value="1" @if($status == 1) selected="selected" @endif>Enable</option>
    </select>
</div>