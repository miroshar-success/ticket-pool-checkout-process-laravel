  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">{{__('Search Events')}}</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="post" action="{{url('all-events')}}">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-2">
            <?php $cat = App\Models\Category::where('status',1)->orderBy('id','DESC')->get(); ?>
            <div class="form-group">
              <label class="pb-2">{{__('Category')}}</label>
              <select class="form-control select2" name="category">
                <option value="">{{__('All')}}</option>
                @foreach ($cat as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="type">{{__('Event Type')}}</label>
              <select class="form-control select2" name="type" id="type">
                <option value="">{{__('All')}}</option>
                <option value="online">{{__('Online Event')}}</option>
                <option value="offline">{{__('Venues')}}</option>
              </select>
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="duration">{{__('Duration')}}</label>
              <select class="form-control select2" id="duration" name="duration">
                <option value="">{{__('All')}}</option>
                <option value="Today">{{__('Today')}}</option>
                <option value="Tomorrow">{{__('Tomorrow')}}</option>
                <option value="ThisWeek">{{__('This Week')}}</option>
                <option value="date">{{__('Choose a date')}}</option>
              </select>
            </div>
          </div>
          <div class="col-md-12 mb-2 date-section hide">
            <div class="form-group mt-3">
              <label class="pb-2" for="date">{{__('Date')}}</label>
              <input class="form-control form-control-a date" placeholder="{{ __('Choose date') }}" name="date" id="date">

            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">{{__('Search')}}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
