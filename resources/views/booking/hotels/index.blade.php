@extends('layouts.app')

@section('content')
<div class="content-wrapper pb-0">
	<div class="page-header">
		<h3 class="page-title">Hotels</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('hotel.booking') }}">Hotel</a></li>
				<li class="breadcrumb-item active" aria-current="page"> Search </li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<form class="forms-sample" method="GET" action="{{ route('hotel.search') }}">
						<div class="row form-group">
							<label>City or Destination</label>
							<select name="destination" class="js-example-basic-single" style="width: 100%;" required>
								<option value="" disabled selected>Select City</option>
								@foreach($cities as $city) 
									<option value="{{'CTY-'.$city->id}}">{{ $city->name }}, {{ $city->country->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="row form-group">
							<div class="col-12 col-md-5 p-1">
								<label>Check In</label>
								<input type="text" id="hotel_checkin" name="checkin" class="form-control hotel-checkin" placeholder="DD-MMM-YYYY" readonly="" style="background-color:white;" required>
							</div>
							<div class="col-12 col-md-5 p-1">
								<label>Check Out</label>
								<input type="text" id="hotel_checkout" name="checkout" class="form-control hotel-checkout" placeholder="DD-MMM-YYYY" readonly="" style="background-color:white;" required>
							</div>
							<div class="col-12 col-md-2 p-1">
								<label>Duration</label>
								<input type="text" id="hotel_duration" name="duration" class="form-control hotel_duration" readonly="" style="background-color:white;" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-md-4 p-1">
								<label>Rooms</label>
								<input type="number" min="1" max="6" value="1" id="hotel_rooms" name="rooms" class="form-control" required>
							</div>
							<div class="col-12 col-md-4 p-1">
								<label>Adults</label>
								<input type="number" min="1" max="15" value="1" id="hotel_adults" name="adults" class="form-control" required>
							</div>
							<div class="col-12 col-md-4 p-1">
								<label>Children</label>
								<input type="number" min="0" max="6" value="0" id="hotel_children" name="children" class="form-control" required >
							</div>
    					</div>
						<div id="hotel-search-child-ages" class="row form-group">
						</div>
                      	<button type="submit" class="btn btn-primary mr-2"> Search </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div
@endsection