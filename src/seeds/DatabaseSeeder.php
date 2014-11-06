<?php
use Illuminate\Database\Seeder;
use Vhinx\Acl\models\User;
use Vhinx\Acl\models\Group;
use Vhinx\Acl\models\Resource;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('DataSeeder');
	}

}
