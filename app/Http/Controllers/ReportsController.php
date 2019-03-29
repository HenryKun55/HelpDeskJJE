<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Solicitation;
use App\CRM;
use PDF;

class ReportsController extends Controller
{

  public function solicitations(Request $request, $st, $id, $fd, $ci, $ri, $searchType) {

    if ($searchType == '00') {
      if ($st == 'todos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->paginate(50);
      }
      if ($st == 'abertos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->paginate(50);
      }
      if ($st == 'fechados' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->paginate(50);
      }
      if ($st == 'todos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'abertos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'fechados' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->where('responsible_id', [$ri])->paginate(50);
      }

    }

    if ($searchType == '01') {
      if ($st == 'todos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->paginate(50);
      }
      if ($st == 'abertos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->whereBetween('created_at', array($id, $fd))->paginate(50);
      }
      if ($st == 'fechados' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->whereBetween('created_at', array($id, $fd))->paginate(50);
      }
      if ($st == 'todos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'abertos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->whereBetween('created_at', array($id, $fd))->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'fechados' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->whereBetween('created_at', array($id, $fd))->where('responsible_id', [$ri])->paginate(50);
      }
    }

    if ($searchType == 02) {
      if ($st == 'todos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'abertos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'fechados' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'todos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'abertos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'fechados' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
    }

    if ($searchType == 03) {
      if ($st == 'todos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'abertos' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->whereNotIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'fechados' && $ri == '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->whereIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->paginate(50);
      }
      if ($st == 'todos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'abertos' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->whereNotIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
      if ($st == 'fechados' && $ri != '00') {
        $data = Solicitation::orderBy('id','DESC')->whereBetween('created_at', array($id, $fd))->whereIn('status', ['Resolvido', 'Cancelado'])->where('client_id', [$ci])->where('responsible_id', [$ri])->paginate(50);
      }
    }

    $users = User::get()->where('department_id', 3)->pluck('name', 'id');

    $rs = ucfirst($st);


    return view('reports.solicitations',compact('data', 'users', 'rs', 'st', 'id', 'fd', 'ci', 'ri', 'searchType'))
      ->with('i', ($request->input('page', 1) - 1) * 50);
  }

  public function search(){

  	$term = Input::get('term');

  	$results = array();

  	$queries = DB::table('clients')
  		->where('name', 'LIKE', '%'.$term.'%')
  		->orWhere('cpf_cnpj', 'LIKE', '%'.$term.'%')
  		->take(5)->get();

  	foreach ($queries as $query)
  	{
  	    $results[] = [
          'id' => $query->id,
          'value' => $query->name.' '.$query->cpf_cnpj
        ];
  	}

    return $results;
  }

  public function searchClient() {

  }

  public function searchUsers() {

    $users = User::get()->where('department_id', 3);
    return $users;
  }

  public function crm(Request $request, $st) {

    if ($st == 'todos') {
      $data = CRM::orderBy('id','DESC')->paginate(50);
    }
    if ($st == 'vendidos') {
      $data = CRM::orderBy('id','DESC')->where('status', 'Vendido')->paginate(50);
    }
    if ($st == 'nao-vendidos') {
      $data = CRM::orderBy('id','DESC')->where('status', 'Não Vendido')->paginate(50);
    }
    if ($st == 'negociando') {
      $data = CRM::orderBy('id','DESC')->where('status', 'Negociando')->paginate(50);
    }

    return view('reports.crm',compact('data', 'st'))
      ->with('i', ($request->input('page', 1) - 1) * 10);
  }

  public function crmExport(Request $r, $st) {

    $v = $this->crm($r, $st);

    $data = $v->data;

    $pdf = PDF::loadView('reports.crm-pdf', compact('data', 'st'));
    return $pdf->stream();
  }

  public function crmShow(Request $request, $id) {

    $crm = CRM::find($id);

    return view('reports.crmshow', compact('crm'));
  }

  public function solicitationsExport(Request $r, $st, $id, $fd, $ci, $ri, $searchType) {

    $v = $this->solicitations($r, $st, $id, $fd, $ci, $ri, $searchType);

    $data = $v->data;

    $users = User::get()->where('department_id', 3)->pluck('name', 'id');

    $rs = ucfirst($st);

    $pdf = PDF::loadView('reports.solicitations-pdf', compact('data', 'users', 'rs'));
    return $pdf->stream();
  }

  public function solicitationsShow(Request $request, $id) {

    $solicitation = Solicitation::find($id);

    return view('reports.solicitationsshow', compact('solicitation'));
  }

}
