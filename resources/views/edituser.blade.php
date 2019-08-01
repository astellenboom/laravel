@extends('layouts.user')

@section('content')
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">{{$user->first_name }}
          <span class="text-primary">{{$user->last_name}}</span>
        </h1>
        <div class="subheading mb-5">
          <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
        <div class="subheading mb-5">
            <span>Last Updated</span>
            <span id="lastUpdated" class="text-primary">{{$user->last_name}}</span>
        </div>
         
	 </div>
	
	
    </section>



<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
	
        @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
        @endif

	<div class="w-100">
		<h2 class="mb-5">{{ __('Update Details') }}</h2>
         <form method="POST" action="{{ route('update', $user->id) }}">
        @csrf

        <div class="form-group row">
            <label for="first_name" class="col-md-2 col-form-label text-md-right">{{ __('First Name') }}</label>
				<input id="first_name" type="text" class="col-md-8 form-control @error('name') is-invalid @enderror" name="first_name" value="{{$user->first_name }} " required autocomplete="name" autofocus>

        </div>
        <div class="form-group row">
            <label for="last_name" class="col-md-2 col-form-label text-md-right">{{ __('Last Name') }}</label>

            
                <input id="last_name" type="text" class="col-md-8 form-control @error('name') is-invalid @enderror" name="last_name" value=" {{$user->last_name}}" required autocomplete="name" autofocus>


        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            
                <input id="email" type="email" class="col-md-8 form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

        
            
        </div>

  

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
	</div>	
</section>		
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
        
        


        $.ajax({
            type: "GET",
            url: '/command',
            success: function(data, textStatus, jqXHR){
                
                $("#lastUpdated").html(data)

            },
            error: function (jqXHR, textStatus, errorThrown){
                
            }
        });

    })

</script>
@endsection
