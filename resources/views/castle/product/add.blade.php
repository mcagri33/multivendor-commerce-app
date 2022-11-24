@extends('castle.castle_master')
@section('title','Product Add')
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
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <form class="row g-3" action="{{route('castle.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">@yield('title')</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary">Save to Draft</button>
                                <button type="submit" class="btn btn-primary">Publish Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                            <div class="col-12">
                                                <label class="form-label">Product title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Product title">
                                                @error("title")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Images</label>
                                                <input class="form-control" name="product_image[]" type="file"  multiple>
                                                @error("product_image")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Detail</label>
                                                <textarea class="form-control" name="detail" placeholder="Detail" rows="4" cols="4"></textarea>
                                                @error("detail")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        <div class="col-12">
                                            <label class="form-label">Description</label>
                                            <textarea class="ckeditor form-control" name="description"></textarea>
                                            @error("description")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Price</label>
                                                <input type="text" name="price" class="form-control" placeholder="Price">
                                                @error("price")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                                                @error("quantity")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Min Quantity</label>
                                                <input type="text" name="minquantity" class="form-control" placeholder="Min Quantity">
                                                @error("minquantity")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Tax</label>
                                                <input type="text" name="tax" class="form-control" placeholder="Tax">
                                                @error("tax")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status">
                                                    <option value="1">Published</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                                @error("status")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Keywords</label>
                                                <input type="text" class="form-control" placeholder="Keywords">
                                            </div>

                                            <div class="col-12">
                                                <h5>Categories</h5>
                                                <div class="category-list">
                                                    @foreach($categoryData as $category)
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="category_id[]" type="checkbox" value="{{$category->id}}" id="{{$category->id}}" multiple>
                                                        <label class="form-check-label" for="{{$category->name}}">
                                                            {{$category->name}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            </form>
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div>

                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </main>

@endsection
