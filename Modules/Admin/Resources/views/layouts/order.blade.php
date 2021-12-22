@if($orders)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>

        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($orders as $key => $order)
            <tr>
                <th scope="row">{{$i}}</th>
                <td><a href="{{route('product.detail',[\Illuminate\Support\Str::slug($order->product->pro_name),$order->pro_id])}}">{{isset($order->product->pro_name)?$order->product->pro_name:'[N\A]'}}</a></td>
                <td>
                    <img style="width: 80px;height: 70px" src="{{isset($order->product->pro_image)?asset(pare_url_file($order->product->pro_image,'product')):''}}">
                </td>
                <td>
                  <span>
                      {{number_format($order->or_price,0,',','.')}}đ
                      <br>
                      <i>- {{$order->or_sale}}%</i>
                  </span>
                </td>
                <td>{{$order->or_qty}}</td>
                <td>

                    {{number_format($order->or_qty*$order->or_price*(100-$order->or_sale)/100,0,',','.')}}đ</td>
            </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>
@endif
