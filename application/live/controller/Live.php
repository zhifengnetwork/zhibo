<?php
namespace app\live\controller;
use app\live\logic\AccessToken;
use think\Controller;
use app\live\logic\RtmTokenBuilder;

class Live extends Controller
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

    /**
     * 生成token
     */
    public function getToken(){
        $appID = $_POST['appId'] ?? "4c2954a8e1524f5ea15dc5ae14232042";
//$appID = "4c2954a8e1524f5ea15dc5ae14232042";
        $appCertificate = "1580a6da5ed94447840d870a07e1c6e2";
        $account = $_POST['channel'] ?? "1024";

        $builder = new RtmTokenBuilder($appID, $appCertificate, $account);
        $AccessToken=new AccessToken();
        $builder->setPrivilege($AccessToken::Privileges["kRtmLogin"], 0);
        echo $builder->buildToken();

    }

}
