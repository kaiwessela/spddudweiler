<?php
namespace Blog\Frontend\Web\Controllers;
use \Blog\Frontend\Web\Controllers\Controller;
use \Blog\Backend\Models\Post;
use \Blog\Backend\Exceptions\EmptyResultException;
use \Blog\Config\Config;
use \Blog\Frontend\Web\Modules\Picture;
use Exception;

class IndexController extends Controller {
	public $show_posts;
	public $posts;

	public function load() {
		try {
			$this->posts = Post::pull_all(5);
			$this->show_posts = true;
		} catch(EmptyResultException $e){
			$this->show_posts = false;
		} catch(Exception $e){
			return false;
		}

		foreach($this->posts as &$post){
			if(!$post->image->is_empty()){
				$post->show_picture = true;
				$post->picture = new Picture($post->image);
			} else {
				$post->show_picture = false;
			}
		}

		return true;
	}

	public function display() {
		$controller = $this;
		$content = $this->content;

		include 'frontend/web/templates/' . $this->route['template'] . '.tmp.php';
	}
}
?>
