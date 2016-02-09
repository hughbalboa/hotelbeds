<?php
/**
 * Created by PhpStorm.
 * User: raul
 * Date: 24/11/15
 * Time: 17:22
 */

namespace StayForLong\HotelBeds;


use StayForLong\HotelBeds\Contracts\ClientReferenceInterface;

class ClientReference implements ClientReferenceInterface {
	private $comment;
	private $reference;

	public function setReference($a_reference)
	{
		$this->reference = $a_reference;
		return $this;
	}

	public function getReference()
	{
		return $this->reference;
	}

	public function setComments($a_comment)
	{
		$this->comment = $a_comment;
		return $this;
	}

	public function getComments()
	{
		return $this->comment;
	}
}