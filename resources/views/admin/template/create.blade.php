@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Add Template'),
        'headerData' => __('Templates') ,
        'url' => 'notification-template' ,
    ])

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Add Template')}}</h2></div>
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <form method="post" class="event-form" action="{{url('notification-template')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('Title')}}</label>
                                <input type="text" name="title" placeholder="{{__('Title')}}" value="{{old('title')}}" class="form-control @error('title')? is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{__('Subject')}}</label>
                                    <input type="text" name="subject" placeholder="{{__('Subject')}}" value="{{old('subject')}}" class="form-control @error('subject')? is-invalid @enderror">
                                    @error('subject')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label>{{__('Email Content')}}</label>
                            <textarea name="mail_content" Placeholder ="Email notification content" class="textarea_editor @error('mail_content')? is-invalid @enderror">
                                {{old('mail_content')}}
                            </textarea>
                            @error('mail_content')
                                <div class="invalid-feedback block">{{$message}}</div>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label>{{__('App notification message Content')}}</label>
                            <textarea name="message_content" placeholder="App notification message content" class="form-control @error('message_content')? is-invalid @enderror">{{old('message_content')}}</textarea>
                            @error('message_content')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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
    <style>
        .modal-backdrop {
           display: none;
        }
    </style>
@endsection
