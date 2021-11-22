<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{old('name',isset($category->c_name)?$category->c_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
        @if($errors->has('name'))
            <div class="error-text">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="icon" class="form-label">Icon</label>
        <input type="text" class="form-control" name="icon" value="{{old('icon',isset($category->c_icon)?$category->c_icon:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fa fa-home">
        @if($errors->has('icon'))
            <div class="error-text">
                {{$errors->first('icon')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="icon" class="form-label">Meta Title</label>
        <input type="text" class="form-control" name="c_title_seo" value="{{old('c_title_seo',isset($category->c_title_seo)?$category->c_title_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta title">
    </div>
    <div class="form-group">
        <label for="icon" class="form-label">Meta Description</label>
        <input type="text" class="form-control" name="c_desc_seo" value="{{old('c_desc_seo',isset($category->c_desc_seo)?$category->c_desc_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta description">
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
