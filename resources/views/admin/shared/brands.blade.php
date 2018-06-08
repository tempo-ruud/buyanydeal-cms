<ul class="list-unstyled row">
    @foreach($brands as $brand)
        <li class="col-4">
            <div class="form-group">
                <div class="custom-controls-stacked">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input
                                type="radio"
                                @if(isset($selectedIds) && in_array($brand->id, $selectedIds))checked="checked" @endif
                                name="brands[]"
                                class="custom-control-input"
                                value="{{ $brand->id }}">

                        <span class="custom-control-label">{{ $brand->name }}</span>
                    </label>
                </div>
            </div>
        </li>
    @endforeach
</ul>