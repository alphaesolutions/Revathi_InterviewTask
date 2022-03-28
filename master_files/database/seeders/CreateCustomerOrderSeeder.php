<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Items;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\AddressType;
use App\Models\CustomerAddress;
use App\Models\OrderItem;
use App\Models\BillingAddress;

class CreateCustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users =  [
            [
                'code' => '001',
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'is_active' => 1,
            ],
        ];
        $User = User::insert($Users);

        $items =  [
            [
                'id' => 1,
                'name' => 'item1',
                'is_active' => 1,
            ],
            [
                'id' => 2,
                'name' => 'item2',
                'is_active' => 1,
            ],
            [
                'id' => 3,
                'name' => 'item3',
                'is_active' => 1,
            ],
            [
                'id' => 4,
                'name' => 'item4',
                'is_active' => 1,
            ],
        ];
        $items = Items::insert($items);

        $order_status =  [
            [
                'name' => 'New',
                'is_active' => 1,
            ],
            [
                
                'name' => 'Pending',
                'is_active' => 1,
            ],
            [
                'name' => 'Delay',
                'is_active' => 1,
            ],
            [
                'name' => 'Completed',
                'is_active' => 1,
            ],
        ];
        $order_status = OrderStatus::insert($order_status);

        $address_type =  [
            [
                'name' => 'Home',
                'is_active' => 1,
            ],
        ];
        $address_type = AddressType::insert($address_type);

        $customer_address =  [
            [
                'address_type_id' => 1,
                'customer_id' => 1,
                'complete_address' => 'testing',
                'latitude' => '20.5937° N',
                'longitude' => '78.9629° E',
                'landmark' => 'temple',
                'is_active' => 1,
            ],
        ];
        $customer_address = CustomerAddress::insert($customer_address);

        $orders =  [
            [
                'id' => 1,
                'order_code' => 'OR001',
                'order_date' => '2022-03-18',
                'order_time' => '10:00:00',
                'delivery_date' => '2022-03-19',
                'delivery_time' => '15:00:00',
                'customer_id' => 1,
                'customer_address_id' => 1,
                'billing_address_id' => 1,
                'order_status_id' => 1,
                'total_item' => 1,
                'total_amount' => 100,
                'is_active' => 1,
            ],
            [
                'id' => 2,
                'order_code' => 'OR002',
                'order_date' => '2022-03-18',
                'order_time' => '10:00:00',
                'delivery_date' => '2022-03-19',
                'delivery_time' => '15:00:00',
                'customer_id' => 1,
                'customer_address_id' => 1,
                'billing_address_id' => 1,
                'order_status_id' => 2,
                'total_item' => 1,
                'total_amount' => 100,
                'is_active' => 1,
            ],
            [
                'id' => 3,
                'order_code' => 'OR003',
                'order_date' => '2022-03-18',
                'order_time' => '10:00:00',
                'delivery_date' => '2022-03-19',
                'delivery_time' => '15:00:00',
                'customer_id' => 1,
                'customer_address_id' => 1,
                'billing_address_id' => 1,
                'order_status_id' => 3,
                'total_item' => 1,
                'total_amount' => 100,
                'is_active' => 1,
            ],
            [
                'id' => 4,
                'order_code' => 'OR004',
                'order_date' => '2022-03-18',
                'order_time' => '10:00:00',
                'delivery_date' => '2022-03-19',
                'delivery_time' => '15:00:00',
                'customer_id' => 1,
                'customer_address_id' => 1,
                'billing_address_id' => 1,
                'order_status_id' => 4,
                'total_item' => 1,
                'total_amount' => 100,
                'is_active' => 1,
            ],
        ];
        $orders = Order::insert($orders);

        $order_items =  [
            [
                'id' => 1,
                'order_id' => 1,
                'items_id' => 1,
                'quantity' => 1,
                'amount' => 100,
                'created_by' => 1,
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'items_id' => 2,
                'quantity' => 1,
                'amount' => 100,
                'created_by' => 1,
            ],
            [
                'id' => 3,
                'order_id' => 3,
                'items_id' => 3,
                'quantity' => 1,
                'amount' => 100,
                'created_by' => 1,
            ],
            [
                'id' => 4,
                'order_id' => 4,
                'items_id' => 4,
                'quantity' => 1,
                'amount' => 100,
                'created_by' => 1,
            ],
        ];
        $order_items = OrderItem::insert($order_items);


        $billing_address =  [
            [
                'id' => 1,
                'customer_id' => 1,
                'order_id' => 1,
                'phone_no' => '1234567890',
                'name' => 'developer',
                'address' => 'testing address1, india',
                'is_active' => 1,
                
            ],
            [
                'id' => 2,
                'customer_id' => 1,
                'order_id' => 2,
                'phone_no' => '1234567890',
                'name' => 'developer',
                'address' => 'testing address1, india',
                'is_active' => 1,
                
            ],
            [
                'id' => 3,
                'customer_id' => 1,
                'order_id' => 3,
                'phone_no' => '1234567890',
                'name' => 'developer',
                'address' => 'testing address1, india',
                'is_active' => 1,
                
            ],
            [
                'id' => 4,
                'customer_id' => 1,
                'order_id' => 4,
                'phone_no' => '1234567890',
                'name' => 'developer',
                'address' => 'testing address1, india',
                'is_active' => 1,
                
            ],
        ];
        $billing_address = BillingAddress::insert($billing_address);
    }
}
