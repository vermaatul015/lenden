<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ClientItem extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client_items';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'rate','nos','size','user_id'];
    protected $sortable  = ['client_id', 'rate','nos','size'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function clientSortable($query, $direction)
    {
        return $query->join('clients', 'client_items.client_id', '=', 'clients.id')
                    ->orderBy('clients.name', $direction)
                    ->select('client_items.*');
    }
}
