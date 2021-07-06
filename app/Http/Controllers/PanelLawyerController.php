<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanelLawyer;

class PanelLawyerController extends Controller
{
    public function index(){
        $panel_lawyers = PanelLawyer::all();
        return view('panelLawyers.index')->with('panel_lawyers',$panel_lawyers);
    }
    public function create(){
        return view('panelLawyers.create');
    }
}
