@csrf
<div class="row">
    <div class="form-group col-md-4">
        <label for="name">Tên người dùng</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" id="name"
            name="name" value="{{ old('name', $user->name) }}" disabled>
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"id="email" name="email"
            value="{{ old('email', $user->email) }}" disabled>
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="role">Quyền</label>
        <select id="role" name="role"
            class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" style="width: 100%;">
            @foreach ($roles as $item)
                <option value="{{ $item->name }}"{{ $user->role_name == $item->name ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach

        </select>
        @if ($errors->has('role'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('role') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
