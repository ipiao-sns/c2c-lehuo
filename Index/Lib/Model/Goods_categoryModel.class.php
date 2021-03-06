<?php
// 节点模型
class Goods_categoryModel extends CommonModel {

	function getChild($where){
		$prefix = C('DB_PREFIX');
		if(!empty($where)){
			if(!is_array($where)){
				$map[$this->getPk()] = array('eq',$where);
			}else{
				$map = $where;
			}
			$map = addPre($map,'GC1');
		}
    	$data = $this->Table("{$prefix}goods_category as GC1")->
					  join("{$prefix}goods_category as GC2 ON LOCATE(CONCAT(',',GC1.id,','),GC2.path) > 0")->
					  field('GC1.id,group_concat(CAST(GC2.id as char)) as child')->
					  where($map)->
					  group('GC1.id')->
					  findAll();
		return $data;
	}
	
	function getNumCount($map,$effective = 0,$where = array()){
		$join = ($effective == 0)?'INNER':'LEFT';
		$where = addPre($where,'C');
		$and = $map?' AND '.$this->db->_parseWhere($map):'';
		$prefix = C('DB_PREFIX');
    	$data = $this->Table("{$prefix}goods_category as C")->
					  join("{$join} JOIN {$prefix}goods as G on G.cid = C.id {$and}")->
					  field('C.*,count( G.id ) AS count')->
					  where($where)->
					  group('C.id')->
					  order('C.path,C.sort desc')->
					  findAll();
		return $data;
	}
	
	function getDefaultCount($map=array()){
		$map['C.isdefault'] = array('eq',1);
		return $this->getNumCount($map);
	}
	
	function getDefault($map=array()){
		$map['isdefault'] = array('eq',1);
		return $this->getData($map);
	}
	
}
?>