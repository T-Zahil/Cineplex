<?php

class Cache{

	public $dirname;
	public $duration; // in minutes

	public function __construct($dirname, $duration){
		$this->dirname = $dirname;
		$this->duration = $duration;
	}

	public function write($filename, $content){
		return file_put_contents($this->dirname.'/'.$filename, $content);
	}

	public function read($filename){
		$file = $this->dirname.'/'.$filename;
		if(!file_exists($file)){
			return false;
		}
		$lifetime = (time() - filemtime($file)) / 60;
		if($lifetime > $this->duration){
			$this->delete($filename);
			return false;
		}
		return file_get_contents($file);
	}

	public function delete($filename){
		$file = $this->dirname.'/'.$filename;
		if(file_exists($file)){
			unlink($file);
		}	
	}

	public function clear(){
		$files = glob($this->dirname.'/*');
		foreach ($files as $_file) {
			unlink($_file);
		}
	}

}
