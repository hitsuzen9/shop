<?php
class SortPager{
    private $_totalItem;   //50
	private $_nItemOnPage;  //9
	private $_nPageShow ; //5
	private $_totalPage; //6
    private $_currentPage; // trang hien tai
    private $_pricesend;
    private $_alias;
    private $_id;
    private $_page;


    public function __construct($totalItem,$currentPage = 1,$nItemOnPage = 5,$nPageShow = 5,$pricesend='',$alias='',$id='',$page=0){
        $this->_totalItem 	= $totalItem;
        $this->_nItemOnPage	= $nItemOnPage;
        $this->_pricesend = $pricesend;
        $this->_alias = $alias;
        $this->_id =$id;
        $this->_page = $page;
        
		if ($nPageShow%2==0) {
			$nPageShow 		= $nPageShow + 1;
		}
		$this->_nPageShow 	= $nPageShow;
		$this->_currentPage = abs($currentPage);
        $this->_totalPage  	= ceil($totalItem/$nItemOnPage);  
        //print_r($this->_totalPage);
        //print_r('totalpage');
    }

    //href="http://localhost/shop1701/

    public function showPagination(){
        $paginationHTML 	= '';
        
        // print_r($this->_currentPage);
        // print_r('---');
        if($this->_totalPage>1){
            $start 	= '';
            $prev 	= '';
        if($this->_currentPage > 1){
                //$start = "<li><a href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/1'".'>Start</a></li>';
                
                
                //$prev = "<li><a href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/".($this->_currentPage-1)."'".'>prev</a></li>';
                $start = "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".'Start'."</a></li>";
                $prev = "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".'prev'."</a></li>";
        }

        $next 	= '';
        $end 	= '';
        if($this->_currentPage < $this->_totalPage){
				//$next = "<li><a href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/".($this->_currentPage+1)."'".'>»</a></li>';
                //$end = "<li><a href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/".($this->_totalPage)."'".'>end</a></li>';
                $next = "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".'»'."</a></li>";
                $end = "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".'end'."</a></li>";
		}

        if($this->_nPageShow < $this->_totalPage){
            if($this->_currentPage == 1 ){
                $startPage 	= 1;
                $endPage 	= $this->_nPageShow;
            }
            else if($this->_currentPage == $this->_totalPage){
                $startPage 	= $this->_totalPage - $this->_nPageShow + 1;
                $endPage 	= $this->_currentPage;
            }
            else{
                // p=4 => s = 4-(11-1)/2 = -1
                $startPage		= $this->_currentPage - ($this->_nPageShow-1)/2;
                //4 + (11-1)/2 = 9
                $endPage		= $this->_currentPage + ($this->_nPageShow-1)/2;
                if($startPage < 1){
                    $endPage	= $endPage + 1; 
                    $startPage 	= 1; 
                }
                if($endPage > $this->_totalPage){
                    $endPage	= $this->_totalPage;

                    $startPage 	= $endPage - $this->_nPageShow + 1;
                }
            }


        }

        //$this->_nPageShow >= $this->_totalPage
			else{
				$startPage		= 1;
				$endPage		= $this->_totalPage;
			}
			/**************/
            $listPages = '';
            // print_r($startPage);
            // echo 'starpage';
            // print_r($endPage);
            // echo 'endPage';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->_currentPage) {
                    //$listPages .= "<li><a class='active' href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/".$i."'".'>'.$i.'</a></li>';
                    $listPages .= "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".$i."</a></li>";
				}
				else{
                    //$listPages .= "<li><a href='http://localhost/shop1701/".($this->_pricesend)."/".($this->_alias)."/".($this->_id)."/".$i."'".'>'.$i.'</a></li>';
                    $listPages .= "<li><a class='active' href='http://localhost/shop1701/".($this->_alias)."#'>".$i."</a></li>";
                }
                // print_r($i);
                // echo 'i';
			}
			$paginationHTML = '<ul>'.$start.$prev.$listPages.$next.$end.'</ul>';
            // print_r($listPages);
            // echo 'endPage';

        }
        return $paginationHTML;
    }
}


?>