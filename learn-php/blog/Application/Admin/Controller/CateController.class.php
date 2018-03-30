<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
    public function lst(){
        $this->display(); //display（）用于加载模板
    }
	public function add(){
		$this->display();
	}
	public function edit(){
		$this->display();
	}
	public function del(){
		
	}
}