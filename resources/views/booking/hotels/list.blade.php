@extends('layouts.app')

@section('content')
<div class="content-wrapper p-0">
	<div class="page-header">
		<h3 class="page-title">Hotels</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('hotel.booking') }}">Hotel</a></li>
				<li class="breadcrumb-item"> Search </li>
				<li class="breadcrumb-item active" aria-current="page"> Results </li>
			</ol>
		</nav>
	</div>

	<hotel-list v-bind:search_data = "{{ json_encode($searchData) }}"/>
</div>
@endsection