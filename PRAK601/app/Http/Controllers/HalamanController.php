<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use App\Models\Practicians;
use Illuminate\View\View;

class HalamanController extends Controller
{
    protected Practicians $practician;

    /**
     * Mengambil data praktikan sekali saja untuk semua method di controller ini.
     */
    public function __construct()
    {
        $this->practician = Practicians::with('experiences')->firstOrFail();
    }

    public function beranda(): View
    {
        return view('beranda')->with('practician', $this->practician);
    }

    public function profile(): View
    {
        return view('profile')->with('practician', $this->practician);
    }

    public function showExperience(Experiences $experience): View
    {
        return view('experience')->with('experience', $experience);
    }
}
