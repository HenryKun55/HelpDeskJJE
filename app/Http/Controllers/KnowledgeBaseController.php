<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KnowledgeBaseRequest;
use App\KnowledgeBase;
use App\KnowledgeBaseFile;

class KnowledgeBaseController extends Controller
{
  public function index(Request $request) {
		$data = KnowledgeBase::orderBy('id','DESC')->paginate(5);
		return view('knowledge-base.index',compact('data'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

  public function create() {
    return view('knowledge-base.create');
  }

  public function store(KnowledgeBaseRequest $request) {

    $knowledgeBase = KnowledgeBase::create([
      'subject' => $request->subject,
      'related_product' => $request->related_product,
      'description' => $request->description
    ]);

    if (isset($request->photos)) {
      foreach ($request->photos as $photo) {

          $filename = $photo->store('public');
          $filename = substr($filename, 7);

          KnowledgeBaseFile::create([
              'knowledge_base_id' => $knowledgeBase->id,
              'filename' => $filename
          ]);
      }
    }


    return redirect()->route('knowledge-bases.index')
    ->with('success','Base de conhecimento atualizada com sucesso');
  }

  public function edit($id) {

    $kb = KnowledgeBase::find($id);
      return view('knowledge-base.edit',compact('kb'));
  }

  public function update(KnowledgeBaseRequest $request, $id) {

    $knowledgeBase = KnowledgeBase::find($id);

    $knowledgeBase->update($request->all());

    if (isset($request->photos)) {
      foreach ($request->photos as $photo) {

          $filename = $photo->store('public');
          $filename = substr($filename, 7);

          KnowledgeBaseFile::create([
              'knowledge_base_id' => $knowledgeBase->id,
              'filename' => $filename
          ]);
      }
    }


      return redirect()
        ->route('knowledge-bases.index')
          ->with('success','Base de conhecimento alterada com sucesso!');
  }

  public function show($id) {

    $knowledgeBase = KnowledgeBase::find($id);

    return view('knowledge-base.show',compact('knowledgeBase'));
  }

  public function search(Request $request) {
		if($request->ajax()) {
			 $output="";
			 $output2="";
			 $value = $request->search;
			 $crms = KnowledgeBase::orderBy('id', 'DESC')
								 ->where('related_product', 'LIKE', '%'.$value.'%')
								 ->get();
			$output.=
			'<table class="table table-bordered">'.
				'<tr>'.
					"<th width='200px'>Assunto</th>".
					"<th width='200px'>Produto Relacionado</th>".
					'<th>Descrição</th>'.
					"<th width='180px'>Opções</th>".
				'</tr>';
			if($value != ""){
				foreach ($crms as $key => $crm ) {
					$output2.=
					'<tr>'.
						'<td>'.$crm->subject.'</td>'.
						'<td>'.$crm->related_product.'</td>'.
						'<td>'.substr($crm->description, 0, 60).'</td>'.
						'<td>'.
							"<a class='btn btn-info btn-sm' href= ".$request->path."/".$crm->id. "/visualizar >Visualizar</a> ".
							"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
						'</td>'.
					'</tr>';
				'</table>';
				}
			}else{
				$crms = KnowledgeBase::orderBy('id', 'DESC')->paginate(5);
					foreach ($crms as $key => $crm) {
						$output2.=
							'<tr>'.
								'<td>'.$crm->subject.'</td>'.
								'<td>'.$crm->related_product.'</td>'.
								'<td>'.substr($crm->description, 0, 60).'</td>'.
								'<td>'.
									"<a class='btn btn-info btn-sm' href= ".$request->path."/".$crm->id. "/visualizar >Visualizar</a> ".
									"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
								'</td>'.
							'</tr>';
						'</table>';
					}
				}
			return Response($output.$output2);
		}
	}
}
