<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">


        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center mt-3">Giỏ hàng</h1>
                <table class="table-bordered table">
                    <tr>
                        <th>Name</th>
                        <th>Giá thường</th>
                        <th>Giá sale</th>
                        <th>color</th>
                        <th>size</th>

                        <th>Số lượng</th>
                        <th>Tổng tiền</th>


                    </tr>
                    @if (session()->has('cart'))
                    @foreach (session('cart') as $key => $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price_regular']}}</td>
                        <td>{{$item['price_sale']}}</td>
                        <td>
                            <div style="width: 50px; background: {{$item['color']['name']}}; height: 50px"></div>
                        </td>
                        <td>{{$item['size']['name']}}</td>
                        <td>{{$item['quantity_get']}}</td>
                        <td>{{$item['quantity_get'] *$item['price_sale'] }}</td>

                    </tr>
                    @endforeach
                    @endif




                </table>
            </div>
            <div class="col-md-4">

                {{-- <form action="{{route('order.add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">




                    <button class="btn btn-primary" type="submit"> Thêm vào giỏ hàng </button>
                </form> --}}

            </div>
        </div>
    </div>
</body>
</html>
