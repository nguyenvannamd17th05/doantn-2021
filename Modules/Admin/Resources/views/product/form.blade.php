<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="pro_name" value="{{old('name',isset($product->pro_name)?$product->pro_name:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                @if($errors->has('pro_name'))
                    <div class="error-text">
                        {{$errors->first('pro_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Mô tả:</label>
                <textarea name="pro_desc" cols="30" rows="3"  placeholder="Mô tả ngắn" class="form-control">{{old('pro_desc',isset($product->pro_desc)?$product->pro_desc:'')}}</textarea>
                @if($errors->has('pro_desc'))
                    <div class="error-text">
                        {{$errors->first('pro_desc')}}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="icon" class="form-label">Nội dung:</label>
                <textarea name="pro_content" id="pro_content" cols="30"  rows="3" placeholder="Nội dung" class="form-control"> {{old('pro_content',isset($product->pro_content)?$product->pro_content:'')}}</textarea>
                @if($errors->has('pro_content'))
                    <div class="error-text">
                        {{$errors->first('pro_content')}}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="icon" class="form-label">Meta Title:</label>
                <input type="text" class="form-control" name="pro_title_seo" value="{{old('pro_title_seo',isset($product->pro_title_seo)?$product->pro_title_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta title">
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Meta Description:</label>
                <input type="text" class="form-control" name="pro_desc_seo" value="{{old('pro_desc_seo',isset($product->pro_desc_seo)?$product->pro_desc_seo:'')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta description">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="icon" class="form-label">Loại sản phẩm:</label>
                <select name="cate_id" class="form-control" >
                    <option value="">--Chọn loại sản phẩm </option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{(isset($product->cate_id) ? $product->cate_id : '') == $category->id ? "selected":"" }}>{{$category->c_name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('cate_id'))
                    <div class="error-text">
                        {{$errors->first('cate_id')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Giá sản phẩm: </label>
                <input type="number" value="{{old('pro_price',isset($product->pro_price)?$product->pro_price:'')}}" class="form-control" name="pro_price" placeholder="Giá sản phẩm">
                @if($errors->has('pro_price'))
                    <div class="error-text">
                        {{$errors->first('pro_price')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Khuyến mãi(%): </label>
                <input type="number" value="{{old('pro_sale',isset($product->pro_sale)?$product->pro_sale:'')}}" name="pro_sale" class="form-control" value="0" placeholder="XX%">
            </div>
            <div class="form-group">
                <img id="imgOut" src="{{isset($product->pro_image)?asset(pare_url_file($product->pro_image,'product')):asset('images/default.jpg')}}" style="width: 100%;height: 300px;" alt="">
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">Hình ảnh: </label>
               <input type="file" name="pro_image" id="imgInp" class="form-control-file">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Nổi bật</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgOut.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
