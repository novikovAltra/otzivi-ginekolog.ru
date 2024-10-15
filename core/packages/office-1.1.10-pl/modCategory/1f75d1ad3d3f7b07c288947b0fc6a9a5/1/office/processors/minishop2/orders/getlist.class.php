<?php
/**
 * Get a list of Orders
 *
 * @package minishop2
 * @subpackage processors
 */
class msOrderGetListProcessor extends modObjectGetListProcessor {
	public $classKey = 'msOrder';
	public $defaultSortField = 'id';
	public $defaultSortDirection  = 'DESC';
	public $languageTopics = array('default','minishop2:manager');
	/** @var  miniShop2 $ms2 */
	protected $ms2;


	public function initialize() {
		$this->ms2 = $this->modx->getService('miniShop2');

		return parent::initialize();
	}


	public function prepareQueryBeforeCount(xPDOQuery $c) {
		$c->where(array('user_id' => $this->modx->user->id));

		$all = array_keys($this->modx->getFieldMeta('msOrder'));;
		$enabled = array_map('trim', explode(',', $this->modx->getOption('office_ms2_order_grid_fields', null, 'id,num,status,cost,weight,delivery,payment,createdon,updatedon,type', true)));
		$tmp = array_intersect($enabled, $all);
		unset($tmp['comment']);
		if (!in_array('id', $tmp)) {$tmp[] = 'id';}
		if (!in_array('type', $tmp)) {$tmp[] = 'type';}

		$c->select($this->modx->getSelectColumns('msOrder', 'msOrder', '', $tmp));

		if (in_array('status', $enabled)) {
			$c->leftJoin('msOrderStatus','msOrderStatus', '`msOrder`.`status` = `msOrderStatus`.`id`');
			$c->select('`msOrderStatus`.`name` as `status`, `msOrderStatus`.`color`');
		}
		if (in_array('delivery', $enabled)) {
			$c->leftJoin('msDelivery','msDelivery', '`msOrder`.`delivery` = `msDelivery`.`id`');
			$c->select('`msDelivery`.`name` as `delivery`');
		}
		if (in_array('payment', $enabled)) {
			$c->leftJoin('msPayment','msPayment', '`msOrder`.`payment` = `msPayment`.`id`');
			$c->select('`msPayment`.`name` as `payment`');
		}
		if (in_array('customer', $enabled)) {
			$c->leftJoin('modUserProfile','modUserProfile', '`msOrder`.`user_id` = `modUserProfile`.`internalKey`');
			$c->select('`modUserProfile`.`fullname` as `customer`');
		}
		if (in_array('receiver', $enabled)) {
			$c->leftJoin('msOrderAddress','msOrderAddress', '`msOrder`.`address` = `msOrderAddress`.`id`');
			$c->select('`msOrderAddress`.`receiver`');
		}

		if ($query = $this->getProperty('query')) {
			$c->where(array(
				'num:LIKE' => '%'.$query.'%'
			));
		}
		if ($status = $this->getProperty('status')) {
			$c->where(array('status' => $status));
		}

		return $c;
	}

	public function getData() {
		$data = array();
		$limit = intval($this->getProperty('limit'));
		$start = intval($this->getProperty('start'));

		/* query for chunks */
		$c = $this->modx->newQuery($this->classKey);
		$c = $this->prepareQueryBeforeCount($c);
		$data['total'] = $this->modx->getCount($this->classKey,$c);
		$c = $this->prepareQueryAfterCount($c);

		$sortClassKey = $this->getSortClassKey();
		$sortKey = $this->modx->getSelectColumns($sortClassKey,$this->getProperty('sortAlias',$sortClassKey),'',array($this->getProperty('sort')));
		if (empty($sortKey)) $sortKey = $this->getProperty('sort');
		$c->sortby($sortKey,$this->getProperty('dir'));
		if ($limit > 0) {
			$c->limit($limit,$start);
		}

		if ($c->prepare() && $c->stmt->execute()) {
			$data['results'] = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $data;
	}

	public function iterate(array $data) {
		$list = array();
		$list = $this->beforeIteration($list);
		$this->currentIndex = 0;
		/** @var xPDOObject|modAccessibleObject $object */
		foreach ($data['results'] as $array) {
			$list[] = $this->prepareArray($array);
			$this->currentIndex++;
		}
		$list = $this->afterIteration($list);
		return $list;
	}

	public function prepareArray(array $data) {
		$data = array_map('strip_tags', $data);
		if (isset($data['cost'])) {$data['cost'] = $this->ms2->formatPrice($data['cost']);}
		if (isset($data['cart_cost'])) {$data['cart_cost'] = $this->ms2->formatPrice($data['cart_cost']);}
		if (isset($data['delivery_cost'])) {$data['delivery_cost'] = $this->ms2->formatPrice($data['delivery_cost']);}
		if (isset($data['weight'])) {$data['weight'] = $this->ms2->formatWeight($data['weight']);}
		if (isset($data['status'])) {
			$data['status'] = $this->modx->lexicon(str_replace(array('[[%',']]'), '', $data['status']));
			$data['status'] = '<span style="color:#'.$data['color'].';">'.$data['status'].'</span>';
		}
		if (isset($data['delivery'])) {
			$data['delivery'] = $this->modx->lexicon(str_replace(array('[[%',']]'), '', $data['delivery']));
		}
		if (isset($data['payment'])) {
			$data['payment'] = $this->modx->lexicon(str_replace(array('[[%',']]'), '', $data['payment']));
		}
		unset($data['color']);

		return $data;
	}


}

return 'msOrderGetListProcessor';