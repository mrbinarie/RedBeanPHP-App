<?php if(!defined("HAS_ACCESS")) die("Not Access!");

class PagesController
{
    public $layout = 'layouts/';

    public $page    = 'products';
    public $dir     = 'pages/';

    public function __construct()
    {
        $this->page = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'products';
    }

    public function load()
    {
        require_once( $this->layout . "/header.php" );

        $page_full_link = $this->dir . $this->page . '.php';
        
        if(!file_exists($page_full_link)) $page_full_link = $this->dir . '404.php';
        
        include_once($page_full_link);
        
        require_once( $this->layout . "/footer.php" );
    }
}