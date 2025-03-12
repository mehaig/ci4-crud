<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CrudModel;

class CrudApp extends BaseController
{
    public function index()
    {
        $model = new CrudModel();
        $data['projects'] = $model->findAll();

        return view('dashboard', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $model = new CrudModel();
        $data = [
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description')
        ];
        $model->insert($data);
        return redirect()->to('/dashboard')->with('message', 'Project created');
    }

    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->to('/dashboard')->with('error', 'No ID provided');
        }

        $model = new CrudModel();
        $data['project'] = $model->find($id);

        if (empty($data['project'])) {
            return redirect()->to('/dashboard')->with('error', 'Project not found');
        }

        return view('edit', $data);
    }

    public function update($id = null)
    {
        if (!$id) {
            return redirect()->to('/dashboard')->with('error', 'No ID provided');
        }

        $model = new CrudModel();
        $data = [
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description')
        ];
        $model->update($id, $data);
        return redirect()->to('/dashboard')->with('message', 'Project Updated.');
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->to('/dashboard')->with('error', 'No ID provided');
        }
        $model = new CrudModel();
        $model->delete($id);
        return redirect()->to('/dashboard')->with('message', 'Project Deleted.');
    }
}
