<?php
namespace app\mobile\controller;
use think\Controller;

class Play extends Controller
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
     * index
     */
    public function index(){

        
        return $this->fetch();
    }
    
}
