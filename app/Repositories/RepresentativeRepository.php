<?php

namespace App\Repositories;

use App\Models\Representative;
use App\Repositories\BaseRepository;

class RepresentativeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'telephone',
        'route'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Representative::class;
    }
}
