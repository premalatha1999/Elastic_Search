<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class Shop extends Model
{
    protected $table='shop';
    use ElasticquentTrait;
    protected $mappingProperties = array(
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
}
