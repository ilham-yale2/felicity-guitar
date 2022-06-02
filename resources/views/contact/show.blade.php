@extends('layout.admin')

@section('title', 'Admin User Mail')

@section('page', 'User Mail > Show ')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <h3 calss="mb-2">Show Mail </h3>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
                <div class="row list-sub">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="" value="{{$contact->name}}" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="" value="{{$contact->email}}" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="" value="{{$contact->subject}}" id="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="" id="" class="form-control" rows="10">{{$contact->message}}</textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-12 d-flex align-items-center">
                        <label for="">Sub Category</label>
                        <button type="button" class="btn btn-primary mb-2 ml-3 p-1" onclick="addSub()"><i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </i></button>
                    </div>
                    @foreach ($subs as $s)
                    <div class="col-md-4 mb-2" id="sub-{{$s->id}}">
                        <div class="list">
                            <label for="name">Name</label>
                            <div class="d-flex align-items-center">
                                <input type="hidden" value="{{$s->id}}" name="sub_id[]">
                                <input type="text" class="form-control " name="sub[]" required id="input-sub-0" value="{{$s->name}}">
                                <div class="">
                                    <button type="button" onclick="deleteSub(`{{$s->id}}`)" class="ml-3 btn btn-danger p-1 ">
                                        <span class="iconify" data-icon="ant-design:delete-twotone"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        @php
                            $c = $s->id;
                        @endphp
                    @endforeach
                    @if (count($subs) < 1)
                    @php$count = 0 @endphp
                    @else
                       @php $count = $c @endphp
                    @endif --}}
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a class="btn btn-danger mt-3" href="{{ route('user-contact.index') }}"><i
                                class="flaticon-cancel-12"></i> Back</a>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
@php
    $menu = 'contact'
@endphp
@section('js')

@endsection
