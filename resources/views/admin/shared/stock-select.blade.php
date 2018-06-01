<div class="form-group">
    <label for="in_stock" class="form-label">Status</label>
    <select id="in_stock" name="in_stock" class="form-control custom-select">
        <option value="0" @if($stock == 0) selected="selected" @endif>Out of stock</option>
        <option value="1" @if($stock == 1) selected="selected" @endif>In stock</option>
    </select>
</div>