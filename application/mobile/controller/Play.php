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

    // 观众-直播间
    public function viewer_room(){
        return $this->fetch();
    }

    // 结束直播
    public function end_life(){
        return $this->fetch();
    }

  
    
}
