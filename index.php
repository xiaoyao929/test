<?php

// $store = 100;
// $redis = new Redis();
// $con = $redis->connect('127.0.0.1',6379);
// $len = $redis->llen("goods_store");
// $count = $store - $len ;
// for($i=0;$i<$count;$i++){
//     $redis->lpush('goods_store',1);
// }
// echo $redis->llen("goods_store");
// die;
// echo 8;die;

$arr = array(1,3,6,5,7,2,9);


//冒泡升序
function bundleSort($arr){
    $len = count($arr);
    for($i=1;$i<$len;$i++){
        for($j=0;$j<$len-$i;$j++){
            if($arr[$j] < $arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
            }
        }
    }
    return $len;
 }


//选择排序，每循环一次找到最小值，与当前位置值交换

function selectSort($arr){
    $len = count($arr);
    for($i=0;$i<$len-1;$i++){
        $low = $i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$low]>$arr[$j]){
                $low = $j;
            }
        }
        if($low != $i){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$low];
            $arr[$low] = $tmp;
        }
    }
    return $arr;
}


//快速排序
function quickSort($arr){
    if(count($arr) <= 1){
        return $arr;
    }
    $base = $arr[0];
    $left_arr = array();
    $right_arr = array();
    for($i=1;$i<count($arr);$i++){
        if($base<$arr[$i]){
            $right_arr[]=$arr[$i];
        }else{
            $left_arr[]=$arr[$i];
        }
    }

    $left = quickSort($left_arr);
    $right = quickSort($right_arr);
    return array_merge($left,array($base),$right);
}

var_dump(quickSort($arr));
die;










echo strlen("你好");
// $pattern = "/^1[34578]{1}\d{9}$/";
$pattern = "/^.*\w{1,}\/\d{1,}$/";
$pattern = "/^.+@.*.\w{2,3} $/";
preg_match_all($pattern, "http://www.yunspace.com.cn/site/6",$arr);
var_dump($arr);



//将数组从小到大排序

$arr=array(1,43,54,62,21,66,32,78,36,76,39);  

//1.冒泡排序
function bubbleSort($arr){
    $len = count($arr);
    //循环次数
    for($i=1;$i<$len;$i++){
        //每次循环都两两比较，每次循环都会把最大的值放到最后
        for($j=0;$j<$len-$i;$j++){
            if($arr[$j] > $arr[$j+1] ){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
            }
        }
    }
    return $arr;
}





var_dump(bubbleSort($arr));
die;














 $i=1;
// echo ++$i;
// echo $j++;
// echo $j;
// echo getenv("REMOTE_ADDR");
// echo $_SERVER["REMOTE_ADDR"];
var_dump($_SERVER);
// echo $_SERVER["SERVER_ADDR"];
// die;


function ss(){
	// static $c = 0;
	// echo ++$c;
    var_dump($GLOBALS["i"]);

}
ss();
die;
ss();
ss();
static $a = 1;
echo $a;
static $a = 7;
echo $a;
static $a=8;
die;

function &test(){
    static $b=0;
    echo $b;
    $b=$b+1;
    echo $b."<br/>";
    return $b;
}
$a=&test();
$a=4;
$a=test();
die;

$str="abcdef";
$len = strlen($str);
$arr= array();
for($i=0; $i<$len; $i++){
	for ($j=1; $j <= ($len - $i); $j++) { 
		$tmp = substr($str, $i,$j);
		array_push($arr,$tmp);
	}
}
var_dump($arr);die;


$nickname = '';
if(!empty($_POST["nickname"])){
	$nickname = $_POST["nickname"];
}
echo $nickname;
die;



// echo date("Y-m-d", strtotime("-1 day"));
// die;
// $a = '[{"x":123,"y":231,"w":34,"h":422},{"x":123,"y":231,"w":34,"h":422}]';
// $b = json_decode($a);
// var_dump($b[0]->x);
// die();
// class product{
// 	protected $_type = '' ;
// 	protected $_size = '' ;
// 	protected $_color = '' ;

// 	public function setType($type)
// 	{
// 		$this->_type = $type;
// 	}

// 	public function setSize($size)
// 	{
// 		$this->_size = $size;
// 	}

// 	public function setColor($color)
// 	{
// 		$this->_color = $color;
// 	}
// }
// //为了创建完整的产品对象，需要将产品配置分别传递产品类的每个方法：

// $productConfigs = array('type'=>'shirt','size'=>'XL','color'=>'red');

// $product = new product();
// $product->setType($productConfigs['type']);
// $product->setSize($productConfigs['size']);
// $product->setColor($productConfigs['color']);

// // var_dump($product);
// //object(product)#1 (3) { ["_type":protected]=> string(5) "shirt" ["_size":protected]=> string(2) "XL" ["_color":protected]=> string(3) "red" } 

// //创建对象时分别调用每个方法并不是最佳的做法。此时，我们最好使用基于建造者设计模式的对象来创建这个产品实例。

// //producBuilder 类被设计为接受构建 product 对象所需的这些配置选项。 它不仅存储配置参数，而且存储一个实例化的新 product 实例，build() 方法负责调用product 类中的所有方法，从而构建完整的 product 对象。最后，getProduct() 方法返回完整构建的 product对象。

// class productBuilder
// {
// 	protected $_product = null;
// 	protected $_configs = array();

// 	public function __construct($configs)
// 	{
// 		$this->_configs = $configs;
// 		$this->_product = new product();
// 	}

// 	public function build()
// 	{
// 		$this->_product->setSize($this->_configs['size']);
// 		$this->_product->setType($this->_configs['type']);
// 		$this->_product->setColor($this->_configs['color']);

// 		// $this->_product->setSize($this->_xml['size']);
// 		// $this->_product->setType($this->_xml['type']);
// 		// $this->_product->setColor($this->_xml['color']);
// 	}

// 	public function getProduct()
// 	{
// 		return $this->_product;
// 	}
// }

// //需要注意的是，build() 方法隐藏了来自请求新 product 对象的代码的实际方法调用。如果 product 类以后发生改变，那么只需要修改 productBuilder 类的 build() 方法，下面的代码说明了如何使用 productBuilder 类创建 product 对象：

// $builder = new productBuilder($productConfigs);
// $builder->build();
// $product = $builder->getProduct();

// var_dump($product);
// //object(product)#3 (3) { ["_type":protected]=> string(5) "shirt" ["_size":protected]=> string(2) "XL" ["_color":protected]=> string(3) "red" } 

// //建造者设计模式的目的是消除其他对象的复杂创建的过程。使用建造者设计模式不仅是最近的做法。而且在某个对象的构造和配置方法改变时可以尽可能的减少重复更改代码。