<?php

namespace StayForLong\HotelBeds;

final class ServiceTypesList
{
	/**
	 * @var ServiceRequest
	 */
	private $request;

	/**
	 * @param ServiceRequest $request
	 * @param $type
	 * @throws ServiceTypesListException
	 */
	public function __construct(ServiceRequest $request, $type)
	{
		try {
			$this->request = $request
				->setOptions("types")
				->setOptions($type);

		} catch (ServiceRequestException $e) {
			throw new ServiceTypesListException($e->getMessage());
		}
	}

	/**
	 * @return mixed
	 * @throws ServiceTypesListException
	 */
	public function __invoke()
	{
		try {
			$response = $this->request
				->send()
				->getBody();

			return json_decode($response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceTypesListException($e->getMessage());
		}
	}
}

class ServiceTypesListException extends \ErrorException
{
}