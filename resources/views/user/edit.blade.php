@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Data Master > Brand > Edit')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Edit User</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}"
                                    placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}"
                                    placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control number" id="phone" name="phone" value="{{ $user->phone }}"
                                    placeholder="Whatsapp number" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4 mt-3">
                                <label for="logo">Upload avatar</label>
                                <input type="file" class="form-control-file" onchange="loadFile(event, 0)" id="avatar"
                                name="avatar">
                            </div>
                        </div>
                        <div class="col-md-4 text-center pt-4">
                            <img src="{{ asset('storage/' . $user->avatar) }}" width="60%" class="mb-3" id="preview">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="{{ route('user.index') }}"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@php
    $menu = 'user'
@endphp
@endsection

@section('script')
    <script type="text/javascript">
        var loadFile = function(event, no) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        $('.summernote').summernote({
            height: 300,
            tabDisable: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endsection
