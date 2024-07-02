<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_ORDER = [
        'pending'=> 'Chờ xác nhận',
        'confirmed'=> 'Đã xác nhận',
        'preparing_goods'=> 'Đang chuẩn bị hàng',
        'shipping' => 'Đang vận chuyển',
        'delivered'=> 'Đã giao hàng',
        'canceled'=> 'Đã bị hủy',
    ];

    const STATUS_PAYMENT = [
        'unpaid'    => 'Chưa thanh toán',
        'paid'      => 'Đã thanh toán',

    ];

    const STATUS_ORDER_PENDING              = 'Chờ xác nhận';
    const STATUS_ORDER_CONFIRMED            = 'Đã xác nhận';
    const STATUS_ORDER_PREPARING_GOODS      = 'Đang chuẩn bị hàng';
    const STATUS_ORDER_SHIPPING             = 'Đang vận chuyển';
    const STATUS_ORDER_DELIVERED            = 'Đã giao hàng';
    const STATUS_ORDER_CANCELED             = 'Đã bị hủy';

    const STATUS_PAYMENT_UNPAID             ='unpaid';
    const STATUS_PAYMENT_PAID               ='paid';


}
