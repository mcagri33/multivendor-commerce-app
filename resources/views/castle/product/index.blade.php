@extends('castle.castle_master')
@section('title','Category List')
@section('castle')

    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">@yield('title')</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('castle.product.create')}}" class="btn btn-primary">Product Add</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-striped">
                        @if(count($products)>0)
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$products ->perPage()*($products->currentPage()-1)+$count}}</td>
                                    <?php $count++; ?>
                                    <td class="productlist">
                                        @if($product->images)
                                        <a class="d-flex align-items-center gap-2" href="#">
                                            @foreach($product->images as $image)
                                                @if($product->images->first() == $image)
                                            <div class="product-box">
                                                <img src="{{asset($image->product_image)}}" alt="">
                                            </div>
                                                @endif
                                            @endforeach
                                            <div>
                                                <h6 class="mb-0 product-title">{{$product->title}}</h6>
                                            </div>
                                        </a>
                                        @else
                                            <a class="d-flex align-items-center gap-2" href="#">
                                                <div class="product-box">
                                                    <img src="{{asset('assets/castle/upload/no-image.jpg')}}" alt="">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 product-title">{{$product->title}}</h6>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                        <td>
                                            @if($product->category)
                                            @foreach($product->category as $category)
                                                [{{ $category->name }}]
                                                @endforeach
                                            @elseif($product->category->parent_id)
                                                @foreach($product->category as $category)
                                                    [{{ $category->name.'/'.$category->parent_id->name }}]
                                                @endforeach
                                            @else
                                            <p>Uncategorized</p>
                                            @endif

                                        </td>
                                    <td><span>${{$product->price}}</span></td>
                                    @if($product->status == 1)
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-warning">Passive</span></td>
                                    @endif
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{route('castle.product.edit',$product->id)}}" class="text-warning"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                               data-bs-original-title="Edit info" aria-label="Edit"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            <a href="{{route('castle.product.delete',$product->id)}}"
                                               class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="" data-bs-original-title="Delete" aria-label="Delete"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        @else
                            No Data Found
                        @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
                </div>
@endsection
