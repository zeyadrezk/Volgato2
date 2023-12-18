<?php

    namespace App\Http\Controllers\v1\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\service\bookServiceRequest;
    use App\Http\Traits\ApiTrait;
    use App\Models\Address;
    use App\Models\cart\Cart;
    use App\Models\cart\CartItem;
    use App\Models\cart\discountCode;
    use App\Models\order\order;
    use App\Models\order\OrderItems;
    use App\Models\product\Category;
    use App\Models\product\FavouriteProduct;
    use App\Models\product\Product;
    use App\Models\product\ProductFeature;
    use App\Models\product\ProductRate;
    use App\Models\services\bookService;
    use App\Models\services\Service;
    use App\Models\services\ServiceRate;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    use Session;
    use function PHPUnit\Framework\isEmpty;

    class ApiController extends Controller
    {
        use ApiTrait;

        public function bookService(bookServiceRequest $request)
        {

            $bookService = BookService::create([
                'user_id' => Auth::id(),
                'service_id' => $request->service_id,
                'orderDate' => now(),
                'OrderNum' => Str::random(5),
                'value' => $request->serviceValue,
                'serviceDate' => $request->service_date,
            ]);
            return $this->ApiResponse(200, 'success', null, array('bookedService'=>$bookService));

        }

        public function AddOrder(Request $request)
        {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (empty($cart)) {
                return $this->ApiResponse(200, 'success', null, 'buy Products');

            }
            $cartItem = CartItem::with('product')->where('cart_id', $cart->id)->get();
            foreach ($cartItem as $item) {
                if ($item->product->quantity < $item->quantity) {
                    if ($item->product->quantity == 0) {
                        return $this->ApiResponse(401, 'out of stock', array(['product_id' => $item->product->id]));
                    } else {
                        return $this->ApiResponse(401, 'the available quantity', array(['product_id' => $item->product->id, 'quantity' => $item->product->quantity]));

                    }
                }
            }
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->name ?? Auth::user()->name;
            $order->address = $request->address;
            $order->total = $cart->total;
            $order->discountValue = $request->discountValue;
            $order->totalAfterDisc = ($cart->total - $request->discountValue);
            $order->PaymentReference = $request->paymentReference;
            $order->PaymentStatus = 'cash';
            $order->DateOfOrder = now(); // You can also use Carbon::now()
            $order->status = 'waiting';
            $order->OrderNumber = 200;
            $order->save();

            $cartItems = CartItem::where('cart_id', $cart->id)->get();

            foreach ($cartItems as $cartItem) {
                $orderItem = OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                ]);
                $orderItem->save();
                $product = Product::where('id', $orderItem->product_id)->first();
                if ($product->quantity > $cartItem->quantity) {
                    $product->quantity -= $cartItem->quantity;
                    $product->save();
                    $cartItem->delete();
                    $cart->delete();
                }
            }
            return $this->ApiResponse(200, 'success', null, 'sucesss');


        }

        public function paymentMethod()
        {
            return $this->ApiResponse(200, 'success', null, array('cash' => 0, 'visa' => 1));

        }

        public function showAddress()
        {
            $address = Address::where('user_id', Auth::user()->id)->get();
            return $this->ApiResponse(200, 'success', null, array('address' => $address));


        }


        public function AddAddress(Request $request)
        {
            $address = Address::where('user_id', Auth::user()->id)->where('address', $request->address)->first();
            if (empty($address)) {
                $address = Address::create([
                    'user_id' => Auth::user()->id,
                    'address' => $request->address
                ])->save();
                return $this->ApiResponse(200, 'success', null, array('address' => $address->address));
            } else {
                return $this->ApiResponse(200, 'success', null, array('address' => $address->address));
            }
        }


        public function DiscountCode(Request $request)
        {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $code = discountCode::where('discount_code', $request->code)->first();
            if (empty($code)) {

                return $this->ApiResponse(400, 'The code is wrong', array('totalCart' => $cart->total, 'discountValue' => 0, 'total' => $cart->total));
            }
            $today = date('Y-m-d');
            if ($code->UseNumber > 0 && $code->start_date <= $today && $code->end_date >= $today) {
                $discountValue = ($cart->total * $code->percentage / 100 )->round();
                if ($code->maxValue < $discountValue) {
                    $discountValue = $cart->maxValue;
                }
                $code->UseNumber--;
                $code->save();
                return $this->ApiResponse(200, 'available Code', null, array('totalCart' => $cart->total, 'discountValue' => $discountValue, 'total' => $cart->total - $discountValue));

            } else {
                return $this->ApiResponse(200, 'unavailable Code', null, array('totalCart' => $cart->total, 'discountValue' => 0, 'total' => $cart->total));

            }


        }

        public function addCart(Request $request)
        {
            $cart = Cart::where('user_id', Auth::user()->id)
                ->first();

            if (empty($cart)) {
                $cart = Cart::create([
                    'user_id' => Auth::user()->id,
                    'total' => 0,
                ]);
            }
            $product = Product::find($request->product_id);
            $cart_item = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            if (empty($cart_item)) {
                if ($request->quantity < $product->quantity) {
                    $cart_item = CartItem::create([
                        'cart_id' => $cart->id,
                        'product_id' => $request->product_id,
                        'quantity' => $request->quantity
                    ]);

                    $cart->total += ($product->price * $request->quantity);
                    $cart->save();

                    return $this->ApiResponse(200, 'success', null, $cart_item);
                } else {
                    return $this->ApiResponse(400, 'fail', 'bad request',);
                }
            } else {
                return $this->ApiResponse(200, 'success', null, 'already added');
            }


        }

        public function GetCategory($lang)
        {
            $categories = Category::get();
            $categories = json_decode($categories, true);
            $categories = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'image' => $item['image'],
                ];
            }, $categories);
            return $this->ApiResponse(200, 'success', null, array('listcategories' => $categories));

        }

        public function details_products($lang, $product_id)
        {


            $numbRate = ProductRate::where('product_id', $product_id)->count();
            $totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
            if ($numbRate == 0) {
                $avergeRate = 0;
            } else {
                $avergeRate = $totalRate / $numbRate;
            }
            $rateStars = ['key1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(),
                'key2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(),
                'key3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(),
                'key4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(),
                'key5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];


            $products = product::where('id', $product_id)->get();
            $products = json_decode($products, true);
            $products = array_map(function ($item) use ($lang) {
                $favouriteStatus = false;
                $cartStatus = false;
                $user = Auth::guard('sanctum')->user();
                $favourite = FavouriteProduct::where('product_id', $item['id'])->where('user_id', $user->id ?? "")->first();
                $cart = Cart::where('user_id', $user->id ?? "")->first();
                $cart_items = CartItem::where('product_id', $item['id'])->where('cart_id', $cart->id ?? "")->first();
                if (isset($favourite)) {
                    $cartStatus = true;
                }
                if (isset($favourite)) {
                    $favouriteStatus = true;
                }

                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'price' => $item['price'],
                    'oldprice' => $item['oldprice'],
                    'image' => $item['image'],
                    'secondImage' => $item['secondImage'],
                    'short_description' => $item['short_description'][$lang],
                    'description' => $item['description'][$lang],
                    'details' => $item['details'][$lang],
                    'quantity' => $item['quantity'],
                    'favouriteStatus' => $favouriteStatus,
                    'cartStatus' => $cartStatus,


                ];
            }, $products);

            $ProductFeature = ProductFeature::all()->where('product_id', $product_id);

            $data = ['productfeature' => $ProductFeature, 'products' => $products, 'averageStars' => $avergeRate, 'numbRate' => $numbRate, 'total_start' => $rateStars];
            return $this->ApiResponse(200, 'success', null, $data);

        }

        public function ProductRate($lang, $product_id)
        {


            $rates = ProductRate::all()->where('product_id', $product_id);
            $numbRate = ProductRate::where('product_id', $product_id)->count();
            $totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
            if ($numbRate == 0) {
                $avergeRate = 0;
            } else {
                $avergeRate = $totalRate / $numbRate;
            }


            $data['averageStars'] = $avergeRate;
            $data['numbRate'] = $numbRate;

            $rateStars = ['key1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(),
                'key2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(),
                'key3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(),
                'key4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(),
                'key5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];
            $data['total_start'] = $rateStars;

            if (count($rates) > 0) {
                foreach ($rates as $list_review) {
                    $productlist['comment'] = $list_review->comment;
                    $productlist['rate'] = $list_review->rate;
                    $productlist['date'] = $list_review->created_at;
                    $productlist['product_id'] = $list_review->product_id;
                    $client_name = User::select("name")->where('id', $list_review->user_id)->first();
                    $productlist['client_name'] = $client_name->name;
                    $data['list'][] = $productlist;
                }
            } else {
                $data['list'] = [];
            }

            //$allRates = ['averageStars' => $avergeRate,'rates' => $rates];
            return $this->ApiResponse(200, 'success', null, $data);

        }


        public function ServiceRate($lang, $service_id)
        {


            $rates = ServiceRate::all()->where('service_id', $service_id);
            $numbRate = ServiceRate::where('service_id', $service_id)->count();
            $totalRate = ServiceRate::where('service_id', $service_id)->sum('Rate');
            if ($numbRate == 0) {
                $avergeRate = 0;
            } else {
                $avergeRate = $totalRate / $numbRate;
            }


            $data['averageStars'] = $avergeRate;
            $data['numbRate'] = $numbRate;

            $rateStars = ['key1' => ServiceRate::where('rate', 1)->where('service_id', $service_id)->count(),
                'key2' => ServiceRate::where('rate', 2)->where('service_id', $service_id)->count(),
                'key3' => ServiceRate::where('rate', 3)->where('service_id', $service_id)->count(),
                'key4' => ServiceRate::where('rate', 4)->where('service_id', $service_id)->count(),
                'key5' => ServiceRate::where('rate', 5)->where('service_id', $service_id)->count()];
            $data['total_start'] = $rateStars;

            if (count($rates) > 0) {
                foreach ($rates as $list_review) {
                    $productlist['comment'] = $list_review->comment;
                    $productlist['rate'] = $list_review->rate;
                    $productlist['date'] = $list_review->created_at;
                    $productlist['service_id'] = $list_review->service_id;
                    $client_name = User::select("name")->where('id', $list_review->user_id)->first();
                    $productlist['client_name'] = $client_name->name;
                    $data['list'][] = $productlist;
                }
            } else {
                $data['list'] = [];
            }

            return $this->ApiResponse(200, 'success', null, $data);

        }

        public function details_service($lang, $service_id)
        {

            //select products with language ('ar','en')
            $services = Service::where('id', $service_id)->get();
            $services = json_decode($services, true);
            $services = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'price' => $item['price'],
                    'oldprice' => $item['oldprice'],
                    'image' => $item['image'],
                    'short_description' => $item['short_description'][$lang],
                    'description' => $item['description'][$lang],
                    'details' => $item['details'][$lang],
                    'total_rate' => $item['total_rate'],
                    'duration' => $item['duration'],
                ];
            }, $services);


            $numbRate = ServiceRate::where('service_id', $service_id)->count();
            $rateStars = ['1' => ServiceRate::where('rate', 1)->where('service_id', $service_id)->count(),
                '2' => ServiceRate::where('rate', 2)->where('service_id', $service_id)->count(),
                '3' => ServiceRate::where('rate', 3)->where('service_id', $service_id)->count(),
                '4' => ServiceRate::where('rate', 4)->where('service_id', $service_id)->count(),
                '5' => ServiceRate::where('rate', 5)->where('service_id', $service_id)->count()];
            $totalRate = ServiceRate::where('service_id', $service_id)->sum('Rate');
            if ($numbRate == 0) {
                $avergeRate = 0;
            } else {
                $avergeRate = $totalRate / $numbRate;
            }

            $allRates = ['stars' => $rateStars, 'averageStars' => $avergeRate, 'numbRates' => $numbRate];

            return $this->ApiResponse(200, 'success', null, array('services' => $services, 'allRates' => $allRates));


        }


        public function AddReview(Request $request)
        {
            $lang = $request->lang;
            $review = ProductRate::create([
                'user_id' => 2,
                'comment' => $request->comment,
                'rate' => $request->rate,
                'product_id' => $request->product_id,
                'commentDate' => date("Y-m-d"),
            ]);
            return $this->ApiResponse(200, 'success', null, array('review' => $review));
        }


        public function Sale($lang)
        {
            $products = Product::whereColumn('oldprice', '>', 'price')
                ->orderby('oldprice', 'asc')
                ->get();
            $products = json_decode($products, true);
            $products = array_map(function ($item) use ($lang) {
                $favouriteStatus = false;
                $cartStatus = false;
                $user = Auth::guard('sanctum')->user();
                $favourite = FavouriteProduct::where('product_id', $item['id'])->where('user_id', $user->id ?? "")->first();
                $cart = Cart::where('user_id', $user->id ?? "")->first();
                $cart_items = CartItem::where('product_id', $item['id'])->where('cart_id', $cart->id ?? "")->first();
                if (isset($favourite)) {
                    $cartStatus = true;
                }
                if (isset($favourite)) {
                    $favouriteStatus = true;
                }
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'price' => $item['price'],
                    'oldprice' => $item['oldprice'],
                    'image' => $item['image'],
                    'secondImage' => $item['secondImage'],
                    'short_description' => $item['short_description'][$lang],
                    'description' => $item['description'][$lang],
                    'details' => $item['details'][$lang],
                    'quantity' => $item['quantity'],
                    'total_rate' => $item['total_rate'],
                    'favouriteStatus' => $favouriteStatus,
                    'cartStatus' => $cartStatus,
                ];
            }, $products);

            return $this->ApiResponse(200, 'success', null, array('products' => $products));
        }

        public function cart($lang)
        {
            $cart = Cart::with('items.product')
                ->where('user_id', auth()->user()->id)
                ->get();
            if (empty($cart)) {
                Cart::create([
                    'user_id' => auth()->user()->id,
                ]);
            }
            $newitems = [];
            foreach ($cart[0]->items as $items) {
                $items = json_decode($items, true);
                $favourite = FavouriteProduct::where('user_id', Auth::id())->where('product_id', $items['product']['id'])->first();
                if (isset($favourite)) {
                    $items['favourite'] = true;
                }
                $items['product']['name'] = $items['product']['name'][$lang];
                $items['product']['short_description'] = $items['product']['short_description'][$lang];
                $items['product']['description'] = $items['product']['description'][$lang];
                $items['product']['details'] = $items['product']['details'][$lang];
                $newitems[] = $items;
            }
            $cart = json_decode($cart, true);
            array_replace($cart[0]['items'] = $newitems);


            return $this->ApiResponse(200, 'success', null, array('cart' => $cart));

        }

        public function deleteCart(Request $request)
        {
            $cart_id = $request->cart_id;
            if (isset($cart_id)) {
                $cart_items = CartItem::where('cart_id', $cart_id)->get();
                foreach ($cart_items as $item) {
                    if (isEmpty($item)) {
                        $cart_item = CartItem::where('cart_id', $cart_id)->delete();
                        return $this->ApiResponse(200, 'success', null, 'Products deleted successfully');
                    }
                }
                $cart = Cart::where('id', $cart_id)->first();
                if (isset($cart)) {
                    if ($cart->user_id == Auth::user()->id) {
                        Cart::where('id', $cart_id)->delete();
                        return $this->ApiResponse(200, 'success', null, 'cart deleted successfully');
                    } else {
                        return $this->ApiResponse(401, 'fail', 'Reload Page', null);
                    }
                }

            }
            return $this->ApiResponse(401, 'fail', 'Error inputs', null);

        }


        public function deleteCartItem(Request $request)
        {
            $cart_id = $request->cart_id;
            $cart = Cart::where('id', $cart_id)->first();
            $item_id = $request->item_id;
            if (isset($cart_id) && isset($item_id) && $cart->user_id == Auth::user()->id) {
                $cartitem = CartItem::where('id', $item_id)->where('cart_id', $cart_id)->first();
                if (isset($cartitem)) {
                    $product = Product::where('id', $cartitem->product_id)->first();
                    $total = $product->price * $cartitem->quantity;
                    $cart->total -= $total;
                    $cart->save();
                    CartItem::where('id', $item_id)->where('cart_id', $cart_id)->delete();
                    return $this->ApiResponse(200, 'success', null, 'Product deleted successfully');

                } else {
                    return $this->ApiResponse(401, 'fail', 'unauthorized');
                }
            } else {
                return $this->ApiResponse(401, 'fail', 'unauthorized');

            }

        }

        public function ChangeQuantityItem(Request $request)
        {
            $item_id = $request->item_id;
            $increase = $request->increase;
            $decrease = $request->decrease;
            $cartitem = CartItem::where('id', $item_id)
                ->first();
            if (isset($cartitem)) {
                $cart = Cart::where('id', $cartitem->cart_id)
                    ->first();
                $product = Product::where('id', $cartitem->product_id)
                    ->first();
                if (isset($increase) && isset($cartitem) && $cart->user_id == Auth::user()->id) {
                    if ($product->quantity >= ($cartitem->quantity + 1)) {
                        $cartitem->quantity++;
                        $cartitem->save();
                        $cart->total += $product->price;
                        $cart->save();
                        return $this->ApiResponse(200, 'success', null, 'quantity increased successfully');
                    } else {
                        return $this->ApiResponse(400, 'fail', null, 'no stock to increase the product');
                    }

                } elseif (isset($decrease) && isset($cartitem) && $cart->user_id == Auth::user()->id) {
                    if (($cartitem->quantity) > 0) {
                        $cartitem->quantity--;
                        $cartitem->save();
                        $cart->total -= $product->price;
                        $cart->save();
                        if ($cartitem->quantity <= 0) {
                            $cartitem->delete();
                            $cart->total -= $product->price;
                            $cart->save();
                            return $this->ApiResponse(200, 'success', null, 'Product deleted successfully');
                        }
                        return $this->ApiResponse(200, 'success', null, 'quantity decreased successfully');
                    }


                } else {
                    return $this->ApiResponse(400, 'fail', 'unauthorized');

                }
            } else {
                return $this->ApiResponse(400, 'fail', 'bad request');

            }

        }


        public function FavouriteProducts($lang)
        {
            $FavProducts = FavouriteProduct::with('product')
                ->where('user_id', Auth::user()->id)
                ->get();


            $newFav = [];
            foreach ($FavProducts as $items) {
                $items = json_decode($items, true);
                $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $items['product']['id']);
                if (isset($cartItem)) {
                    $items['cart'] = true;
                }
                $items['product']['name'] = $items['product']['name'][$lang];
                $items['product']['short_description'] = $items['product']['short_description'][$lang];
                $items['product']['description'] = $items['product']['description'][$lang];
                $items['product']['details'] = $items['product']['details'][$lang];
                $newFav[] = $items;
            }
            $FavProducts = json_decode($FavProducts, true);
            array_replace($FavProducts = $newFav);

            return $this->ApiResponse(200, 'success', null, array('FavouriteProducts' => $FavProducts));
        }

        public function Favourite(Request $request)
        {
            $id = $request->id;
            $product = Product::find($id);
            $favourite = FavouriteProduct::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            if (empty($favourite)) {
                $favourite = FavouriteProduct::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                ]);
                return $this->ApiResponse(200, 'success', null, $favourite);
            }
            return $this->ApiResponse(200, 'success', null, $favourite);
        }

        public function unFavourite(Request $request)
        {
            $id = $request->id;
            $product = Product::find($id);
            $favourite = FavouriteProduct::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            return $this->ApiResponse(200, 'success', null);
        }


        public function orders($lang, $status)
        {

            $orders = order::with('items.product')
                ->where('user_id', Auth::user()->id)
                ->where('status', $status)
                ->get();
            if (empty($orders[0])) {
                return $this->ApiResponse(200, 'success', null, array('cart' => "empty Cart "));
            }
            $newitems = [];
            foreach ($orders[0]->items as $items) {
                $items = json_decode($items, true);
                $items['product']['name'] = $items['product']['name'][$lang];
                $items['product']['short_description'] = $items['product']['short_description'][$lang];
                $items['product']['description'] = $items['product']['description'][$lang];
                $items['product']['details'] = $items['product']['details'][$lang];
                $newitems[] = $items;
            }
            $orders = json_decode($orders, true);
            array_replace($orders[0]['items'] = $newitems);

            return $this->ApiResponse(200, 'success', null, array('cart' => $orders));

        }

    }
