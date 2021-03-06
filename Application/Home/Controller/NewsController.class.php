<?php
namespace Home\Controller;
use OT\DataDictionary;

/**
 * 新闻资讯控制器
 * 主要获取新闻资讯数据
 */
class NewsController extends HomeController {
	//设置页面特征：标题，控制器名称，
	public $PageFeature = array('ControllerName' =>'News/index', 'Title' =>'新闻资讯');

	 //前置操作方法
    public function _before_index(){
        //在前置方法中 操作判断用户
		$this->assign('PageFeature',$this->PageFeature);
    }
	//系统首页
    public function index(){
        
        //获得新闻列表
        $news = $this->getNews();
        $this->assign('news',$news);

       
        //获得热门资讯
        $hotTopics = $this->getHotTopics();
        $this->assign('hotTopics',$hotTopics);

        //获得学院新闻
        $CollegeNews = $this->getCollegeNews();
        $this->assign('collegeNews',$CollegeNews);

        //获得通知
        $Notice = $this->getNotice();
        $this->assign('notice',$Notice);

        //
        $this->display();
    }

    /**
     * [getNews 获得最新新闻列表]
     * @return [array] [返回查询列表]
     */
    public function getNews(){
        $MediaData = D('MediaData');

        $returnData = $MediaData->getNewsPage();
        return $returnData;
    }

    /**
     * [getHotTopics 获得热门资讯]
     * @return [type] [description]
     */
    public function getHotTopics(){
      
        $MediaData = D('MediaData');
        $hotTopics = $MediaData -> getNewsPage(1); //group 为1 时 表示 热门资讯
        return $hotTopics;
    }   

    /**
     * [getCollegeNews 获得学院新闻]
     * @return [type] [description]
     */
    public function getCollegeNews(){
        $MediaData = D('MediaData');
        $collegeNews = $MediaData -> getNewsPage(2,'1,4'); //group 为2 时 表示 学院新闻 
        return $collegeNews;
    }


    public function getNotice(){
        $MediaData = D('MediaData');
        $notice = $MediaData -> getNewsPage(3,'1,4'); //group 为2 时 表示 学院新闻 
        return $notice;
    }
}
