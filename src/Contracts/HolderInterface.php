<?php namespace StayForLong\HotelBeds\Contracts;


interface HolderInterface {
	public function setFirstName($a_first_name);
	public function setLastName($a_last_name);

	public function getHolderData();
}