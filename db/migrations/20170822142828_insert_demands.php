<?php

use Phinx\Migration\AbstractMigration;

class InsertDemands extends AbstractMigration
{
    public function up()
    {
        foreach (range(1, 100) as $demandNumber) {
            $this->insert('demands', [
                'created_at' => (new \DateTime())->setTimestamp(rand(1, time()))->format('Y-m-d H:i:s'),
                'title' => sprintf('Заявка номер %d', $demandNumber),
                'text' => sprintf('Текст заявки номер %d', $demandNumber),
                'status' => sprintf('Статус заявки номер %d', $demandNumber),
            ]);
        }
    }

    public function down()
    {
        $this->execute('TRUNCATE TABLE demands');
    }
}
