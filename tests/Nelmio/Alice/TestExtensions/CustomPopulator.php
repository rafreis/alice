<?php

namespace Nelmio\Alice\TestExtensions;

use Nelmio\Alice\Instances\Fixture;
use Nelmio\Alice\Instances\Populator\Methods\MethodInterface as PopulatorInterface;

class CustomPopulator implements PopulatorInterface {

	public function canSet(Fixture $fixture, $object, $property, $value)
	{
		return preg_match('/MagicMethodPopulated/', $fixture->getClass());
	}

	/**
	 * this custom populator uses magic methods to set properties
	 */
	public function set(Fixture $fixture, $object, $property, $value)
	{
		return $object->$property = $value;
	}

}