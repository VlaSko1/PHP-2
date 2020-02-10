<?php
namespace app\models\repositories;

use app\models\entities\Feedback;
use app\models\Repository;

class FeedbackRepository extends Repository
{
    public function getEntityClass() {
        return Feedback::class;
    }

    public function getTableName()
    {
        return "feedback";
    }

}