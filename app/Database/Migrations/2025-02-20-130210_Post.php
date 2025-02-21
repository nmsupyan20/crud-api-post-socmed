<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 40,
                'null'           => false
            ],
            'author' => [
                'type'           => 'VARCHAR',
                'constraint'     => 40,
                'null'           => false
            ],
            'caption' => [
                'type'       => 'TEXT',
                'null'       => false
            ],
            'platform' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false
            ],
            'likes' => [
                'type'       => 'INT',
                'constraint' => 255,
                'unsigned'   => true,
                'null'       => false
            ],
            'dislikes' => [
                'type'       => 'INT',
                'constraint' => 255,
                'unsigned'   => true,
                'null'       => false
            ],
            'comments' => [
                'type'       => 'INT',
                'constraint' => 255,
                'unsigned'   => true,
                'null'       => false
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => false
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('post');
    }

    public function down()
    {
        $this->forge->dropTable('post');
    }
}
