@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="room-name">Loại phòng</label>
        <input type="text" name="name" id="room-name" value="{{ old('name', $category_rooms->name) }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6 " style="margin-top: 40px">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"
            @if(old('status', $category_rooms->status) == 1) checked @endif>
            <label class="form-check-label" for="inlineRadio1">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0"
            @if(old('status', $category_rooms->status) == 0) checked @endif>
            <label class="form-check-label" for="inlineRadio2">Ngừng hoạt động</label>
        </div>
        @if ($errors->has('status'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
