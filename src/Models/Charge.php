<?php


namespace Iugu\Models;


use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Iugu\Traits\IuguBaseTrait;
use Mockery\Exception;

class Charge extends Model
{
    use IuguBaseTrait;

    protected $table='charges';

    protected $fillable = [
        'token',
        'discount_cents',
        'customer_id',
        'months',
        'method',
        'email',
        'customer_payment_method_id',
        'bank_slip_extra_days',
        'order_id',
        'items',
        'message',
        'errors',
        'success',
        'url',
        'pdf',
        'identificarion',
        'invoice_id',
        'lr',
    ];

    protected $casts = [
        'errors' => 'json',
        'items' => 'array'
    ];

    public function invoice()
    {
        $relation=$this->belongsTo(Invoice::class);
        $relation->setQuery(Invoice::where('iugu_id','=',$this->invoice_id));
        return $relation;
    }

    /**
     * @throws GuzzleException
     */
    public function charge()
    {
        try{
            $this->setBasePath(config('iugu.url').'/'.config('iugu.api_version').'/charge');
            $charge=collect($this->postRequest())->toArray();
            $this->fill($charge);
            $this->save();
        } catch (ClientException | Exception $exception) {
            throw $exception;
        }
    }

}