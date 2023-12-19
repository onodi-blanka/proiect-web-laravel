<?php

namespace App\Http\Controllers;
use App\Models\SponsorsPartners;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class SponsorsPartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic for displaying all SponsorsPartners
        $sponsorsPartners = SponsorsPartners::all();

        // Log sponsors and partners to the console
        $sponsors = $sponsorsPartners->where('type', 'sponsor')->toArray();;
        $partners = $sponsorsPartners->where('type', 'partner')->toArray();;

        // Log data to the console
        echo "<script>";
        echo "console.log('Sponsors:', " . json_encode($sponsors) . ");";
        echo "console.log('Partners:', " . json_encode($partners) . ");";
        echo "</script>";

        return view('sponsorspartners.index', compact('sponsors', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sponsorspartners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'type' => 'required',
                'details' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoPath = $logo->store('logos', 'public');
                $validatedData['logo_path'] = $logoPath;
            }
    
            SponsorsPartners::create($validatedData);
    
            return redirect()->route('sponsorspartners.index')->with('success', 'New Sponsor/Partner added successfully!');
            } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
            }

    }


    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        try {
            $sponsorPartner = SponsorsPartners::findOrFail($id);

            echo "<script>";
            echo "console.log('sponsorPartner:', " . json_encode($sponsorPartner) . ");";
            echo "</script>";

            if ($sponsorPartner->type === 'sponsor') {
                echo "<script>";
                echo "console.log('Type Sponsor?:', " . json_encode($sponsorPartner->type) . ");";
                echo "</script>";
                return view('sponsorspartners.show', compact('sponsorPartner'));
            } elseif ($sponsorPartner->type === 'partner') {
                echo "<script>";
                echo "console.log('Type: Partner?:', " . json_encode($sponsorPartner->type) . ");";
                echo "</script>";
                return view('sponsorspartners.show', compact('sponsorPartner'));
            } else {
                throw new \Exception('Invalid sponsor/partner type.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $sponsorsPartners = SponsorsPartners::findOrFail($id);
        return view('sponsorspartners.edit', ['sponsorPartner' => $sponsorsPartners]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        try {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'details' => 'nullable',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $sponsorPartner = SponsorsPartners::findOrFail($id);
            $sponsorPartner->name = $request->input('name');
            $sponsorPartner->type = $request->input('type');
            $sponsorPartner->details = $request->input('details');
    
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoPath = $logo->store('logos', 'public');
                $sponsorPartner->logo_path = $logoPath;
            }

    
            $sponsorPartner->save();
            return redirect()->route('sponsorspartners.index')->with('success', 'Sponsor/Partner updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sponsorsPartners = SponsorsPartners::findOrFail($id);
            $sponsorsPartners->delete();
    
            return redirect('/sponsorspartners')->with('success', 'Sponsor/Partner deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
        
    }

    public function showAll()
    {
        try {
            $sponsors = SponsorsPartners::where('type', 'sponsor')->get();
            $partners = SponsorsPartners::where('type', 'partner')->get();
    
            return view('sponsorspartners.index', compact('sponsors', 'partners'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }


}
