<?php

namespace app\models;

use app\helpers\HelperFunctions;
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

    public $photo_document_file;


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


    public static function create($firstName, $lastName, $email, $phone, $photoDocumentFile){
        
        $user = new Users();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email_address = $email;
        $user->phone = $phone;

        if ($photoDocumentFile) {
            $uploadsDir = Yii::getAlias('@app/web/uploads');

            $filePath = $uploadsDir . '/' . uniqid() . '.' . $photoDocumentFile->extension;
            if ($photoDocumentFile->saveAs($filePath)) {
                $user->photo_document = 'uploads/' . basename($filePath);
            } else {
                return 'Failed to save uploaded file.';
            }
        }
        $user->created_at = HelperFunctions::getDate();
        $user->updated_at = HelperFunctions::getDate();
        $user->deleted = 0;
        if ($user->save()){
            return 'User created!';
        }else {
            Yii::error('User not saved. Errors: ' . json_encode($user->getErrors()));
            return 'Validation failed: ' . implode(', ', array_column($user->getErrors(), 0));
        }
    }

}
