@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'User Trade > show')

@section('content')
    <div class="col-lg-12">
        <h3 calss="mb-2">Show User Trade</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="{{$trade->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" value="{{$trade->email}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" value="{{$trade->phone}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="">Piece of Gear</label>
                                <div class="d-flex">
                                    <div class="form-check d-inline mr-5">
                                        <input class="form-check-input" type="radio" @if($trade->piece_of_gear == 0) checked @endif>
                                        <label class="form-check-label py-1 px-3 coa rounded">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check d-inline ">
                                        <input class="form-check-input" type="radio" @if($trade->piece_of_gear == 1) checked @endif>
                                        <label class="form-check-label py-1 px-3 coa rounded">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Gear Type</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" @if ($trade->gear_type == 1) selected @endif> Gear type 1</option>
                                    <option value="2" @if ($trade->gear_type == 2) selected @endif> Gear type 2</option>
                                    <option value="3" @if ($trade->gear_type == 3) selected @endif> Gear type 3</option>
                                    <option value="4" @if ($trade->gear_type == 4) selected @endif> Gear type 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Make</label>
                                <input class="form-control" type="text" value="{{$trade->make}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" value="{{$trade->model}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Condition</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" @if ($trade->condition == 1) selected @endif>condition 1</option>
                                    <option value="2" @if ($trade->condition == 2) selected @endif>condition 2</option>
                                    <option value="3" @if ($trade->condition == 3) selected @endif>condition 3</option>
                                    <option value="4" @if ($trade->condition == 4) selected @endif>condition 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Serial Number</label>
                               <input type="text" value="{{$trade->serial_number}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Case Include</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" @if ($trade->case_include == 1) selected @endif>case include 1</option>
                                    <option value="2" @if ($trade->case_include == 2) selected @endif>case include 2</option>
                                    <option value="3" @if ($trade->case_include == 3) selected @endif>case include 3</option>
                                    <option value="4" @if ($trade->case_include == 4) selected @endif>case include 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Applicable Boxes</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Describe/list issues, problems and/or damage.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text">{{$trade->description_problem}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Describe/list modifications.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text">{{$trade->description_modification}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Additional information.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text">{{$trade->information}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Listing Url.</label>
                                <input type="text" readonly value="{{$trade->url}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Images</label>
                            <div class="row" id="gallery">
                                @foreach ($trade->images as $item)    
                                    <div class="col-md-2">
                                        <a href="{{asset('storage/' . $item )}}" target="_blank" data-group="1" class="image-link test">
                                            <img src="{{asset('storage/' . $item )}}" class="w-100" alt="">
                                        </a>            
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
  
    @php
        $menu = 'trade'
    @endphp
@endsection
@section('js')
<script>
    $('#gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',

                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find(
                        'img');
                }
            },
        gallery: {
          enabled:true,
        }
    });
</script>
@endsection
