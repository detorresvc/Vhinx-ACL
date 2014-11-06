<?php
 
use Illuminate\Database\Seeder;
use Vhinx\Acl\models\User;
use Vhinx\Acl\models\Group;
use Vhinx\Acl\models\Resource;

class DataSeeder extends Seeder {
 
  public function run()
  {
       Eloquent::unguard();
     $user =  User::create(array(
        'username' => 'admin',
        'password' => Hash::make('admin'),
        'email' => 'detorresvc@ymail.com',
        
      ));
      
      
     $group = Group::create(array(
        'name' => 'admin'
      ));
      
      $user->groups()->attach([1]);
      
      Resource::create(array(
          'name'    => 'users.login',
          'pattern' => '/',
          'target'  => 'Vhinx\Acl\controllers\UsersController@login',
          'secure'  => 0
      ));
      
      Resource::create(array(
          'name'    => 'users/logout',
          'pattern' => '/logout',
          'target'  => 'Vhinx\Acl\controllers\UsersController@logout',
          'secure'  => 0
      ));
      
      Resource::create(array(
          'name'    => 'users.home',
          'pattern' => '/home',
          'target'  => 'Vhinx\Acl\controllers\UsersController@home',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'users.index',
          'pattern' => '/users/index',
          'target'  => 'Vhinx\Acl\controllers\UsersController@index',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'users.add',
          'pattern' => '/users/add',
          'target'  => 'Vhinx\Acl\controllers\UsersController@add',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'users.edit',
          'pattern' => '/users/edit/{id}',
          'target'  => 'Vhinx\Acl\controllers\UsersController@edit',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'users.delete',
          'pattern' => '/users/delete/{id}',
          'target'  => 'Vhinx\Acl\controllers\UsersController@delete',
          'secure'  => 1
      ));
      //
      Resource::create(array(
          'name'    => 'groups.index',
          'pattern' => '/groups/index',
          'target'  => 'Vhinx\Acl\controllers\GroupsController@index',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'groups.add',
          'pattern' => '/groups/add',
          'target'  => 'Vhinx\Acl\controllers\GroupsController@add',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'groups.edit',
          'pattern' => '/groups/edit/{id}',
          'target'  => 'Vhinx\Acl\controllers\GroupsController@edit',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'groups.delete',
          'pattern' => '/groups/delete/{id}',
          'target'  => 'Vhinx\Acl\controllers\GroupsController@delete',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'groups.resources',
          'pattern' => '/groups/resources/{id}',
          'target'  => 'Vhinx\Acl\controllers\GroupsController@resources',
          'secure'  => 1
      ));
      //resource
      
      Resource::create(array(
          'name'    => 'resources.index',
          'pattern' => '/resources/index',
          'target'  => 'Vhinx\Acl\controllers\ResourcesController@index',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'resources.add',
          'pattern' => '/resources/add',
          'target'  => 'Vhinx\Acl\controllers\ResourcesController@add',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'resources.edit',
          'pattern' => '/resources/edit/{id}',
          'target'  => 'Vhinx\Acl\controllers\ResourcesController@edit',
          'secure'  => 1
      ));
      
      Resource::create(array(
          'name'    => 'resources.delete',
          'pattern' => '/resources/delete/{id}',
          'target'  => 'Vhinx\Acl\controllers\ResourcesController@delete',
          'secure'  => 1
      ));
      
      $i=1;
      $res = array();
      while($i<=16){
          $res[] = $i;
          $i++;
      }
      
      
      $group->resources()->attach($res);
      $this->command->info('Tables seeded!');
  }
 
}
