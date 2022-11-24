@extends('castle.castle_master')
@section('title','Brand')
@section('castle')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
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

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">@yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3" action="{{route('castle.brand.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Brand Name">
                                        @error("name")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" value="{{old('image')}}">
                                        @error("image")
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
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        @if(count($brands)>0)
                                            <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count = 1; ?>
                                            @foreach($brands as $brand)
                                                <tr>
                                                    <td>{{$brands ->perPage()*($brands->currentPage()-1)+$count}}</td>
                                                    <?php $count++; ?>
                                                    <td>
                                                        <div class="product-box">
                                                            <img src="{{asset($brand->image)}}" >
                                                        </div>
                                                    </td>
                                                    <td>{{$brand->name}}</td>
                                                    @if($brand->status == 1)
                                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                                    @else
                                                        <td><span class="badge rounded-pill bg-warning">Passive</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="{{route('castle.brand.edit',$brand->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                            <a href="{{route('castle.brand.delete',$brand->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        @else
                                            No Data Found !
                                        @endif
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {!! $brands->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>

    </main>
@endsection
