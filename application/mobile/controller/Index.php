<?php
namespace app\mobile\controller;
use think\Controller;

class Index extends Controller
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
    public function live(){
        return $this->fetch();
    }
    
}
