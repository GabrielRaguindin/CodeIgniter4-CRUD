<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subject extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);

        $this -> forge -> addPrimaryKey('id');
        $this -> forge -> createTable('subject');
    }

    public function down()
    {
        $this -> forge -> dropTable('users');
    }
}
