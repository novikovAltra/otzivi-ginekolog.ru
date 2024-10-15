<?php

class msOrderStatusGetListProcessor extends modObjectGetListProcessor {
	public $classKey = 'msOrderStatus';
	public $defaultSortField = 'rank';
	public $defaultSortDirection  = 'asc';

	public function prepareQueryBeforeCount(xPDOQuery $c) {
		$c->select('id,name');
		$c->where(array('active' => 1));

		return $c;
	}

	public function prepareRow(xPDOObject $object) {
		$array = array(
			'id' => $object->get('id')
			,'name' => $this->modx->lexicon(str_replace(array('[[%', ']]'), '', $object->get('name')))
		);

		return $array;
	}

	public function outputArray(array $array,$count = false) {
		$array = array_merge_recursive(array(array(
			'id' => 0
			,'name' => $this->modx->lexicon('office_ms2_all')
		)), $array);

		return parent::outputArray($array, $count);
	}

}

return 'msOrderStatusGetListProcessor';