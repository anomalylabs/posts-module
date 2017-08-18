<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModulePostsRemoveMetaKeywordsField extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!$field = $this->fields()->findBySlugAndNamespace('meta_keywords', 'posts')) {
            return;
        }

        $this->fields()->delete($field);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
