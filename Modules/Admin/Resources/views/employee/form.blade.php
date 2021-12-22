

<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Tên nhân viên:</label>
        <input type="text" class="form-control" name="name" value="{{old('name',isset($admin->name)?$admin->name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên nhân viên">
        @if($errors->has('name'))
            <div class="error-text">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email" value="{{old('email',isset($admin->email)?$admin->email:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email đăng nhập">
        @if($errors->has('email'))
            <div class="error-text">
                {{$errors->first('email')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" value="{{old('password',isset($admin->password)?$admin->password:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mật khẩu đăng nhập">
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Số điện thoại:</label>
        <input type="text" class="form-control" name="phone" value="{{old('phone',isset($admin->phone)?$admin->phone:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại">
    </div>
    <div class="form-group">
        <label  >Chức vụ: </label>
        <select name="role_id" class="form-control select2_init" >
            <option value="">--Chọn chức vụ</option>
            @if(isset($roles))
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{isset($admin->role_id)? "selected" : ""}}>{{$role->r_display_name}} </option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>

