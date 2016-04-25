<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ListContacts]].
 *
 * @see ListContacts
 */
class ListContactsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ListContacts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ListContacts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}