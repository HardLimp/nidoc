<?php

namespace Tiny;

class BaseController{


	protected $smarty;
	protected $config;


	public function __construct($config)
	{
		$this->config = $config;
		$this->smarty = new \Smarty();

		$this->configureSmarty();

	}

	public function configureSmarty()
	{
		$templateDir = $this->config["root"] . "/template";
		$smartyDir = $this->config["root"] . "/smarty";
		$compileDir = $smartyDir . "/compile";
		$cacheDir = $smartyDir . "/cache";
		$configDir = $smartyDir . "/config";

		if (!is_dir($templateDir)) {
			mkdir($templateDir, 0755);
		}
		if (!is_dir($smartyDir)) {
			mkdir($smartyDir, 0755);
		}
		if (!is_dir($compileDir)) {
			mkdir($compileDir, 0755);
		}
		if (!is_dir($cacheDir)) {
			mkdir($cacheDir, 0755);
		}
		if (!is_dir($configDir)) {
			mkdir($configDir, 0755);
		}

		$this->smarty->setTemplateDir($templateDir);
		$this->smarty->setCompileDir($compileDir);
		$this->smarty->setCacheDir($cacheDir);
		$this->smarty->setConfigDir($configDir);
	}
} 