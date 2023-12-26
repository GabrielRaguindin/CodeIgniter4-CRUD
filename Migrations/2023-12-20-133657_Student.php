<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'student_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'grade' => [
                'type' => 'INT',
                'constraint' => 11, 
            ]
            ]);

            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('student');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
