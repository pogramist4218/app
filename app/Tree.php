<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    protected $table = 'tree';
    public $tree = [];
    public $views = [];

    public function getTree() {
        $categories = $this->orderBy('id')->get();
        foreach($categories as $category) {
        	$this->tree[$category->parent_id][] = $category;
        }
        $this->getChildBranchOfTree(0, 0);
        return $this->views;
    }

    public function getChildBranchOfTree($parent_id, $level) {
    	if(isset($this->tree[$parent_id])) {
    		foreach($this->tree[$parent_id] as $value) {
    				$this->views[] = view('category', ['level' => ($level * 2), 'name' => $value->name]);
	            	$level = $level + 1;
	            	$this->getChildBranchOfTree($value->id, $level);
	            	$level = $level - 1;
    		}
    	}
    }
}
