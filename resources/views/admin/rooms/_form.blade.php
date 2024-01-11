@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="select2-example">Danh mục phòng</label>
        <select id="select2-example" name="category_room_id"
            class="form-control select2 {{ $errors->has('category_room_id') ? 'is-invalid' : '' }}" style="width: 100%;">
            <!-- Option mặc định (nếu cần) -->
            <option value="{{ $room ? $room->category_room->id : '' }}" selected>
                {{ $room ? $room->category_room->name : 'Select an option' }}</option>
        </select>
        @if ($errors->has('category_room_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('category_room_id') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        <label for="select2-user">Người quản lý</label>
        <select id="select2-user" name="manager_id"
            class="form-control select2 {{ $errors->has('manager_id') ? 'is-invalid' : '' }}" style="width: 100%;">
            <!-- Option mặc định (nếu cần) -->
            <option value="{{ $room ? $room->manager_id : '' }}" selected>
                {{ $room ? $room->manager->name : 'Select an option' }}</option>
        </select>
        @if ($errors->has('category_room_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('category_room_id') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="name">Tên phòng</label>
        <input type="text" name="name" id="name" value="{{ old('name', $room->name) }}"
            class="form-control
            {{ $errors->has('name') ? 'is-invalid' : '' }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="index">Thứ tự hiển thị</label>
        <input type="number" name="index" id="index" value="{{ old('index', $room->index) }}"
            class="form-control
            {{ $errors->has('index') ? 'is-invalid' : '' }}">
        @if ($errors->has('index'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('index') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
