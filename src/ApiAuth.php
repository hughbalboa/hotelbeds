<?php namespace StayForLong\HotelBeds;


class ApiAuth {
	const HASHING = "sha256";

	private $api_key;

	private $secret;

	public function __construct( $an_api_key, $a_secret)
	{
		$this->api_key = $an_api_key;
		$this->secret = $a_secret;
	}

	public function __invoke()
	{
		return [
			'signature' => $this->getSignature(),
			'key'		=> $this->api_key,
		];
	}

	private function getSignature()
	{
		return hash(static::HASHING, $this->api_key . $this->secret . time());
	}
}