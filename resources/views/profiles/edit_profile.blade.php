@extends('layouts.app')

@section('content')
	<h3>{{$title}}</h3>
	<hr>
	<form action="/profiles/update_profile/{{$profile->user_id}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')

		<div class="row">
			<div class="col-sm-2">
				<img src="/images/{{$profile->picture}}" style="width:150px; height:150px; float:left; border-radius:50%; margin:0 auto">
				{{-- <button style="display:block;width:120px; height:30px; margin:0 auto" onclick="document.getElementById('getFile').click()">Choose File</button> --}}
				<input type="file" name="picture">
			</div>

			<div class="col-sm-10">
				<div class="form-group">
					<label for="name" class="control-label">Name</label>
					<input type="text" name="name" placeholder="Name" value="{{ucfirst(trans($profile->user->name))}}" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="age" class="control-label">Age</label>
					<input type="number" name="age" id="age" class="form-control" value="{{$profile->age}}" min="0" oninput="this.value = Math.abs(this.value)">
				</div>

				<div class="form-group">
					<label for="bio" class="control-label">Bio</label>
					<textarea name="bio" id="bio" class="form-control">{{$profile->bio}}</textarea>
				</div>

				<div class="form-check">
					<input class="form-check-input" id="female" type="radio" name="gender" value="Female" {{($profile->gender == "Female") ? "checked" : ""}}>
					<label class="form-check-label" for="female">Female</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" id="male" type="radio" name="gender" value="Male" {{($profile->gender == "Male") ? "checked" : ""}}>
					<label class="form-check-label" for="male">Male</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" id="lgbt" type="radio" name="gender" value="LGBT" {{($profile->gender == "LGBT") ? "checked" : ""}}>
					<label class="form-check-label" for="lgbt">LGBT</label>
				</div>
				<br>
				
				<input type="submit" name="submit" value="Submit" class="btn btn-success" style="float:right">
			</div>
		</div>
	</form>
@endsection