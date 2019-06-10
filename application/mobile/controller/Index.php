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
    /**
     * livelist
     */
    public function livelist(){
        return $this->fetch();
    }
    /**
     * live
     */
    public function live(){
        return $this->fetch();
    }
}
