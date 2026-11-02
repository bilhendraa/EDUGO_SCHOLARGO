<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScholarshipRequest;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->paginate(10);

        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show', compact('scholarship'));
    }

    public function create()
    {
        $recentScholarships = Scholarship::latest()->take(5)->get();
        return view('admin.scholarships.create', compact('recentScholarships'));
    }

    public function store(StoreScholarshipRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Scholarship::create($data);

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Beasiswa berhasil ditambahkan.');
    }
}
