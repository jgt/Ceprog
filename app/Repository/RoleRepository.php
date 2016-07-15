<?php  namespace App\Repository;

use Bican\Roles\Models\Role;

class RoleRepository extends BaseRepository {

	public function getModel()
	{

		return new Role();
	}
	
	
}