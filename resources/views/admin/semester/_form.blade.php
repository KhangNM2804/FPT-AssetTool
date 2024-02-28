@csrf
<div class="row">
    <div class="form-group col-md-4">
        <label for="name">Tên kỳ</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" id="name"
            name="name" value="{{ old('name', $semester->name) }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="start_at">Ngày bắt đầu</label>
        <input class="form-control {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="date" id="start_at"
            name="start_at" value="{{ old('start_at', $semester->start_at) }}">
        @if ($errors->has('start_at'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('start_at') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="end_at">Ngày kết thúc</label>
        <input class="form-control {{ $errors->has('end_at') ? 'is-invalid' : '' }}" type="date" id="end_at"
            name="end_at" value="{{ old('end_at', $semester->end_at) }}">
        @if ($errors->has('end_at'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('end_at') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
