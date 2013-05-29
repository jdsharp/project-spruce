<?php

class Spruce {
	protected $config = array();
	protected $data   = array();
	
	public function __construct($config = null)
	{
		if ( $this->config !== null ) {
			$this->setConfig($config);
		}
	}

	public function setConfig($config)
	{
		$this->config = $config;
	}

	public function controlFactory($type, $args = null)
	{
		$control = $type . '_Control';
		// This instantiates a new control of type
		if ( class_exists($control) ) {
			$ctrl = new $control($args);
			return $ctrl;
		}
		return false;
	}

	public function renderHeader()
	{
		echo '<form class="form-horizontal" method="" action="">';
	}

	public function renderFooter()
	{
		echo '</form>';
	}

	public function render()
	{
		$this->renderHeader();
		
		foreach ( $this->config AS $cfg ) {
			$ctrl = $this->controlFactory($cfg['type'], $cfg);
			$ctrl->render();
		}

		$this->renderFooter();
	}

	// This is executed on form postback
	public function process() {
		
	}

	public function validate()
	{
	}
}


class Spruce_Control {
	protected $id   = '';
	protected $type = '';
	protected $args = null;
	
	public function __construct($args = null) 
	{
		if ( $args !== null ) {
			$this->args = $args;
		}
		if ( isset($args['id']) ) {
			$this->id = $args['id'];
		}
		if ( isset($args['type']) ) {
			$this->type = $args['type'];
		}
	}

	/*
	private function attributes($suffix = '')
	{
		$attrs = array(
			'name' => $this->id . ( empty($suffix) ? '' : '[' . $suffix . ']'),
			'id' => $this->id . ( empty($suffix) ? '' : '_' . $suffix)
		);
		return join(' ', $attrs);
	}
	*/

	public function validate()
	{
		
	}

	public function data()
	{
		
	}

	public function save()
	{
		
	}

	public function delete()
	{
	}

	public function label()
	{
		if ( isset($this->args['label']) ) {
			echo '<label class="control-label" for="' . $this->id . '">' . $this->args['label'] . '</label>';
		}
	}

	public function input()
	{
		echo '<input type="text" name="' . $this->id . '" id="' . $this->id . '">';
	}

	public function renderHeader()
	{

	}
	public function renderFooter()
	{
		
	}

	public function render()
	{
		?>
		<div class="control-group">
			<?php echo $this->label() ?>
			<div class="controls">
			  <?php echo $this->input(); ?>
			</div>
		</div>
		<?php
	}
}

class Text_Control extends Spruce_Control {
}

class Checkbox_Control extends Spruce_Control {
	public function input()
	{
		echo '<input type="checkbox" name="' . $this->id . '" id="' . $this->id . '">';
	}
}

class Submit_Control extends Spruce_Control {
	public function label()
	{
	}
	public function input()
	{
		echo '<input type="submit" name="' . $this->id . '" value="' . $this->args['label'] . '">';
	}
}
