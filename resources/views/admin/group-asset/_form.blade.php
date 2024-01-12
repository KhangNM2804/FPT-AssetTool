@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="name">Nhóm sản phẩm</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" id="name"
            name="name" value="{{ old('name', $group->name) }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6" style="margin-top: 40px">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="active" value="1"
                {{ old('status', $group->status) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inactive" value="2"
                {{ old('status', $group->status) == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="inactive">Ngừng hoạt động</label>
        </div>
        @if ($errors->has('status'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
