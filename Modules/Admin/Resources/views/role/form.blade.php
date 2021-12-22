@section('style')
    <link href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>

@endsection
<style>
    .select2-selection__choice{
        background-color: #1b2d1f !important;
    }
</style>

<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="r_display_name" class="form-label">Tên chức vụ:</label>
        <input type="text" class="form-control" name="r_display_name" value="{{old('r_display_name',isset($role->r_display_name)?$role->r_display_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập chức vụ">
        @if($errors->has('r_display_name'))
            <div class="error-text">
                {{$errors->first('r_display_name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="r_name" class="form-label">Tên viết tắt:</label>
        <input type="text" class="form-control" name="r_name" value="{{old('email',isset($role->r_name)?$role->r_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên tóm tắt">
        @if($errors->has('r_name'))
            <div class="error-text">
                {{$errors->first('r_name')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label  >Quyền hạn: </label>
        <select name="permission_id[]" class="form-control select2_init" multiple>
            <option value="">--Chọn chức vụ</option>
            @if(isset($permissions))
                @foreach($permissions as $permission)
                    <option value="{{$permission->id}}" @if(isset($role_per))
                    {{$role_per->contains('id',$permission->id)? "selected" : ""}}
@endif>{{$permission->p_name}} </option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('script')
        <script src="{{asset('adminlte/plugins/select2/js/select2.min.js')}}"></script>

        <script>
        $(function(){
            $(".select2_init").select2({
                'placeholder': '--Chọn quyền hạn'
            })
        });
    </script>
@endsection
