<?php

namespace App\Http\Controllers;

use App\Models\hwinventory;
use Illuminate\Http\Request;

class HWInventoryController
{
    public function StoreInventory(Request $req)
    {
        $req->validate([
            'department' => 'required|string',
            'eno' => 'required|string',
            'ename' => 'required|string',
            'designation' => 'required|string',
            'type' => 'required|string',
            'brand' => 'required|string',
            'spec' => 'nullable|string',
            'warranty' => 'nullable|string',
        ]);

        $inventory = new HwInventory();
        $inventory->department = $req->input('department');
        $inventory->employeenumber = $req->input('eno');
        $inventory->employeename = $req->input('ename');
        $inventory->designation = $req->input('designation');
        $inventory->type = $req->input('type');
        $inventory->brand = $req->input('brand');
        $inventory->spec = $req->input('spec');
        $inventory->warranty = $req->input('warranty');
        $inventory->save();

        return back()->with('success', 'Inventory saved successfully!');
    }

    public function ShowInventory()
    {
        $inventoryData = hwinventory::all();
        return view('pages.home', compact('inventoryData'));
    }

    public function updateInventory(Request $request)
    {
        $inventory = hwinventory::find($request->id);
        if (!$inventory) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }

        $inventory->department = $request->department;
        $inventory->employeenumber = $request->employeenumber;
        $inventory->employeename = $request->employeename;
        $inventory->designation = $request->designation;
        $inventory->type = $request->type;
        $inventory->brand = $request->brand;
        $inventory->spec = $request->spec;
        $inventory->warranty = $request->warranty;
        $inventory->save();

        return response()->json(['success' => true]);
    }

    public function uploadInventoryFile(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:hwinventories,id',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $inventory = hwinventory::find($request->id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = $file->store('inventory_uploads', 'public');

            $inventory->upload_path = $path;
            $inventory->save();

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully.',
                'path' => $path
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.'
        ]);
    }

}


