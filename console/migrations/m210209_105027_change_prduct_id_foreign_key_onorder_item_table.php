<?php

use yii\db\Migration;

/**
 * Class m210209_105027_change_prduct_id_foreign_key_onorder_item_table
 */
class m210209_105027_change_prduct_id_foreign_key_onorder_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210209_105027_change_prduct_id_foreign_key_onorder_item_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210209_105027_change_prduct_id_foreign_key_onorder_item_table cannot be reverted.\n";

        return false;
    }
    */
}
