<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string|null $phone
 * @property string|null $photo_document
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email_address', 'created_at', 'updated_at', 'deleted'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['deleted'], 'integer'],
            [['first_name', 'last_name', 'email_address', 'photo_document'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['email_address'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email_address' => 'Email Address',
            'phone' => 'Phone',
            'photo_document' => 'Photo Document',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    
}
