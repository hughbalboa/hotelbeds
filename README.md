# PHP HotelBeds APITUDE
PHP API to interact with Hotel Beds APITUDE, compatible with version 0.2

## Instalation
composer require stayforlong/hotelbeds

### composer.json
```
"psr-4": {
	"StayForLong\\HotelBeds\\": "vendor/stayforlong/hotelbeds/src/"
}
```

## Configuration:
```
$hotel_beds_config = [
	'api_key' 		=> '{YOUR_API_KEY}',
	'secret'  		=> '{YOUR_SECRET}',
	'url_content'   => "https://api.test.hotelbeds.com/hotel-content-api/0.2/",
	'url_hotels'    => "https://api.test.hotelbeds.com/hotel-api/0.2/",
];
```

## Authentification:
```
$api_auth = new ApiAuth($hotel_beds_config['api_key'], $hotel_beds_config['secret']);
```

# Services Content
## Hotels
https://developer.hotelbeds.com/docs/read/apitude_content/Hotel_Operation

### Examples
Hotels list form PMI:
```
$api_params      = [
	"fields" 		  => "all",
	"destinationCode" => "PMI",
	"language"        => "ENG",
	"from"            => 1,
	"to"              => 20,
];

$request = new ServiceRequest($api_auth, $hotel_beds_config['url_content'], $api_params);
$service_hotels_list = new ServiceHotelsList($request);

$response = $service_hotels_list();
```

## Locations
https://developer.hotelbeds.com/docs/read/apitude_content/location_operations
1. Country Operations: it will return the list of available countries.
2. Destinations Operations: it will return the list of available destinations, zones and grouping zones.

Locations Destinations:
```
$api_params      = [
	"fields" 		  => "name,description,countryCode,destinationCode",
	"destinationCode" => "ES",
	"language"        => "ENG",
	"from"            => 1,
	"to"              => 10,
];

$request = new ServiceRequest($api_auth, $hotel_beds_config['url_content'], $api_params);
$service_locations_list = new ServiceTypesList($request);

$response = $service_locations_list();
```

## Types
https://developer.hotelbeds.com/docs/read/apitude_content/types_operations

1. Accommodations Operation: it will return the list of available accommodation types.
2. Boards Operation: it will return the list of available board types.
3. Categories Operation: it will return the list of available Categories.
4. Chains Operation: it will return the list of available Chains.
5. Currencies Operation: it will return the list of available Currencies.
6. Facilities Operation: it will return the list of available Facilities.
7. Facilitygroups Operation: it will return the list of available Facilitygroups.
8. Facilitytypologies Operation: it will return the list of available Facilitytypologies.
9. Issues Operation: it will return the list of available Issues.
10. Languages Operation: it will return the list of available Languages.
11. Promotions Operation: it will return the list of available Promotions.
12. Rooms Operation: it will return the list of available Rooms.
13. Segments Operation: it will return the list of available Segments.
14. Terminals Operation: it will return the list of available Terminals.
15. Image Types Operation: it will return the descriptions of the different image types.
16. Category Groups Operation: it will return the descriptions of the different category groups.
17. Rate Comments Operation: it will return the descriptions of the rate comments associated to the hotel that the hotelier wants the client to know before confirming the booking.

### Examples
Types Facilities:
```
$api_params      = [
	"fields" 	=> "all",
	"language"  => "ENG",
	"from"      => 1,
	"to"        => 100,
];

$request = new ServiceRequest($api_auth, $hotel_beds_config['url_content'], $api_params);
$service_types_list = new ServiceTypesList($request);

$response = $service_types_list();
```
