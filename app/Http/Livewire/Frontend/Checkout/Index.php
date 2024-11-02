<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $carts;
    public $total_amount;

    public $username,$phone,$pin_code,$address,$email,$payment_mode = NULL,$payment_id = NULL;


    protected $listeners = [
        'validationFormAll',
        'transactionEmit'=>'onlinePayment'
    ];




    public function validationFormAll(){
        $this->validate();
    }

    public function rules(){
        return [
            'username' => 'required|string|max:121',
            'email' =>'required|email|max:121',
            'phone' =>'required|string|max:10|min:8',
            'address' =>'required|string|max:255',
            'pin_code' =>'required|string|max:6|min:5',
        ];
    }



    public function placeOrder(){
       $this->validate();
        $order = Order::create([
            'user_id'         => auth()->user()->id,
            'tracking_number' => 'ecommerce-'.Str::random(10),
            'username'        =>$this->username,
            'phone'           =>$this->phone ,
            'email'           =>$this->email,
            'address'         =>$this->address ,
            'pin_code'        =>$this->pin_code ,
            'status_message'  =>'in progress',
            'payment_mode'    =>$this->payment_mode,
            'payment_id'      =>$this->payment_id,
        ]);

         foreach($this->carts as $cart){
            $orderItems = OrderItem::create([
                'order_id' =>$order->id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity,
                'price'=>$cart->product->cost_of_good,
            ]);
            if($cart->product != NULL){
                $cart->product()->where('id',$cart->product_id)->decrement('quantity',$cart->quantity);
            }
            else{

            }
          }

          return $order;
    }


    public function onlinePayment($value){
        $this->payment_id = $value;
        $this->payment_mode = 'Paid By Paypal';
        $cast_on_delivery = $this->placeOrder();
        if($cast_on_delivery){
           // clear cart
           Cart::where('user_id',auth()->user()->id)->delete();
           try {
            $order = Order::findOrFail($cast_on_delivery->id);
            Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            return view('');
        } catch (\Exception $e) {
            //throw $th;
        }
           $this->emit('refreshPage');
           $this->dispatchBrowserEvent('meaasge',[
               'text' =>'Ordered Successfully !',
               'type' => 'success',
               'status' => 200
           ]);
           return redirect()->to('thank-you');
        }
        else{
           $this->dispatchBrowserEvent('meaasge',[
               'text' =>'Something went wrong !',
               'type' => 'error',
               'status' => 500
           ]);
        }
    }


    public function castOnDelivery(){
        // $validateData = $this->validate();
        $this->payment_mode = 'Cast on delivery';
         $cast_on_delivery = $this->placeOrder();
         if($cast_on_delivery){
            // clear cart
            Cart::where('user_id',auth()->user()->id)->delete();

            try {
                $order = Order::findOrFail($cast_on_delivery->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                return view('');
            } catch (\Exception $e) {
                //throw $th;
            }


            $this->emit('refreshPage');
            $this->dispatchBrowserEvent('meaasge',[
                'text' =>'Ordered Successfully !',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
         }
         else{
            $this->dispatchBrowserEvent('meaasge',[
                'text' =>'Something went wrong !',
                'type' => 'error',
                'status' => 500
            ]);
         }
    }


    public function totalAmount(){
        $this->total_amount = 0;
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cart){
          $this->total_amount += $cart->product->cost_of_good * $cart->quantity;
        }
        return $this->total_amount;
    }


    public function render()
    {


        $this->total_amount = $this->totalAmount();
        $this->username = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone ?? '';
        $this->pin_code = auth()->user()->userDetail->pin_code ?? '';
        $this->address = auth()->user()->userDetail->address ?? '';
        return view('livewire.frontend.checkout.index',[

            'total_amount' => $this->total_amount
        ]);
    }
}
