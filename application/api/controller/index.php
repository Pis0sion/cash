<?php
header("Content-type: text/html; charset=utf-8"); 
require("./connectRedis.php");
echo "<pre>";
class myIterator implements Iterator
{
    public $position = 0;
    public $arr = [];
 
    public function __construct($sql = null)
    {
        $link = mysqli_connect('101.132.172.189', 'qp_wangteng_xyz', 'HN6wNPy33ykzmnBr', 'test');
        $rec = mysqli_query($link, $sql);
        $this->arr = mysqli_fetch_all($rec, MYSQLI_ASSOC);
        $this->position = 0;
    }
 
    public function rewind()
    {
        $this->position = 0 ;
    }
 
    public function current()
    {
        return $this->arr[$this->position] ;
    }
 
    public function key()
    {
        return $this->position;
    }
 
    public function next()
    {
        ++$this->position;
    }
    public function valid()
    {
        return isset($this->arr[$this->position]);
    }
}
//迭代器+redis实现递归指定子集数据
function getList($userid,$dataId){
    $redis = new connectRedis();
    $blog = $redis->getData("data_".$userid);
    $blog = false ;
    if(!$blog){
        $it = new myIterator('select * from `china`');
        return listTotree(doArray($it->arr));
    }else{
        $array = json_decode($blog,true);
        return $array;
    }
}


function listTotree($lists)
{
    $res = [];
    foreach($lists as $key=>$item)
    {
        if(isset($lists[$item['Pid']]))
        {
            $lists[$item['Pid']]['son'][] = &$lists[$key];
        }else{
            $res[] = &$lists[$key];
        }
    }
    return $res ;
}

function doArray($current)
{
    $keys = array_column($current,"Id");
    $re = array_combine($keys,$current);
    unset($re[341402]);
    unset($re[0]);
    return $re ;
}



$start = microtime(true);
$data = getList(1,0);
var_dump($data);
$end = microtime(true);
echo $end-$start;
echo PHP_EOL;





