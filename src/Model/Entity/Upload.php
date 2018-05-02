<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Upload Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $file
 * @property string $filename
 * @property int $category_id
 * @property string $file_dir
 * @property int $file_size
 * @property string $file_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 */
class Upload extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'file' => true,        
        'filename' => true,
        'category_id' => true,
        'file_dir' => true,
        'file_size' => true,
        'file_type' => true,
        'thumbnail'=> true,
        'thumbnail_dir' => true,        
        'thumbnail_size' => true,
        'thumbnail_type' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true
    ];
}
