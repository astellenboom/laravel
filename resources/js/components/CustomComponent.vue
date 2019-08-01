<template>
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
						<button id='edit' class="btn btn-outline-primary btn-custom-outline-primary btn-custom" onclick="editUser(this)">
						Edit Contact
						</button>	
					</a>
				</td>
				<td>
					<a href="#">
						<button class="btn btn-outline-danger btn-custom-outline-danger btn-custom">
						Delete User
						</button>	
					</a>
				</td>
			</tr>
			@endforeach	

		</tbody>

	</table>

</div>
</template>