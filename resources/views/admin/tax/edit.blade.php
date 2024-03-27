@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Edit Tax'),
        'headerData' => __('Tax') ,
        'url' => 'tax' ,
    ])

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Edit Tax')}}</h2></div>
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <form method="post" action="{{url('tax/'.$tax->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>{{__('Name')}}</label>
                            <input type="text" name="name" placeholder="{{__('Name')}}" value="{{$tax->name}}" class="form-control @error('name')? is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{__('Amount Type')}}</label><br>
                            <input class="ml-0" name="amount_type" type="radio" value="price" {{$tax->amount_type=='price'?'checked':''}} class="form-control @error('amount_type')? is-invalid @enderror">Amount
                            <input class="ml-5" name="amount_type" type="radio" value="percentage" {{$tax->amount_type=='percentage'?'checked':''}} class="form-control @error('amount_type')? is-invalid @enderror">Percentage
                            @error('amount_type')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{__('Charges')}}</label>
                            <input type="number" min="1" name="price" step="any" placeholder="{{__('Charges')}}" value="{{$tax->price}}" class="form-control @error('price')? is-invalid @enderror">
                            @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{__('status')}}</label>
                            <select name="status" class="form-control select2">
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0" {{$tax->status=="0"?'selected':''}}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox"  name="allow_all_bill" {{$tax->allow_all_bill==1?'checked':''}} value="1" class="custom-control-input" tabindex="3" id="allow_all_bill">
                              <label class="custom-control-label" for="allow_all_bill">{{__('Allow this tax in all bills')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary demo-button">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
