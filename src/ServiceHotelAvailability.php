<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelAvailability
{
	private $response;

	public function __construct(ServiceRequest $request, $hotel_code)
	{
		$this->response = $request->setOptions("hotels")
			->setOptions($hotel_code)
			->send();
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