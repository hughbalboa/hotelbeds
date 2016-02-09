<?php namespace StayForLong\HotelBeds\Contracts;

/**
 * Interface RoomsInterface
 * @package StayForLong\HotelBeds
 *
 *
"rooms": [
	{
	  "rateKey": "99658|TPL.ST|OP-TODOS|1|BB||1~2~0|30~26~8|20150507#-1975458463",
	  "paxes": [
		{
		  "type": "AD",
		  "age": 30,
		  "name": "AdultName",
		  "surname": "Surname"
		},
		{
		  "type": "AD",
		  "age": 30,
		  "name": "AdultName",
		  "surname": "Surname"
		}
	  ]
	}
],
 *
 */
interface RoomsInterface {
	public function setRateKey($a_rate_key, $key_room);
	public function setPaxes(array $some_paxes, $key_room);
	public function getRooms();
}