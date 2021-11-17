<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Tên Slider</label>
        <input type="text" class="form-control" name="s_name" value="{{old('s_name',isset($category->c_name)?$category->c_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên slider">
        @if($errors->has('s_name'))
            <div class="error-text">
                {{$errors->first('s_name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="icon" class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="s_desc" value="{{old('s_desc',isset($category->c_icon)?$category->c_icon:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả">
        @if($errors->has('s_desc'))
            <div class="error-text">
                {{$errors->first('s_desc')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <img id="imgOut" src="{{asset('images/default.jpg')}}" style="width: 100%;height: 300px;" alt="">
    </div>
    <div class="form-group">
        <label for="s_image" class="form-label">Hình ảnh: </label>
        <input type="file" class="form-control-file" id="imgInp" name="s_iamge" >
    </div>


    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('script')

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgOut.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
