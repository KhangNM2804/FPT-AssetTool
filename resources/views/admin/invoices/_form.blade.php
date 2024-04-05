@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="denominator">Mẫu số</label>
        <input class="form-control {{ $errors->has('denominator') ? 'is-invalid' : '' }}" type="text" id="denominator"
            name="denominator" value="{{ old('denominator') }}">
        @if ($errors->has('denominator'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('denominator') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="symbol">Ký hiệu</label>
        <input class="form-control {{ $errors->has('symbol') ? 'is-invalid' : '' }}" type="text" id="symbol"
            name="symbol" value="{{ old('symbol') }}">
        @if ($errors->has('symbol'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('symbol') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="invoice_number">Số hóa đơn</label>
        <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" id="invoice_number"
            name="invoice_number" value="{{ old('invoice_number') }}">
        @if ($errors->has('invoice_number'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('invoice_number') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="file">File hóa đơn</label>
        <input class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="file" id="file"
            name="file" value="{{ old('file') }}">
        @if ($errors->has('file'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('file') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
