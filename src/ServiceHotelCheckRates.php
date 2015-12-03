<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelCheckRates
{
	private $response;

	public function __construct(ServiceRequest $request, $rate_key)
	{
		$rate_data =
			[
				"rooms" => [
					0 => [ "rateKey" => $rate_key ]
				]
			];

		$this->response = $request
			->setHeaders(['json' => $rate_data])
			->setOptions("checkrates")
			->send("POST");
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelCheckRatesException($e->getMessage());
		}
	}
}

class ServiceHotelCheckRatesException extends \ErrorException
{
}