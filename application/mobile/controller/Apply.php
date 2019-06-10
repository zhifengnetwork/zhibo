<?php
namespace app\mobile\controller;
use think\Controller;

class Apply extends Controller
{

    /**
     * 播放的
     */

    /**
     * 析构流函数
    */
    public function  __construct() {
      
        parent::__construct();
       
    }

    /**
     * apply
     */
    public function apply(){
        return $this->fetch();
    }
    
}
