<template>
	<div class="card">
		<div class="card-body p-2">
			<div class="row">
				<div class="col-12 col-md-3">
					<img :src="hotel_data.picture_url" alt="" style="width: 190px; height: 175:px;">
				</div>
				<div class="col-12 col-md-9">
					<div class="row">
						<div class="col-12 col-md-12">
							<h4>{{ hotel_data.name }}</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-9">
							<div class="row">
								{{ hotel_data.address_line_1 }}
							</div>
							<div class="row">
								Rating: {{ hotel_data.rating_average }}
							</div>
							<div class="row">
								Star: {{ hotel_data.star_rating }}
							</div>
							<div class="row">
								Popularity: {{ hotel_data.popularity_score }}
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="row">
								<h5>per night : {{ hotel_data.room_rates[0].rate_info.inclusive }}</h5>
							</div>
							<div class="row">
								<h5>total : {{ hotel_data.room_rates[0].total_payment.inclusive }}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
    props: ['hotel_data'],
}
</script>