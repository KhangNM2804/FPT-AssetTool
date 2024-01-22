@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="select-category">Danh mục tài sản</label>
        <select id="select-category" name="category_asset_id"
            class="form-control select2 {{ $errors->has('category_asset_id') ? 'is-invalid' : '' }}" style="width: 100%;">
            <option value="{{ $asset && $asset->category_asset_id ? $asset->category_asset_id : '' }}" selected>
                {{ $asset && $asset->category ? $asset->category->name : 'Select an option' }}
            </option>
        </select>
        @if ($errors->has('category_asset_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('category_asset_id') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="select-group">Loại tài sản</label>
        <select id="select-group" class="form-control {{ $errors->has('group_assets_id') ? 'is-invalid' : '' }}"
            name="group_assets_id">
            <option value={{ $asset->group_assets_id ? $asset->group_assets_id : '' }}>
                {{ $asset->group_assets_id ? $asset->group->name : 'Select an option' }}</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="denominator">Mẫu số</label>
        <input id="denominator" class="form-control {{ $errors->has('denominator') ? 'is-invalid' : '' }}"
            type="text" name="denominator" value="{{ old('denominator', $asset->denominator) }}">
        @if ($errors->has('denominator'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('denominator') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="symbol">Ký hiệu</label>
        <input id="symbol" class="form-control {{ $errors->has('symbol') ? 'is-invalid' : '' }}" type="text"
            name="symbol" value="{{ old('symbol', $asset->symbol) }}">
        @if ($errors->has('symbol'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('symbol') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="invoice-number">Số hóa đơn</label>
        <input id="invoice-number" class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}"
            type="text" name="invoice_number" value="{{ old('invoice_number', $asset->invoice_number) }}">
        @if ($errors->has('invoice_number'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('invoice_number') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label for="code">Mã tài sản</label>
        <input id="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
            name="code" value="{{ old('code', $asset->code) }}">
        @if ($errors->has('code'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('code') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="name">Tên tài sản</label>
        <input id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
            name="name" value="{{ old('name', $asset->name) }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong> </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label for="quantity">Số lượng</label>
        <input id="quantity" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text"
            name="quantity" value="{{ old('quantity', $asset->quantity) }}" {{$asset->id? 'disabled':''}} >
        @if ($errors->has('quantity'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('quantity') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="price">Đơn giá</label>
        <input id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text"
            name="price" value="{{ old('price', $asset->price) }}">
        @if ($errors->has('price'))
            <div class="invalid-feedback"> <strong>{{ $errors->first('price') }}</strong> </div>
        @endif
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="document_number">Số chứng từ</label>
            <input id="document_number" class="form-control {{ $errors->has('document_number') ? 'is-invalid' : '' }}"
                type="text" name="document_number" value="{{ old('document_number', $asset->document_number) }}">
            @if ($errors->has('document_number'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('document_number') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="date_of_use">Ngày bắt đầu sử dụng</label>
            <input id="date_of_use" class="form-control {{ $errors->has('date_of_use') ? 'is-invalid' : '' }}"
                type="date" name="date_of_use" value="{{ old('date_of_use', $asset->date_of_use) }}">
            @if ($errors->has('date_of_use'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('date_of_use') }}</strong>
                </div>
            @endif
        </div>


        <div class="form-group ">
            <label for="material_code">Material-Code</label>
            <input id="material_code" class="form-control {{ $errors->has('material_code') ? 'is-invalid' : '' }}"
                type="text" name="material_code" value="{{ old('material_code', $asset->material_code) }}">
            @if ($errors->has('material_code'))
                <div class="invalid-feedback"> <strong>{{ $errors->first('material_code') }}</strong> </div>
            @endif
        </div>
        <label for="note">Ghi chú</label>
        <textarea class="form-control" id="note" name='note' rows="5">{{ old('note', $asset->note) }}</textarea>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-primary" style="width: 100px;">{{ $buttonText }}</button>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                    type="file" name="image">
                @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('image') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <img id="previewImage" class="img-thumbnail" style="display: block; width: 300px; height: 300px;"
                alt="Preview Image" src="{{ $asset->image ? asset('storage/uploads/' . $asset->image) : '' }}">
        </div>

    </div>
</div>
