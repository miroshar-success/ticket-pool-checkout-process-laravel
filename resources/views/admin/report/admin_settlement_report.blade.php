@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Organizer Settlement Report'),
    ])

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Organizer Settlement Report')}}</h2></div>
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
                    <table class="table" id="settlement_report">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('Organization Name')}}</th>
                                <th>{{__('Total Orders')}}</th>
                                <th>{{__('Total Commission')}}</th>
                                <th>{{__('Paid Commission')}}</th>
                                <th>{{__('Remaining Commission')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>
                                    <td>
                                       <h6>{{$item->first_name.' '.$item->last_name}}</h6>
                                       <p>{{$item->email}}</p>
                                    </td>
                                    <td>{{$item->total_orders}}</td>
                                    <td>{{$currency.$item->total_commission}}</td>
                                    <td>{{$currency.$item->pay_commission}}</td>
                                    <td>{{$currency.$item->organization_commission}}</td>
                                    <td>
                                        <a href="{{url('view-settlement/'.$item->id)}}"><button class="btn btn-primary btn-pay" type="button"><i class="fas fa-eye"></i></button></a>
                                        @if($item->organization_commission>0)
                                            <button class="btn btn-primary btn-pay" id="payButton" {{$item->organization_commission==0?'disabled':''}} data-id="{{$item->id}}" data-total="{{$item->organization_commission}}" data-payment="{{$item->organization_commission}}" data-toggle="modal" data-target="#paymentModel" type="button">{{__('Pay')}}</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="">
                            <tr>
                                <th></th>
                                <th></th>
                                <th>{{ __('Page Total:') }} <br><br>{{ __('Main Total:') }} </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
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
              <h5 class="modal-title" id="paymentModelLabel">{{__('Choose Payment Gateway')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="all-payment">


                    <div class="row b-bottom mb-4 mt-4">
                        <div class="col-6">
                            <h6>{{__('Pay with Paypal')}}</h6>
                        </div>
                        <div class="col-6">
                            <div class="paypal">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                    @php
                        $cur = \App\Models\Setting::find(1)->currency;
                    @endphp
                    <div class="row b-bottom mb-4 pb-4">
                        <div class="col-6">
                            <h6>{{__('Pay with Stripe')}}</h6>
                            </div>
                        <div class="col-6">
                            <form method="post" action="{{url('pay-to-org')}}">
                                @csrf
                                <input type="hidden" id="stripePublicKey" name="stripePublicKey"
                                    value="{{ \App\Models\OrganizerPaymentKeys::find(1)->stripePublicKey ?? null }}">
                                <input type="hidden" id="stripe_currency" name="currency" value="{{$cur}}"/>
                                <input type="hidden" id="payment"  name="payment">
                                <input type="hidden" id="user_id" name="user_id">
                                <input type="hidden" value="STRIPE" name="payment_type">
                                <div class="stripe">
                                    <div class="stripe-form">
                                    </div>
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary w-full" id="stripebtn">
                                {{(__('Stripe'))}}
                            </button>
                        </div>
                    </div>
                    <div class="row mb-4 pb-4">
                        <div class="col-6">
                            <h6>{{__('Pay Locally')}}</h6>
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

    <script src="https://js.stripe.com/v3/"></script>
@endsection

