<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelAvailability
{
	private $response;

	public function __construct(ServiceRequest $request, $hotels_code, $api_params)
	{
		$request_data = $api_params;
		$request_data['hotels']['hotel'] = $hotels_code;

		$this->response = $request
			->setOptions("hotels")
			->setHeaders(['json' => $request_data])
			->send("POST");
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelAvailabilityException($e->getMessage());
		}
	}
}

class ServiceHotelAvailabilityException extends \ErrorException
{
}