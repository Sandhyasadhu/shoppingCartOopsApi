<?php
class Authentication{
    public $username ;
	function authenticate($username){
		
		$GLOBALS['db']->query("select id,username,role_id from users  where username='".$username."'  ");
		$userDetails = $GLOBALS['db']->getrec();
        $userId      = $userDetails['id'];
        $roleId      = $userDetails['role_id'];
		return $roleId;
	}
		
}
$authenticate = new Authentication();
?>
