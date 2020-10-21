<?php

use App\Activity;
use Illuminate\Database\Migrations\Migration;

class UpdateArticleActivitySubjectType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Activity::query()
            ->where('subject_type', 'App\Article')
            ->update([
                'subject_type' => 'App\Domain\Blog\Models\Article'
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Activity::query()
            ->where('subject_type', 'App\Domain\Blog\Models\Article')
            ->update([
                'subject_type' => 'App\Article'
            ]);
    }
}
