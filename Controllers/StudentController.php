<?php

namespace App\Controllers;

use monken\TablesIgniter;
use App\Models\StudentModel;
use App\Controllers\BaseController;

class StudentController extends BaseController
{
    public function studentTable()
    {
        $model = new StudentModel();
        $table = new TablesIgniter();
        $table->setTable($model->noticeTable())
        ->setOrder([null,null,"name"],null)
            ->setSearch(["id","student_id","name","grade"],false)
            ->setOutput(["id","student_id","name","grade",$model->button()]);
        return $table->getDatatable();
    }
    public function index()
    {
        $model = new StudentModel();
        $error = 0;
        $error_student_id = '';
        $error_name = '';
        $error_grade = '';
        $rules = $this -> validate([
            'student_id' => 'required',
            'name' => 'required|min_length[5]',
            'grade' => 'required'
        ]);
        if (!$rules) {
            $validation = \Config\Services::validation();
            if ($validation -> getError('student_id')) {
                $error_student_id = $validation -> getError('student_id');
            }
            if ($validation -> getError('name')) {
                $error_name = $validation -> getError('name');
            }
            if ($validation -> getError('grade')) {
                $error_grade = $validation -> getError('grade');
            }
        } else {
            $error = 1;
            $data = [
                'student_id' => $this -> request -> getVar('student_id'),
                'name' => $this -> request -> getVar('name'),
                'grade' => $this -> request -> getVar('grade')
            ];
            $model -> save($data);
        }
        $output = [
            'error' => $error,
            'error_student_id' => $error_student_id,
            'error_name' => $error_name,
            'error_grade' => $error_grade
        ];
        echo json_encode($output);
    }
    public function student_row(){
        $model = new StudentModel();
        $id = $this -> request -> getVar('id');
        $data = $model -> find($id);
        echo json_encode($data);
    }
    public function student_delete(){
        $model = new StudentModel();
        $id = $this -> request -> getVar('id');
        if($model -> delete($id)){
            echo json_encode(array("status"=>1));
        } else {
            echo json_encode(array("status"=>0));
        }
    }
    public function student_update(){
        $model = new StudentModel();
        $id = $this -> request -> getVar('edit_id');
        $data = [
            'student_id' => $this -> request -> getVar('student_id'),
            'name' => $this -> request -> getVar('name'),
            'grade' => $this -> request -> getVar('grade')
        ];
        if($model -> update($id, $data)){
            echo json_encode(array("status"=>1));
        } else {
            echo json_encode(array("status"=>0));
        }
    }
}
