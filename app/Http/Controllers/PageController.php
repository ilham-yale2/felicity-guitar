<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
	public function cart()
	{
		return view('cart');
	}
	public function contact()
	{
		return view('contact');
	}
	public function accountPage()
	{
		return view('account-page');
	}

	public function privateVault()
	{
		return view('private-vault');
	}
	public function browseBrand()
	{
		return view('browse-brand');
	}

	public function login()
	{
		return view('login');
	}
	public function aboutUs()
	{
		return view('about-us');
	}
	public function registration()
	{
		return view('registration');
	}

	public function browseCategory()
	{
		return view('browse-category');
	}

	public function trade()
	{
		return view('trade');
	}

	public function checkoutAccount()
	{
		return view('checkout-account');
	}

	public function detailProduct()
	{
		return view('detail-product');
	}
}
