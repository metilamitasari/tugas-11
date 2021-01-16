<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ClientProdukController extends Controller
{
	function home(){
		$data['list_produk'] = produk::paginate(4);
		return view('home', $data);
	}

	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('produk_single', $data);
	}
	function Filter(){
		$nama = request('nama');
		$stok = explode(",", request ('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('nama_produk', 'like', "%$nama%")->get();
        // $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
        //$data['list_produk'] = Produk::where('stok', '<>', $stok)->get();
        //$data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
        //$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
        //$data['list_produk'] = Produk::whereNull('stok')->get();
        //$data['list_produk'] = Produk::whereNotNull('stok')->get();
        //$data['list_produk'] = Produk::whereDate('created_at', '2020-11-15')->get();
        //$data['list_produk'] = Produk::whereYear('created_at', '2020')->get();
        //$data['list_produk'] = Produk::whereTime('created_at', '08:44:29')->get();
        //$data['list_produk'] = Produk::whereDate('created_at', ['2020-11-15', '2020-11-21'])->get();
        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereYear('created_at', '2020')->get();
        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [20])->whereYear('created_at', '2020')->get();
        $data['nama'] = $nama;
        $data['stok'] = request('stok');
        return view('produk.index', $data);
		//dd(request()->all());
	}
	
}