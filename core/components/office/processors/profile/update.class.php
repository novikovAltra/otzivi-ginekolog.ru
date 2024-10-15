<?php
require MODX_CORE_PATH.'model/modx/processors/security/user/update.class.php';

class officeProfileUserUpdateProcessor extends modUserUpdateProcessor {
	public $classKey = 'modUser';
	public $languageTopics = array('core:default','core:user');
	public $permission = '';
	public $beforeSaveEvent = 'OnBeforeUserFormSave';
	public $afterSaveEvent = 'OnUserFormSave';
	protected $_new_email;
	protected $_current_email;
	protected $_current_photo;


	/**
	 * {@inheritDoc}
	 * @return boolean|string
	 */
	public function initialize() {
		$this->setProperty('id', $this->modx->user->id);
		return parent::initialize();
	}


	/**
	 * {@inheritDoc}
	 * @return boolean
	 */
	public function beforeSet() {
		$this->_current_email = $this->object->Profile->get('email');
		$this->_current_photo = $this->object->Profile->get('photo');

		$fields = $this->getProperty('requiredFields', '');
		if (!empty($fields) && is_array($fields)) {
			foreach ($fields as $field) {
				// Extended fields
				if (preg_match('/(.*?)\[(.*?)\]/', $field, $matches)) {
					$tmp = $this->getProperty($matches[1],null);
					$tmp = is_array($tmp) && isset($tmp[$matches[2]])
						? $tmp[$matches[2]]
						: null;
				}
				else {
					$tmp = $this->getProperty($field,null);
				}

				if ($field == 'email' && !preg_match('/^[^@а-яА-Я]+@[^@а-яА-Я]+(?<!\.)\.[^\.а-яА-Я]{2,}$/m', $tmp)) {
					$this->addFieldError('email', $this->modx->lexicon('user_err_not_specified_email'));
				}
				/*
				elseif ($field == 'email' && $this->modx->getCount('modUser', array('username' => $tmp, 'id:!=' => $this->object->id))) {
					$this->addFieldError('email', $this->modx->lexicon('user_err_already_exists_email'));
				}
				*/
				elseif ($field == 'email' && $this->modx->getCount('modUserProfile', array('email' => $tmp, 'internalKey:!=' => $this->object->id))) {
					$this->addFieldError('email', $this->modx->lexicon('user_err_already_exists_email'));
				}
				elseif (empty($tmp)) {
					$this->addFieldError($field, $this->modx->lexicon('field_required'));
				}
			}
		}
		// Fields required by parent processor
		if (!$this->getProperty('username')) {
			$this->setProperty('username', $this->object->get('username'));
		}
		if (!$this->_new_email = $this->getProperty('email')) {
			$this->setProperty('email', $this->_current_email);
		}
		// Add existing extended fields
		if ($extended = $this->getProperty('extended')) {
			if ($existing = $this->object->Profile->get('extended')) {
				$extended = array_merge($existing, $extended);
			}
			$this->setProperty('extended', $extended);
		}
		// Handle new password
		if ($this->getProperty('specifiedpassword') || $this->getProperty('confirmpassword')) {
			$this->setProperty('passwordnotifymethod', 's');
			$this->setProperty('passwordgenmethod', 'spec');
			$this->setProperty('newpassword', '');
		}
		// Allow only uploaded images
		if ($photo = $this->getProperty('photo')) {
			if (strpos($photo, '://') !== false) {
				$this->unsetProperty('photo');
			}
		}

		return parent::beforeSet();
	}


	/** {@InheritDoc} */
	public function beforeSave() {
		$before = parent::beforeSave();

		if ($before) {
			$this->handlePhoto();
		}

		return $before;
	}


	/**
	 * Upload user photo
	 *
	 * @return bool
	 */
	public function handlePhoto() {
		$default_params = array('w' => 200, 'h' => 200, 'bg' => 'ffffff', 'q' => 95, 'zc' => 0, 'f' => 'jpg');
		$params = $this->modx->fromJSON($this->getProperty('avatarParams'));
		if (!is_array($params)) {
			$params = array();
		}
		$params = array_merge($default_params, $params);

		$path = trim($this->getProperty('avatarPath', 'images/users/'), '/') . '/';
		$file = strtolower(md5($this->object->id . time()) . '.' . $params['f']);

		$url = MODX_ASSETS_URL . $path . $file;
		$dst = MODX_ASSETS_PATH . $path . $file;

		// Check image dir
		$tmp = explode('/', str_replace(MODX_BASE_PATH, '', MODX_ASSETS_PATH . $path));
		$dir = rtrim(MODX_BASE_PATH, '/');
		foreach ($tmp as $v) {
			if (empty($v)) {continue;}
			$dir .= '/' . $v;
			if (!file_exists($dir) || !is_dir($dir)) {
				@mkdir($dir);
			}
		}
		if (!file_exists(MODX_ASSETS_PATH . $path) || !is_dir(MODX_ASSETS_PATH . $path)) {
			$this->modx->log(modX::LOG_LEVEL_ERROR, '[Office] Could not create images dir "'.MODX_ASSETS_PATH . $path.'"');
			return false;
		}

		// Remove image
		if (!empty($this->_current_photo) && isset($_POST['photo']) && empty($_POST['photo'])) {
			$tmp = explode('/', $this->_current_photo);
			if (!empty($tmp[1])) {
				$cur = MODX_ASSETS_PATH . $path . end($tmp);
				if (!empty($cur) && file_exists($cur)) {
					@unlink($cur);
				}
			}
			$this->object->Profile->set('photo', '');
		}
		// Upload a new one
		elseif (!empty($_FILES['newphoto']) && preg_match('/image/', $_FILES['newphoto']['type']) && $_FILES['newphoto']['error'] == 0) {
			move_uploaded_file($_FILES['newphoto']['tmp_name'], $dst);

			$phpThumb = $this->modx->getService('modphpthumb','modPhpThumb', MODX_CORE_PATH . 'model/phpthumb/', array());
			$phpThumb->setSourceFilename($dst);
			foreach ($params as $k => $v) {
				$phpThumb->setParameter($k, $v);
			}
			if ($phpThumb->GenerateThumbnail()) {
				if ($phpThumb->renderToFile($dst)) {
					if (!empty($cur) && file_exists($cur)) {@unlink($cur);}
					$this->object->Profile->set('photo', $url);
				}
				else {
					$this->modx->log(modX::LOG_LEVEL_ERROR, '[Office] Could not save rendered image to "'.$dst.'"');
				}
			}
			else {
				$this->modx->log(modX::LOG_LEVEL_ERROR, '[Office] ' . print_r($phpThumb->debugmessages, true));
			}
		}
		return true;
	}


	/** {@InheritDoc} */
	public function afterSave() {
		if ($this->_new_email != $this->_current_email) {
			$this->object->Profile->set('email', $this->_current_email);
			$this->object->Profile->save();
		}

		return parent::afterSave();
	}

}

return 'officeProfileUserUpdateProcessor';