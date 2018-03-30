<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('这是前台首页控制器里的内容，整个博客的默认首页好像就在这里','utf-8');
    }
}