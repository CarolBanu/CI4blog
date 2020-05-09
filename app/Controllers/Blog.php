<?php namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{
    function post($slug){
        echo view('template/header');
        echo view('blog/post');
        echo view('template/footer');
    }

    
    function create(){
        helper('form');
        $model = new BlogModel();
        if(! $this->validate([
            'title' => 'required | min_length[3] | max_length[255]',
            'body' => 'required'
        ])){
            // daca nu este valid inputul, afisam inca o data formularul
            echo view('template/header');
            echo view('blog/create');
            echo view('template/footer');
        } else {
            $model->save(
                [
                    'title' => $this->request->getVar('title'),
                     'body' => $this->request->getVar('body'),
                     'slug' => url_title($this->request->getVar('title'))
                ]
            );
            return redirect()->to('/ci4/public/');
        }

    }
}
