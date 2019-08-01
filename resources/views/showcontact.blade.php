@extends('layouts.user')
@section('content')
<button id='addBtn' class="btn btn-outline-primary btn-custom-outline-primary btn-custom">
  Add Contact 
</button>	
<div id="addContact">
<form  method="POST" action="{{ route('store') }}">
@csrf

<!-- <div class="form-group row"> -->
<label for="name" class="col-md-4 col-form-label ">{{ __('Contact Name') }}</label>

<div class="col-md-4">
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Please enter name" required autocomplete="name" autofocus>

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<label for="number" class="col-md-4 col-form-label" >
{{__("Number")}}
</label>
<div class="col-md-4">
<input type="number" name="number" class=" form-control @error('number') is-invalid @enderror" id="number" value="" placeholder="Please enter number" required>
@error('number')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>  
<br>
<div class="form-group ">
<div class="col-md-4 ">
    <button type="submit" class="btn btn-primary">
        {{ __('Save Contact') }}
    </button>
</div>
</div>



</form>
</div>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<td></td>	
				<td>Contact</td>
				<td>Number</td>
				<td></td>	
				<td></td>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
			<tr id="{{$contact->id}}">
				<td></td>
				<td>{{$contact->name}}</td>
				<td>{{$contact->number}}</td>	
				<td>
					<a href="#">
						<button id='edit' class="btn btn-outline-primary btn-custom-outline-primary btn-custom" onclick="getUserToEdit(this)"  data-toggle="modal" data-target="#myModal">
						Edit Contact
						</button>	
					</a>
				</td>
				<td>
					<a href="#">
						<button class="btn btn-outline-danger btn-custom-outline-danger btn-custom" onclick="deleteUser(this)">
						Delete User
						</button>	
					</a>
				</td>
			</tr>
			@endforeach	

		</tbody>

	</table>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
      	<h4 class="modal-title">Edit contact</h4>  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      	<form id="editContact" method="post" action="{{route('updatecontact')}}">	
      		@csrf
      	  <div class="modal-body">
      		<input type="hidden"  id="contact_id" name="contact_id" value="">	
      		<label for="contact_name" class="col-md-4 col-form-label ">Name</label>
	        <input id="contact_name" type="text" class="form-control @error('name') is-invalid @enderror" name="contact_name" value="" placeholder="Please enter name" required autocomplete="name" autofocus>
	        <label for="name" class="col-md-4 col-form-label ">Contact</label>
	        <input id="contact_number" type="text" class="form-control @error('name') is-invalid @enderror" name="contact_number" value="" placeholder="Please enter name" required autocomplete="name" autofocus>
	      </div>
	      <div class="modal-footer">
	        <button id="update" type="submit" class="btn btn-primary" >Update</button>
	      </div>
      </form>
    </div>

  </div>
</div>


</div>

 <!-- <example-component :contact={{$contacts}}></example-component> -->


<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$("#addContact").hide()	
	




	$(document).ready(function(){
		
		$("#addBtn").click( function(){
			
				$("#addContact").show()
			
		})


		$.ajax({
			type: "GET",
			url: '/command',
			success: function(data, textStatus, jqXHR){
				
				console.log(data)

			},
			error: function (jqXHR, textStatus, errorThrown){
				
			}
		});

	})


	function getUserToEdit(btn){
	
		 id = $(btn).parents('tr:first').attr('id');
		
		$.ajax({
			type: "GET",
			url: '/contact/{id}',
			data : {'id' : id},
			success: function(data, textStatus, jqXHR){
				
				$('#contact_name').val(data.name);
				$('#contact_number').val(data.number);
				$("#contact_id").val(data.id)

			},
			error: function (jqXHR, textStatus, errorThrown){
				
			}
		});
	}


	function deleteUser(btn){
		id = $(btn).parents('tr:first').attr('id');
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		swal({		
		   	title: "Are you sure?",
		    text: "This contact will be permantly deleted",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Yes, I am sure!',
			cancelButtonText: "No, cancel it!"
		},function(isConfirm){
			if(isConfirm){
				$.ajax({
					type: "POST",
					url: '/delete',
					data : {id : id},
					success: function(data, textStatus, jqXHR){

						if(data.success != ""){
							location.reload();
						}
					

					},
					error: function (jqXHR, textStatus, errorThrown){

					}
				});
			}
		}


		);
	}	


	
</script>



@endsection