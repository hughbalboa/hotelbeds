<?php namespace StayForLong\HotelBeds\Contracts;

/**
 * Interface ClientReferenceInterface
 * @package StayForLong\HotelBeds
 *
 *
"clientReference": "IntegrationAgen"
 *
 */
interface ClientReferenceInterface {
	public function setComments($a_references);
	public function getComments();
}