<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;
use App\Category;
use App\User;
use Auth;
use App\Transaction;
use Alert;

class CartController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category= Category::where('parent_id',null)->get();
    }

    public function index(Request $req){
        // Cart::destroy();
        $product = Product::find($req->id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $req->qty, 'price' => $product->price, 'weight' => $product->weight,]);
        // Cart::content();
        return redirect('/keranjang');
    }
    public function keranjang(){
        $category = $this->category;
        return view('homepage.keranjang',compact('category'));
    }

    public function update(Request $req){
        Cart::update($req->rowid, $req->qty);
        $category = $this->category;
        return redirect('/keranjang');
    }

    public function delete($rowid){
        Cart::remove($rowid);
        $category = $this->category;
        return redirect('/keranjang');
    }

    public function formulir(){
        $category = $this->category;
        return view('homepage.formulir',compact('category'));
        
    }

    public function transaction(Request $req){
        foreach(Cart::content() as $row){
             $product = Product::find($row->id);
           
             $city = json_decode(City(),true);
             $weight = $product->weight * $row->qty;
             foreach ($city['rajaongkir']['results'] as $key ) {
                 if($product->user->address==$key['city_name']){
                      $cost = Cost($key['city_id'],$req->city,$weight,$req->eks);
                      $data = json_decode($cost,true);
                      Cart::update($row->rowId,['options' => [
                         'code'  => $data['rajaongkir']['results'][0]['code'],
                         'name'  => $data['rajaongkir']['results'][0]['name'],
                         'value' => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],
                         'etd'   => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd']
                         ]]);
                     $eks = [
                        'code' =>  $row->options->code, 
                         'name' =>$row->options->name,
                         'value' => $row->options->value,
                         'etd' =>$row->options->etd
                     ];
                     $transaction = new Transaction;
                     $transaction->code = date('ymdhi').Auth::user()->id;
                     $transaction->user_id = Auth::user()->id;
                     $transaction->qty = $row->qty;
                     $transaction->subtotal = $row->subtotal;
                     $transaction->name = $req->name;
                     $transaction->address = $req->city;
                     $transaction->portal_code = $req->portal_code;
                     $transaction->ekspedisi = $eks;
                     $transaction->product_id = $product->id;
                     $transaction->alamat_lengkap = $req->alamat;
                     $transaction->size = $req->size;
                     $transaction->size2 = $req->size2;
                     $transaction->size3 = $req->size3;
                     $transaction->size4 = $req->size4;
                     $transaction->size5 = $req->size5;
                     $transaction->save();
                     
                     Cart::remove($row->rowId);
                 }   
             }
             if(Cart::count() == 0)
             {
                return redirect('cart/myorder');
             }
         }
    }

    public function myorder(){
        $category = $this->category;
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        return view('homepage.myorder',compact('category','transaction'));
    }

    public function detailtransaksi($code){
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $transactiondetail = Transaction::orderBy('id','DESC')->where('code',$code)->get();
        $category = $this->category;
        return view('homepage.detailtransaksi',compact('category','transaction','transactiondetail'));
    }
    
    public function confirmation($code){
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $transactiondetail = Transaction::orderBy('id','DESC')->where('code',$code)->get();
        $category = $this->category;
        return view('homepage.confirmation',compact('category','transaction','transactiondetail'));
    }

    public function myproduct(){
        $category = $this->category;
        $product = Product::where('user_id',Auth::user()->id)->get();
        return view('homepage.myproduct',compact('product','category'));
    }

    public function addproduct(){
        $category = $this->category;
        // $mycategorys = Category::where('parent_id',null)->get();
        return view('homepage.addproduct',compact('category'));
    }

    public function saveproduct(Request $request){
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $request->file('file')->move('static/dist/img/',$filename);
        $product = new Product;
        $product->slug = $request->slug;
        $product->photo = 'static/dist/img/'.$filename;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price ;
        $product->category_id = $request->category_id;
        $product->weight = $request->weight;
        $product->user_id = Auth::user()->id;
        $product->save();
        Alert::success('', 'Product Berhasil di Tambahkan');
        return redirect('myproduct');
    }
    public function editproduct($id){
        $category = $this->category;
        $product = Product::find($id);
        // $categorys = Category::where('parent_id',null)->get();
        return view('homepage.editproduct',compact('product','category'));
    }
    public function updateproduct(Request $request){
        $id = $request->id;
        if( $file = $request->file('file'))
        {
            $filename = $file->getClientOriginalName();
            $request->file('file')->move('static/dist/img/',$filename);
            $img = 'static/dist/img/'.$filename;
        }else
        {
            $img = $request->tmp_image ;
        }
        $product = Product::find($id);
        $product->slug = $request->slug;
        $product->photo = $img;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price ;
        $product->category_id = $request->category_id;
        $product->user_id = Auth::user()->id;
         $product->weight = $request->weight;
        $product->save();
        Alert::success('', 'Product Berhasil di Update');
        return redirect('myproduct');
    }

    public function deleteproduct($id){
        $product = Product::find($id);
        $product->delete();
        Alert::success('','Product Berhasil di delete');
        return redirect('myproduct');
    }

    public function keteranganpembayaran($id){
        // $transaction = Transaction::find($id);
        // $transactiondetail = Transaction::orderBy('id','DESC')->where('id',$id)->get();
        // $category = $this->category;
        // return view('homepage.keteranganpembayaran',compact('category','transaction','transactiondetail'));
    }
    
    public function konfirmasi(Request $request,$id){
        // $transaction = Transaction::find($id);
        // $file = $request->file('foto');
        // $filename = $file->getClientOriginalName();
        // $request->file('foto')->move('static/dist/img/',$filename);
        // $transaction->code = $request->kode;
        // $transaction->user_id =$request->user_id;
        // $transaction->qty = $request->qty;
        // $transaction->subtotal = $request->subtotal;
        // $transaction->name = $request->name;
        // $transaction->address = $request->address;
        // $transaction->portal_code = $request->portal_code;
        // $transaction->ekspedisi = $request->ekspedisi;
        // $transaction->product_id = $request->product_id;
        // $transaction->alamat_lengkap = $request->alamat_lengkap;
        // $transaction->bukti = $request->size;
        // $transaction->save();
        // return redirect('/cart/myorder')->with('success', 'Data Successfully added!');


        // $bukti = new bukti;
        // $bukti->pembayaran = 'static/dist/img/'.$filename;
        // $bukti->save();
        
    }

}
