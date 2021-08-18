<?php

$agodaENV       = env('AGODA_ENV', 'test');
$defaultURL     = $agodaENV === 'live' 
                    ? "https://affiliateapisecure.agoda.com/xmlpartner/xmlbookservice"
                    : "https://sandbox-affiliateapisecure.agoda.com/xmlpartner/xmlbookservice"
;
return [
    'IsActive'      => env('AGODA_IS_ACTIVE', false) === true,
    'AllowDuplicate'=> env('AGODA_ALLOW_DUPLICATE', false)  === true,
    'ENV'           => $agodaENV,

    'DefaultURL'    => $defaultURL,

    'SearchHotel'   => $agodaENV === 'live' 
                        ? "https://affiliateapi7643.agoda.com/xmlpartner/XmlService/search_lrv3"
                        : "http://sandbox-affiliateapi.agoda.com/xmlpartner/xmlservice/search_lrv3",

    'PreCheck'      => $agodaENV === 'live' 
                        ? "https://affiliateapiservices.agoda.com/api/v1/prebooking/precheck"
                        : "http://sandbox-affiliateapiservices.agoda.com/api/v1/prebooking/precheck",

    'HotelAPIKey'   => env('AGODA_HOTEL_API_KEY',   '151E8CDE-B839-498A-A891-1AB5963BFF10'),
    'HotelSiteID'   => env('AGODA_HOTEL_SITE_ID',   '1641643'),

    'HomesAPIKey'   => env('AGODA_HOMES_API_KEY',   '8770F353-5BD4-4006-961C-439B59FC56F9'),
    'HomesSiteID'   => env('AGODA_HOMES_SITE_ID',   '1842801'),

    'DataFeed'      => env('AGODA_DATA_FEED',       'http://affiliatefeed.agoda.com/datafeeds/feed/getfeed'),
    'DataCDS'       => env('AGODA_DATA_CDS',        'http://affiliateapiservices.agoda.com/api/cds/changes'),

    'HotelBooking'          => $defaultURL.env('AGODA_HOTEL_BOOKING',           '/book_v3'),
    'HotelBookingList'      => $defaultURL.env('AGODA_HOTEL_BOOKING_LIST',      '/booklist_v2'),
    'HotelBookingDetail'    => $defaultURL.env('AGODA_HOTEL_BOOKING_DETAIL',    '/bookdetail_v2'),
    'HotelCancelBooking'    => $defaultURL.env('AGODA_HOTEL_CANCEL_BOOKING',    '/cancel_service'),
    'HotelConfirmCancel'    => $defaultURL.env('AGODA_HOTEL_CONFIRM_CANCEL',    '/confirmcancel_service'),
    'HotelBookingSplReq'    => $defaultURL.env('AGODA_HOTEL_BOOKING_SPLREQ',    '/sendspecialrequest_service'),

    'BookingService'        => env('AGODA_BOOKING_SERVICE',         'http://xml.agoda.com'),
    'BookingSchema'         => env('AGODA_BOOKING_SCHEMA',          'http://www.w3.org/2001/XMLSchema-instance'),
    'BookingSchemaLocation' => env('AGODA_BOOKING_SCHEMA_LOCATION', 'http://xml.agoda.com/BookingRequestV3.xsd'),
];