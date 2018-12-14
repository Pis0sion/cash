<?php 
class connectRedis
{
	protected $redis;


	public function __construct(){
		$this->redis = new Redis();
		$this->redis->connect("127.0.0.1", 6379);
		$this->redis->auth("123456");
	}


	public function ping(){
		return $this->redis->ping();
	}

	public function getData($name){
		return $this->redis->get($name);
	}

	public function setexData($name,$data){
		return $this->redis->setex($name,"10",$data);
	}
}

?>