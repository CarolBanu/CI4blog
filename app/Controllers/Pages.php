<?php namespace App\Controllers;

use App\Models\BlogModel;

class Pages extends BaseController
{
	public function index()
	{
        $model = new BlogModel();
        $data['news'] = $model->getPosts();
        
        echo view('template/header', $data);
        echo view('pages/home');
        echo view('template/footer');
		//return view('welcome_message');
	}

    function showMe($page = 'home'){
        echo view('template/header');
        echo view('pages/'.$page);
        echo view('template/footer');
    }
	//--------------------------------------------------------------------

}
