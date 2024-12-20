<?php

namespace App\Http\Controllers;
use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $issues = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issues', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required',
            'status' => 'required',
        ]);
    
        // Tìm đối tượng Thesis cần cập nhật
        $issues = Issue::find($id);
        
        // Cập nhật thông tin
        $issues->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Vấn đề được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã CƯƠNG !');
    }
}
