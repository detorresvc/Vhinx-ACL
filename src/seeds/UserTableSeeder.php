<?php
 use Vhinx\Acl\models\User;
use Vhinx\Acl\models\Group;
use Vhinx\Acl\models\Resource;
class UserTableSeeder extends Seeder {
 
  public function run()
  {
      User::create(array(
        'username' => 'admin',
          'password' => Hash::make('admin'),
        
        'email' => 'detorresvc@ymail.com',
        
      ));
  }
 
}
