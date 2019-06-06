<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{

    /**
     * 析构流函数
    */
    public function  __construct() {
      
        parent::__construct();
       
    }

    /**
     * 首页
     */
    public function index()
    {

        return $this->fetch();
    }

}
