<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

  //   	$this->redis = new \Redis();
		// $this->redis->connect(C(('REDIS_HOST')), C('REDIS_PORT'));
		// $this->redis->auth(C('REDIS_PASSWORD'));
		// $a = $this->redis->LPOP('click');
		// for($i=0;$i<100;$i++){
		// 	$rand = rand(0, 999);
		// 	$this->redis->LPUSH('click', $random);
		// 	$len = $this->redis->LLEN('click');
		// }
		// $this->redis->LPUSH('click', $random);
		// $len = $this->redis->LLEN('click');
		// var_dump($a, $len);

    	$users = [
    		'1'=>['name'=>'zhangsan'],
    		'2'=>['name'=>'lisi'],
    	];
    	$this->assign('random', $random);
    	$this->assign('users', $users);
    	$this->assign("word", "Hello World!");
        $this->display();
    }

    public function list_pop(){
    	$redis = new \Redis();
		$redis->connect(C(('REDIS_HOST')), C('REDIS_PORT'));
		$redis->auth(C('REDIS_PASSWORD'));
		while (true) {
			$len = $redis->LLEN('click');
	    	if($len>0){
	    		$redis->LPOP('click');
	    	}
	    	echo "len=".$len."\n";
	    	sleep(5);
		}
    }

    public function add()
    {
        $this->display();
    }
}