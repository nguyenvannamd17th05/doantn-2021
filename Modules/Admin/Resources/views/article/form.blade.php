<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="form-group">
                <label for="name" class="form-label">Tên bài viết:</label>
                <input type="text" class="form-control" name="a_name" value="{{old('a_name',isset($article->a_name)?$article->a_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên bài viết">
                @if($errors->has('a_name'))
                    <div class="error-text">
                        {{$errors->first('a_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Mô tả:</label>
                <textarea name="a_desc" cols="30" rows="3"  placeholder="Mô tả ngắn" class="form-control">{{old('a_desc',isset($article->a_desc)?$article->a_desc:'')}}</textarea>
                @if($errors->has('a_desc'))
                    <div class="error-text">
                        {{$errors->first('a_desc')}}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="icon" class="form-label">Nội dung:</label>
                <textarea name="a_content" id="" cols="30"  rows="3" placeholder="Nội dung" class="form-control"> {{old('a_content',isset($article->a_content)?$article->a_content:'')}}</textarea>
                @if($errors->has('a_content'))
                    <div class="error-text">
                        {{$errors->first('a_content')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Hình ảnh: </label>
                <input type="file" name="a_avatar" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Meta Title:</label>
                <input type="text" class="form-control" name="a_title_seo" value="{{old('a_title_seo',isset($article->a_title_seo)?$article->a_title_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta title">
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Meta Description:</label>
                <input type="text" class="form-control" name="a_desc_seo" value="{{old('a_desc_seo',isset($article->a_desc_seo)?$article->a_desc_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta description">
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </div>

    </div>

</form>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('a_content');
    </script>
@endsection
