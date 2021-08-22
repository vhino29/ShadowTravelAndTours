<template>
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            Filter
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="row">
                <div class="col-md-12 col-12" v-for='(hotel, index) in hotelList' :index='index'>
                    <a v-bind:href="'hotel-details?' + Object.keys(search_data).map(key => key + '=' + search_data[key]).join('&') + 
                        '&api=' + hotel.api_code + '&hotelid=' + hotel.hotel_id + '&searchid=' + hotel.search_id " 
                        target="_blank" style="text-decoration:none; color : #000000;">
                        <hotel-item-list v-bind:hotel_data="hotel"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['search_data'],
    data() {
        return {
            hotelList: [],
        };
    },
    mounted() {
        var searchData = this.$props.search_data;
        var params = {
            'type':searchData['type'],
            'id':searchData['id'],
            'checkin':searchData['checkin'],
            'checkout':searchData['checkout'],
            'rooms':searchData['rooms'],
            'adults':searchData['adults'],
            'children':searchData['children'],
            'children_age_list':searchData['childAge'],
        }
        this.getHotelList("/api/agoda/hotels", params);
    },
    created() {
    },
    updated() {
    },
    methods:{
        getHotelList(url, params) {
            const config = {
                method: 'POST',
                url: url,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                data: params
            }

            axios(config)
                .then(response => {
                    this.getHotelListData(response.data.data,
                        response.data.agoda_hotels,
                        response.data.hotel_pictures)

                    this.getRemainingLinks(response.data.meta.links, params);
                })
                .catch(errors => {
                    console.log(errors);
                })
        },
        getHotelListData(hotelList, agodaList, hotelPictures) {
            let hotels = [];

            hotelList.map((itm, idx) => {
                let agodaData = agodaList[itm.agoda_hotel_id];
                let hotelPicture = hotelPictures[itm.agoda_hotel_id];

                if(agodaData !== undefined && agodaData !== null){
                    const hotel = {
                        ...itm,
                        ...agodaData,
                        ...hotelPicture
                    }
                    hotels.push(hotel);
                }
            });

            if(hotels.length > 0) {
                this.hotelList = this.hotelList.concat(hotels);
            }
        },
        getRemainingLinks(links, params) {
            links.map((link, idx) => {
                if(!link.active && !link.label.includes('Previous') && !link.label.includes('Next')){
                    const config = {
                        method: 'POST',
                        url: link.url,
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        data: params
                    }

                    axios(config)
                        .then(response => {
                            this.getHotelListData(response.data.data,
                                response.data.agoda_hotels,
                                response.data.hotel_pictures)
                        })
                        .catch(errors => {
                            console.log(errors);
                        })
                }
            });
        }
    }
};
</script>