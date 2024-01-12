@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label class="form-label" for="name"></label>
        <input id="name" name='name' type="text" value="{{ old('name', $category_asset->name) }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6" style="margin-top: 40px">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="active" value="1"
                {{ old('status', $category_asset->status) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inactive" value="0"
                {{ old('status', $category_asset->status) == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="inactive">Ngừng hoạt động</label>
        </div>
    </div>
</div>
<div>
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
