<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uploads Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Upload get($primaryKey, $options = [])
 * @method \App\Model\Entity\Upload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Upload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Upload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Upload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Upload findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
   public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('uploads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [
                'fields' => [
                    'dir'  => 'file_dir',
                    'size' => 'file_size',
                    'type' => 'file_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    //return strtolower($data['name']);
                    $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
                    $filename = pathinfo($data['name'], PATHINFO_FILENAME );
                    return $filename.'-'.uniqid().'.'.$ext;
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                    
                    //Somente arquivos de imagem retornam thumbnail
                    $allowed = array("jpeg", "gif","jpg", "png");
                    
                    if(in_array($extension, $allowed)) {
                        // Store the thumbnail in a temporary file
                        $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                        // Use the Imagine library to DO THE THING
                        $size = new \Imagine\Image\Box(40, 40);
                        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                        $imagine = new \Imagine\Gd\Imagine();

                        // Save that modified file to our temp file
                        $imagine->open($data['tmp_name'])
                            ->thumbnail($size, $mode)
                            ->save($tmp);

                        //Retorna o original e a thumbnail
                        return [
                            $data['tmp_name'] => $data['name'],
                            $tmp => 'thumbnail-' . $data['name'],
                        ];
                    }else{
                        //Retorna somente o original
                        return [
                            $data['tmp_name'] => $data['name'],
                        ];
                    }
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ],
            'thumbnail' => [
                'fields' => [
                    'dir'       => 'thumbnail_dir',
                    'size'      => 'thumbnail_size',
                    'type'      => 'thumbnail_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    //return strtolower($data['name']);
                    $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
                    $filename = pathinfo($data['name'], PATHINFO_FILENAME );
                    return $filename.'-'.uniqid().'.'.$ext;
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);                
                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(40, 40);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    //Retorna o original e a thumbnail
                    return [
                        //$data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('filename')
            ->add('name', [
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'Nome deverá ter pelo menos 5 caracteres',
                ]
            ])
            ->maxLength('filename', 255)
            ->requirePresence('filename', 'create')
            ->notEmpty('filename');
        
        $validator
            ->requirePresence('file', 'create')
            ->allowEmpty('file', 'update')
            ->add('file','file', [
                'rule' => ['mimeType', [
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',//DOCX
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',//XLSX,
                        'application/vnd.ms-powerpoint',//PPT
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation', //PPTX
                        'application/msword',//WORD
                        'application/excel', //XLSX
                        'application/vnd.ms-excel', //XLS
                        'application/pdf', //PDF
                    ] 
                ],
                'message' => __('Arquivo Inválido. Somente esses Arquivos são Permitidos: PDF,DOC,XLSX e PPT')
        ]);

        $validator
            ->allowEmpty('thumbnail', 'true')
            ->add('thumbnail','thumbnail', [
                'rule' => ['mimeType', [
                        'image/png',
                        'image/jpeg',
                        'image/gif',
                        'image/bmp'
                    ] 
                ],
                'message' => __('Arquivo Inválido. Somente esses Arquivos são Permitidos: PDF,DOC,XLSX e PPT')
        ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
