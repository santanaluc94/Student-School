<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function formatUserData(array $data): array
{
	$data['birthday'] = date("d-m-Y", (int) $data['birthday']);
	$data['gender'] = formatGender($data['gender']);

	return $data;
}

function formatGender(string $gender): string
{
	if ($gender === "Male") {
		$value = 1;
	} elseif ($gender === "Female") {
		$value = 2;
	} elseif ($gender === "Other") {
		$value = 3;
	} else {
		$value = '';
	}

	return $value;
}
