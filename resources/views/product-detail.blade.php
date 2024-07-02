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
        <h1 class="mt-5 mb-3 text-center">{{$product->name}}</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{$product->img_thumbnail}}" width="200px" alt="">
                <table class="table-bordered table">
                    <tr>
                        <th>Trường</th>
                        <th>Giá trị</th>
                    </tr>
                    <tr>
                        <td>SKU</td>
                        <td>{{$product->sku}}</td>
                    </tr>
                    <tr>
                        <td>Giá thực tế</td>
                        <td>{{$product->price_regular}}</td>
                    </tr>
                    <tr>
                        <td>Giá khuyến mãi</td>
                        <td>{{$product->price_sale}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">

                <form action="{{route('cart.add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">


                    <label for=""><b> Color</b></label>
                    @foreach ($colors as $id =>$name)
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio_color_{{$id}}" name="product_color_id" value="{{$id}}">
                        <label class="form-check-label" for="radio_color_{{$id}}">{{$name}}</label>
                      </div>
                    @endforeach

                    <label for=""><b> Size</b></label>
                    @foreach ($sizes as $id =>$name)
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio_size_{{$id}}" name="product_size_id" value="{{$id}}" >
                        <label class="form-check-label" for="radio_size_{{$id}}">{{$name}}</label>
                      </div>
                    @endforeach

                    <div class="mb-3 mt-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" min="1" value="1" required
                         id="quantity" placeholder="Enter Quantity" name="quantity">
                    </div>

                    <button class="btn btn-primary" type="submit"> Thêm vào giỏ hàng </button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
