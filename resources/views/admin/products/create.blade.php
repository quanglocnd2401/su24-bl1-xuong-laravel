@extends('admin.layout.master');

@section('title')
    Danh sách Danh mục sản phẩm
@endsection

@section('content')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Thêm mới sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class=" col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="{{ strtoupper(\Str::random(8)) }}">
                                    </div>

                                    <div class="mt-3">
                                        <label for="name" class="form-label">Catelogues</label>
                                        <select type="text" class="form-select  " id="catelogue_id" name="catelogue_id">
                                            @foreach ($catelogues as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mt-3">
                                        <label for="price_regular" class="form-label">Price Regular</label>
                                        <input type="number" value="0" class="form-control" id="price_regular"
                                            name="price_regular">
                                    </div>
                                    <div class="mt-3">
                                        <label for="price_sale" class="form-label">Price Sale</label>
                                        <input type="number" value="0" class="form-control" id="price_sale"
                                            name="price_sale">
                                    </div>

                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">img_thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                                    </div>
                                </div>
                                <div class=" col-md-8">
                                    <div class="row">

                                        @php
                                            $is = [
                                                'is_active' => 'secondary',
                                                'is_hot_deal' => 'success',
                                                'is_good_deal' => 'warning',
                                                'is_new' => 'danger',
                                                'is_show_home' => 'infor',
                                            ];
                                        @endphp

                                        @foreach ($is as $key => $color)
                                            <div class="form-check form-switch  form-switch-{{ $color }}">
                                                <input name="{{$key}}" class="form-check-input" value='1' type="checkbox"
                                                    role="switch" id="{{$key}}" checked>
                                                <label
                                                    for="{{$key}}">{{ Str::convertCase($key, MB_CASE_TITLE) }}</label>
                                            </div>
                                        @endforeach



                                    </div>
                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="description" class="form-label">description</label>
                                            <textarea class="form-control" id="description" rows="2" name="description"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="material" class="form-label">Material</label>
                                            <textarea class="form-control" id="material" rows="2" name="material"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="user_manual" class="form-label">User Manual</label>
                                            <textarea class="form-control" id="user_manual" rows="2" name="user_manual"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" id="content" rows="2" name="content"></textarea>
                                        </div>
                                        <script>
                                            CKEDITOR.replace('content');
                                        </script>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="height: 300; overflow: scroll">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>

                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @php
                                            $flagRowSpan = true;
                                        @endphp

                                        @foreach ($colors as $colorID => $colorName)
                                            <tr class="text-center">
                                                @if ($flagRowSpan)
                                                    <td style="vertical-align: middle;" rowspan='{{ count($colors) }}'>
                                                        {{ $sizeName }}</td>
                                                @endif
                                                @php
                                                    $flagRowSpan = false;
                                                @endphp
                                                <td>
                                                    <div style="width:40px; height:40px; background: {{ $colorName }}">
                                                    </div>
                                                </td>
                                                <td> <input type="text" class="form-control" value="100"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]">
                                                </td>
                                                <td> <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][image]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                            <!--end col-->
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Gallery</h4>
                        <button type="button" class="btn btn-primary" onclick="addImageGallery()">Thêm</button>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4" id="gallery-list">
                                <div class=" col-md-4">
                                    <div>
                                        <label for="gallery_1" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="gallery_1"
                                            name="product_galleries[]">
                                    </div>


                                </div>
                                {{-- <div>
                                        <label for="gallery_2" class="form-label">Gallery 2</label>
                                        <input type="file" class="form-control" id="gallery_2" name="product_galleries[]">
                                    </div> --}}
                                <!--end col-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tags</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class=" col-md-4">
                                    <select class="form-control" name="tags[]" id="tags" multiple>
                                        @foreach ($tags as $id => $tag)
                                            <option value="{{ $id }}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end col-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <input type="submit" class="btn btn-submit" value="Thêm">
    </form>
@endsection

<section class="scripts">
    <script>


        function addImageGallery() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
                                <div class=" col-md-4" id="${id}_item">
                                    <div>
                                        <label for="${id}" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="${id}" name="product_galleries[]">
                                    </div>
                                </div>
            `
            let galleryList = document.querySelector('#gallery-list');
           galleryList.insertAdjacentHTML('beforeend', html);
        }


    </script>
</section>
