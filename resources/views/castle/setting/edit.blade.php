@extends('castle.castle_master')
@section('title','Setting')
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
        @include('castle.layouts.alert')

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <form class="row g-3" action="{{route('castle.setting.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_img" value="{{$data->old_img}}">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">@yield('title')</h5>
                            <div class="ms-auto">
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
                                                <label class="form-label">Site Title</label>
                                                <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="Site Title">
                                                @error("title")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <img src="{{asset($data->logo)}}" style="width: 100px; height: 100px;">
                                            <div class="col-12">
                                                <label class="form-label">Logo</label>
                                                <input type="file" name="logo" class="form-control">
                                                @error("logo")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        <img src="{{asset($data->favicon)}}" style="width: 100px; height: 100px;">
                                        <div class="col-12">
                                                <label class="form-label">Favicon</label>
                                                <input type="file" name="favicon" class="form-control">
                                                @error("favicon")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Company</label>
                                                <input type="text" name="company" value="{{$data->company}}" class="form-control" placeholder="Company">
                                                @error("company")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Keywords</label>
                                                <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control" placeholder="Keywords">
                                                @error("keywords")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Description</label>
                                                <input type="text" name="description" value="{{$data->description}}" class="form-control" placeholder="Description">
                                                @error("description")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        <div class="col-12">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" value="{{$data->phone}}" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Fax</label>
                                            <input type="text" name="fax" value="{{$data->fax}}" class="form-control" placeholder="Fax">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Gsm</label>
                                            <input type="text" name="gsm" value="{{$data->gsm}}" class="form-control" placeholder="Gsm">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" value="{{$data->address}}" class="form-control" placeholder="Address">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Smtp Server</label>
                                                <input type="text" name="smtp_server" value="{{$data->smtp_server}}" class="form-control" placeholder="Smtp Server">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Smtp Email</label>
                                                <input type="text" name="smtp_email" value="{{$data->smtp_email}}" class="form-control" placeholder="Smtp Email">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Smtp Password</label>
                                                <input type="text" name="smtp_password" value="{{$data->smtp_password}}" class="form-control" placeholder="Smtp Password">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Smtp Port</label>
                                                <input type="text" name="smtp_port" value="{{$data->smtp_port}}" class="form-control" placeholder="Smtp Port">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control" placeholder="Smtp Port">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Instagram</label>
                                                <input type="text" name="instagram" value="{{$data->instagram}}" class="form-control" placeholder="Instagram">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Linkedin</label>
                                                <input type="text" name="linkedin" value="{{$data->linkedin}}" class="form-control" placeholder="Linkedin">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" name="twitter" value="{{$data->twitter}}" class="form-control" placeholder="Twitter">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Pintrest</label>
                                                <input type="text" name="pintrest" value="{{$data->pintrest}}" class="form-control" placeholder="Pintrest">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Youtube</label>
                                                <input type="text" name="youtube" value="{{$data->youtube}}" class="form-control" placeholder="Youtube">
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
