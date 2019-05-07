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
     * flv格式
     */
    public function flv(){
        $app = 'dc';
        $user_id = '56895';
        $data = $this->sign($app,$user_id);
        echo $data['flv'];
    }
    /**
     * m3u8格式
     */
    public function m3u8(){
        $app = 'dc';
        $user_id = '56895';
        $data = $this->sign($app,$user_id);
        echo $data['m3u8'];
    }
    /**
     * 推流
     */
    public function tui(){
        $app = 'dc';
        $user_id = '56895';
        $data = $this->sign($app,$user_id);
        echo $data['tui'];
    }

    /**
     * 首页
     */
    public function index()
    {

        if($this->request->method() == 'POST'){

            $app = 'dc';
            $user_id = I('user_id');

            $data = M('tp_zhibo_user')->where(['user_id'=>$user_id])->find();
            if(!$data){

                $data = $this->sign($app,$user_id);
                $data['user_id'] = $user_id;
                $id = M('tp_zhibo_user')->add($data);
                $data['id'] = $id;
            }
            
            $this->redirect('play?id='.$data['id']);
            
            exit;
        }

        return $this->fetch();
    }

    public function play(){
        $id = I('id');

        $data = M('tp_zhibo_user')->where(['id'=>$id])->find();

        $this->assign('data',$data);

        $this->assign('rtmp',urlencode($data['rtmp']));
        $this->assign('flv',urlencode($data['flv']));
        $this->assign('m3u8',urlencode($data['m3u8']));

        return $this->fetch();
    }

    /**
     * 生成签名
     */
    private function sign($app,$user_id)
    {
        $sercet = '0cN03mTxm3';
        $time = time() + 300 * 60 * 60;

        //gWsPYhPRVT

        $tui_key = $this->get_auth_key($app,$user_id,'',$time,'gWsPYhPRVT');
        $data['tui'] = 'rtmp://push.zhifengwangluo.com/'.$app.'/user'.$user_id.'?auth_key='.$tui_key;

        $rtmp_key = $this->get_auth_key($app,$user_id,'',$time,$sercet);     
        $data['rtmp'] = 'rtmp://play.zhifengwangluo.com/'.$app.'/user'.$user_id.'?auth_key='.$rtmp_key;

        $flv_key = $this->get_auth_key($app,$user_id,'.flv',$time,$sercet);
        $data['flv'] = 'http://play.zhifengwangluo.com/'.$app.'/user'.$user_id.'.flv?auth_key='.$flv_key;

        $m3u8_key = $this->get_auth_key($app,$user_id,'.m3u8',$time,$sercet);
        $data['m3u8'] = 'http://play.zhifengwangluo.com/'.$app.'/user'.$user_id.'.m3u8?auth_key='.$m3u8_key;

        $data['time'] = $time;
       return $data;        
    }

    private function get_auth_key($app,$user_id,$ext,$time,$sercet){

        $md5 = "/".$app."/user".$user_id.$ext."-".$time."-0-0-".$sercet;
        $md5 = md5($md5);
        $key = $time.'-0-0-'.$md5;

        return $key;
    }

}
