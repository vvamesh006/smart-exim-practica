<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->take(3)->get();
        $products = Product::where('is_active', true)->latest()->take(3)->get();
        return view('public.home', compact('services', 'products'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $query = Product::where('is_active', true);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->latest()->get();
        return view('public.products', compact('products', 'categories'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        return view('public.services', compact('services'));
    }

    public function process()
    {
        return view('public.process');
    }

    public function about()
    {
        return view('public.about');
    }

    public function privacy()
    {
        return view('public.privacy');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Mesajul a fost trimis cu succes! Vă vom contacta în curând.');
    }
}
