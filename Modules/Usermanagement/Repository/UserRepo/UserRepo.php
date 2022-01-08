<?php
namespace Modules\Usermanagement\Repository\UserRepo;

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
		return $this->user->create($request->except('_token'));
	}

	/**
	 * @return find user according to id
	 */
	public function findUser($id){
		return $this->user->find($id);
	}

    /**
	* @return update user according to id
	 */
	public function updateUser(Request $request,$id){
		$user=$this->findUser($id);
		return $user->update($request->except('_token'));
	}

	/**
	 * @return delete user
	 */
	public function deleteUser(Request $request){
		$user=$this->findUser($request->id);
		return $user->delete();
	}

}