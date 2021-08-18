<?php
namespace App\Libraries; 

class AppUtility 
{
	public function getPaginateLimit()
	{
		$paginate = intval(env('API_PAGINATE',25));

		if($paginate > 50)
		{
			$paginate = 50;
		}

		return $paginate;
	}
}