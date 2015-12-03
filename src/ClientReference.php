<?php
/**
 * Created by PhpStorm.
 * User: raul
 * Date: 24/11/15
 * Time: 17:22
 */

namespace StayForLong\HotelBeds;


use StayForLong\HotelBeds\Interfaces\ClientReferenceInterface;

class ClientReference implements ClientReferenceInterface {
	private $comment;

	public function setComments($a_references)
	{
		$this->comment = $a_references;
		return $this;
	}

	public function getComments()
	{
		return $this->comment;
	}
}