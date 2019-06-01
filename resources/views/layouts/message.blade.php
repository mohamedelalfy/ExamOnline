{{--  
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div aria-hidden="true" class="alert alert-danger" style="width:50%;position: absolute" >
            
            <i  class="fa fa-exclamation-triangle" style="font-size:20px;padding-right:5px"></i> {{ $error }}</li>
        </div>
    @endforeach
@endif  --}}


@if(session()->has('success'))
<div aria-hidden="true" class="alert alert-success" style="position: absolute">
    
<i  class="fa fa-check fa-lg" ></i>{{ session('success') }}
</div>

@endif