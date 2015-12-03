<?php namespace StayForLong\HotelBeds;

use StayForLong\HotelBeds\Interfaces\HolderInterface;

/**
 * Class Holder
 * @package StayForLong\HotelBeds
 *
"holder": {
	"name": "IntegrationTestFirstName",
	"surname": "IntegrationTestLastName"
},
 */
class Holder implements HolderInterface
{
	private $first_name;
	private $last_name;

	public function setFirstName($a_first_name)
	{
		$this->first_name = $a_first_name;
		return $this;
	}

	public function setLastName($a_last_name)
	{
		$this->last_name = $a_last_name;
		return $this;
	}

	public function getHolderData()
	{
		return [
			"name" => $this->first_name,
			"surname" => $this->last_name,
		];
	}
}