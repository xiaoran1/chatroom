<?php
class SqlHelper{
	public $con;
	public $dbname="chat";
	public $host="localhost";
	public $username="root";
	public $password="xiaoran1";
	public function __construct(){
		$this->con=@mysql_connect($this->host,$this->username,$this->password);
		if(!$this->con){
			die("����ʧ��".mysql_error());
		}
		mysql_select_db($this->dbname,$this->con);
		mysql_query("set names utf8");
	}
	public function execute_dql($sql){//��ѯ��ִ��dql
		$res=mysql_query($sql,$this->con) or die(mysql_error());
		
		return $res;
	}
	public function close_connect(){//�ر�������Դ
		if(!empty($this->con)){
			mysql_close($this->con);
		}
	}
	public function execute_sql($sql){//ִ��sql
		$b=mysql_query($sql,$this->con);
			if(!$b){
				return 0;
			}else{
				if(mysql_effected_rows($this->con)>0){
			        return 1;
		        }else{
					return 2;
				}
			}
	 }
	 public function execute_dql2($sql){//�ͷ���Դ
		 $arr=array();
		 $res=mysql_query($sql,$this->con) or die(mysql_error());//�õ��Ľ����
		 $i=0;
		 while($row=mysql_fetch_assoc($res)){
			 $arr[$i++]=$row;//�ѽ��ת������ά��������
		 }
		 return $arr;	
		 mysql_free_result($res);//������ͷ�	 
	 }
	 
	 //���Ƿ�ҳ����Ĳ�ѯ
	 //$sql1="select * from where ���� limit 0,6";
	 //sql2="select count(id) from ����";
	 public function execute_dql_fenye($sql1,$sql2,$fenyePage){
		 $res=mysql_query($sql1,$this->con) or die (mysql_error());
		 $arr=array();//��$res=>array()
		 while($row=mysql_fetch_assoc($res)){
			 $arr[]=$row;
		 }
		 mysql_free_result($res);
		 
		 $res2=mysql_query($sql2,$this->con) or die(mysql_error());
		 if($row=mysql_fetch_row($res2)){
			 $fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
			 $fenyePage->rowCount=$row[0];
		 }
		 mysql_free_result($res2);
		 $fenyePage->res_array=$arr;//��$arr����$fenyePage
	
		 if($fenyePage->pageNow>1){
	          $prePage=$fenyePage->pageNow-1;
	          $navigate="<a href='peoplesListNew.php?pageNow=$prePage'>��һҳ</a>&nbsp";
         }
         if($fenyePage->pageNow<$fenyePage->pageCount){
	          $nextPage=$fenyePage->pageNow+1;
	          $navigate="<a href='peoplesListNew.php?pageNow=$nextPage'>��һҳ</a>&nbsp";
         }
		 $fenyePage->navigate=$navigate;
	 }
	 public function execute_dml($sql){
		 $b=mysql_query($sql,$this->con) or die(mysql_error);
		 if(!$b){
			 return 0;
		 }else{
			if(mysql_affected_rows($this->con)>0){
				return 1;//ok
			}else{
				return 2;
			}
		 }
	 }
}
?>