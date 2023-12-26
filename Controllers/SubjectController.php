<?php

namespace App\Controllers;

use monken\TablesIgniter;
use App\Models\SubjectModel;
use App\Controllers\BaseController;

class SubjectController extends BaseController
{
    public function subjectTable()
    {
        $model = new SubjectModel();
        $table = new TablesIgniter();
        $table->setTable($model->noticeTable())
        ->setOrder([null,null,"description"],null)
            ->setSearch(["id","code","description"],false)
            ->setOutput(["id","code","description",$model->button()]);
        return $table->getDatatable();
    }
    public function index()
    {
        $model = new SubjectModel();
        $error = 0;
        $error_code = '';
        $error_description = '';
        $rules = $this -> validate([
            'code' => 'required',
            'description' => 'required|min_length[5]'
        ]);
        if (!$rules) {
            $validation = \Config\Services::validation();
            if ($validation -> getError('code')) {
                $error_code = $validation -> getError('code');
            }
            if ($validation -> getError('description')) {
                $error_description = $validation -> getError('description');
            }
        } else {
            $error = 1;
            $data = [
                'code' => $this -> request -> getVar('code'),
                'description' => $this -> request -> getVar('description')
            ];
            $model -> save($data);
        }
        $output = [
            'error' => $error,
            'error_code' => $error_code,
            'error_description' => $error_description
        ];
        echo json_encode($output);
    }
    public function subject_row(){
        $model = new SubjectModel();
        $id = $this -> request -> getVar('id');
        $data = $model -> find($id);
        echo json_encode($data);
    }
    public function subject_delete(){
        $model = new SubjectModel();
        $id = $this -> request -> getVar('id');
        if($model -> delete($id)){
            echo json_encode(array("status"=>1));
        } else {
            echo json_encode(array("status"=>0));
        }
    }
    public function subject_update(){
        $model = new SubjectModel();
        $id = $this -> request -> getVar('edit_id');
        $data = [
            'code' => $this -> request -> getVar('code'),
            'description' => $this -> request -> getVar('description')
        ];
        if($model -> update($id, $data)){
            echo json_encode(array("status"=>1));
        } else {
            echo json_encode(array("status"=>0));
        }
    }
}
