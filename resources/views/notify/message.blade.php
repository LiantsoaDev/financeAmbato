@if(Session::has('success')) 
    <div class="col-md-8">
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="la la-close"></i>
                    </button>
                    <span>
                      <b> Success - </b> {!! Session::get('success') !!} </span>
                  </div>
    </div>
@endif

@if(Session::has('error')) 
<div class="col-md-8">
        <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="la la-close"></i>
                </button>
                <span>
                  <b> Danger - </b> {!! Session::get('error') !!} </span>
              </div>
</div>
@endif

@if(Session::has('remarque')) 
<div class="col-md-5">
        <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="la la-close"></i>
                </button>
                <span>
                  <b> Danger - </b> {!! Session::get('remarque') !!} </span>
              </div>
</div>
@endif
