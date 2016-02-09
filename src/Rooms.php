<?php namespace StayForLong\HotelBeds;


use StayForLong\HotelBeds\Contracts\RoomsInterface;

/**
 * Class Rooms
 * @package StayForLong\HotelBeds
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
class Rooms implements RoomsInterface
{
	private $rooms_data;

	/**
	 * @param string $a_rate_key
	 * @param int $key_room
	 * @return $this
	 *
	 * "rateKey": "99658|TPL.ST|OP-TODOS|1|BB||1~2~0|30~26~8|20150507#-1975458463",
	 */
	public function setRateKey($a_rate_key, $key_room)
	{
		$this->rooms_data[$key_room]['rateKey'] = $a_rate_key;
		return $this;
	}

	/**
	 * @param array $some_paxes
	 * @return $this
	 *
	 {
	  "type": "AD",
	  "age": 30,
	  "name": "AdultName",
	  "surname": "Surname"
	 },
	 *
	 */
	public function setPaxes(array $some_paxes, $key_room)
	{
		$this->rooms_data[$key_room]['paxes'] = $some_paxes;
		return $this;
	}

	public function getRooms()
	{
		return $this->rooms_data;
	}
}