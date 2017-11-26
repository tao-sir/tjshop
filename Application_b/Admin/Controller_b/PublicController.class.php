<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$_SESSION)
        {
          $this->redirect("User/login");
        }
    }
}