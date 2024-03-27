@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Organizer Settlement Detail'),            
    ]) 

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Organizer Settlement Detail')}}</h2></div>            
        </div>       
       
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-12">
              <div class="card">     
                <div class="card-body">
                  <div class="table-responsive">                    
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>              
                                <th>{{__('Organization Name')}}</th>                                                                                 
                                <th>{{__('Payment')}}</th>                                                                                                                           
                                <th>{{__('Payment Type')}}</th>    
                                <th>{{__('Payment Token')}}</th>                                                                                                                           
                                <th>{{__('Payment Status')}}</th>                                                                                                                           
                                <th>{{__('Payment on')}}</th>                                                                                                                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>                                    
                                    <td> 
                                       <h6>{{$item->user->first_name.' '.$item->user->last_name}}</h6> 
                                       <p>{{$item->user->email}}</p>
                                    </td>                                                                                    
                                    <td>{{$currency.$item->payment}}</td>  
                                    <td>{{$item->payment_type}}</td>                                                                                                                                                   
                                    <td>{{$item->payment_token==null?'-': $item->payment_token}}</td>                                                                                                                                                   
                                    <td>
                                        <span class="badge {{$item->payment_status==1?'badge-success':'badge-warning'}}">{{$item->payment_status==1?'Compelete':'Waiting'}}</span>
                                    </td>                                                                                                                                                   
                                    <td>{{$item->created_at->format('Y-m-d , h:i a')}}</td>                                                                                                                                                   
                                </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="paymentModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="paymentModelLabel">{{ __('Choose Payment Gateway') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="all-payment">
                    
                    
                    <div class="row b-bottom mb-4 mt-4">
                        <div class="col-6">
                            <h6>{{ __('Pay with Paypal') }}</h6>
                        </div>
                        <div class="col-6">
                            <div class="paypal">
                                <div id="paypal-button-container"></div>    
                            </div> 
                        </div>                           
                    </div>   
                   
                    <div class="row b-bottom mb-4 pb-4">                                              
                        <div class="col-6">
                            <h6>{{ __('Pay with Stripe') }}</h6>
                            </div>
                        <div class="col-6">
                            <form method="post" action="{{url('pay-to-org')}}">
                                @csrf 
                                <input type="hidden" id="payment"  name="payment">
                                <input type="hidden" id="user_id" name="user_id">
                                <input type="hidden" value="STRIPE" name="payment_type">
                                <div class="stripe">
                                    <div class="stripe-form">                                                                                      
                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key= {{\App\Models\PaymentSetting::find(1)->stripePublicKey}}
                                        data-amount=100
                                        data-name=abc
                                        data-description="nothing"
                                        data-image = "https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-label="Pay with Stripe"
                                        data-currency={{$currency}} ></script>                                            
                                    </div> 
                                </div> 
                            </form>   
                        </div>                                                                      
                    </div> 
                    <div class="row mb-4 pb-4">
                        <div class="col-6">
                            <h6>{{ __('Pay Locally') }}</h6>
                        </div>
                        <div class="col-6 w-100">
                            <button type="button" onclick="payLocally()" class="btn w-100 btn-primary">{{__('Pay with Local')}}</button>
                        </div>                           
                    </div> 
                                                            
                </div>
            </div>
            
          </div>
        </div>
    </div>


@endsection
