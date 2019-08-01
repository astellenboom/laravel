<form method="POST" action="{{ route('store') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Contact Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Please enter name" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <label for="number" class="col-md-6 col-form-label" >
        	{{__("Number")}}
        </label>
        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="number" value="" placeholder="Please enter number" required>
         @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

    	  <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Contact') }}
                </button>
            </div>
        </div>


    </div>
</form>