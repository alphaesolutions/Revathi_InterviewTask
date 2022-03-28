<?php

namespace App\Console\Commands;
use App\Models\Order;
use Illuminate\Console\Command;

class OrderUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update order hourly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orders = Order::whereIn('order_status_id',array('1','2'))->get();
        foreach ($orders as $order)
        {
            $data['order_status_id']=3;
            Order::where('id','=',$order->id)->where('delivery_date','=',date('Y-m-d'))->where('delivery_time','>',date('H:i:s'))->update($data);
        }
        $this->info('Order Updated successfully');
    }
}
