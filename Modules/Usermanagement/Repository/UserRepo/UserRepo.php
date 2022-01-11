<?php
namespace Modules\Usermanagement\Repository\UserRepo;
use Illuminate\Http\Request;
use Modules\Usermanagement\Entities\User;
use Modules\Usermanagement\Repository\UserRepo\UserRequest;
use Modules\Usermanagement\DataTables\UserDataTable;

class UserRepo implements UserInterface{
	private $user;

	public function __construct(User $user){
		$this->user=$user;
	}

	/**
	 * @return user list
	 */
	public function getUserList(){
		return $this->user->orderBy('created_at','desc')->get();
	}

	/**
	 * @return creat user
	 */
	public function storeUser(Request $request){
		$user=$this->user->create($request->except('_token','permission','role','password_confirmation'));
		$permissions=$request->permission;
		$roles=$request->role;
		if($permissions)
			$user->attach($permissions);
		if($roles)
			$user->attach($roles);
		return $user;
	}

	/**
	 * @return find user according to id
	 */
	public function findUser($id){
		return $this->user->with('permissions','roles')->find($id);
	}

    /**
	* @return update user according to id
	 */
	public function updateUser(Request $request,$id){
		$user=$this->findUser($id);
		$user->update($request->except('_token','permission','role'));
		$permissions=$request->permission ?? [];
		$roles=$request->role ?? [];
		$user->permissions()->detach();
		$user->permissions()->attach($permissions);
		$user->roles()->detach();
		$user->roles()->attach($roles);
		return $user;
	}

	/**
	 * @return delete user
	 */
	public function deleteUser(Request $request){
		$user=$this->findUser($request->id);
		$user->permissions->detach();
		$user->roles->detach();
		return $user->delete();
	}

	/**
	 * @return datatable
	 */
	public function dataTableList(){
		return (new UserDataTable)->dataTable($this->user);
	}
}