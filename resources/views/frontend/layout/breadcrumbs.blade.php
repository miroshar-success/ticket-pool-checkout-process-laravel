<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-8">
                <div class="title-single-box"><h1 class="title-single">{{$title}}</h1></div>
            </div>
            <div class="col-md-3 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">{{__('Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> {{$page}} </li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>