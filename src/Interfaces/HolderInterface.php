<?php namespace StayForLong\HotelBeds\Interfaces;


interface HolderInterface {
	public function setFirstName($a_first_name);
	public function setLastName($a_last_name);

	public function getHolderData();
}